<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Mcq;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Imports\McqsImport;
use Maatwebsite\Excel\Facades\Excel;

class McqsController extends Controller
{
    public function index(Request $request)
    {
        $mcqs = DB::table('mcqs')
            ->leftJoin('categories', 'mcqs.category_id', '=', 'categories.id')
            ->leftJoin('subcategories', 'mcqs.subcategory_id', '=', 'subcategories.id')
            ->leftJoin('topics', 'mcqs.topic_id', '=', 'topics.id')
            ->select('mcqs.*', 'categories.name as category_name', 'subcategories.name as subcategory_name', 'topics.name as topic_name')
            ->orderBy('mcqs.id', 'desc')
            ->paginate(50);

        return view('admin.mcqs.index', compact('mcqs'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $query = DB::table('mcqs');

        if ($search) {
            $query->where('question', 'like', "%$search%");
        }

        $mcqs = $query->get();
        return view('admin.mcqs.index', compact('mcqs', 'search'));
    }

    public function reports(Request $request)
    {
        $reports = DB::table('reports')
            ->join('categories', 'reports.category_id', '=', 'categories.id')
            ->leftJoin('users', 'reports.user_id', '=', 'users.id')
            ->leftJoin('mcqs', 'reports.mcq_id', '=', 'mcqs.id')
            ->select('reports.*', 'categories.name as category_name', 'users.name as user_name', 'mcqs.question as mcq_question')
            ->get();

        return view('admin.mcqs.reports', compact('reports'));
    }

    public function add()
    {
        $mcq = new Mcq();
        $categories = Category::all();
        $subcategories = collect(); // Empty collection initially
        $topics = collect(); // Empty collection initially
        $action = route('mcqs.store');

        return view('admin.mcqs.create', compact('mcq', 'categories', 'subcategories', 'topics', 'action'));
    }

    public function save(Request $request)
    {
        if ($request->hasFile('file')) {
            $request->validate([
                'file' => 'nullable|mimes:csv,txt,json',
            ]);

            $extension = $request->file('file')->getClientOriginalExtension();

            if ($extension === 'csv' || $extension === 'txt') {
                Excel::import(new McqsImport, $request->file('file'));
                toastr()->success('MCQs imported successfully from CSV');
            } elseif ($extension === 'json') {
                $jsonData = file_get_contents($request->file('file')->getRealPath());
                $data = json_decode($jsonData, true);

                if (is_array($data)) {
                    foreach ($data as $mcq) {
                        DB::table('mcqs')->insert([
                            'question'       => $mcq['question'] ?? '',
                            'option_a'       => $mcq['option_a'] ?? '',
                            'option_b'       => $mcq['option_b'] ?? '',
                            'option_c'       => $mcq['option_c'] ?? '',
                            'option_d'       => $mcq['option_d'] ?? '',
                            'category_id'    => $mcq['category_id'] ?? null,
                            'subcategory_id' => $mcq['subcategory_id'] ?? null,
                            'topic_id'       => $mcq['topic_id'] ?? null,
                            'correct_option' => $mcq['correct_option'] ?? '',
                            'explanation'    => $mcq['explanation'] ?? '',
                            'title'          => $mcq['title'] ?? null,
                            'image'          => $mcq['image'] ?? null,
                        ]);
                    }
                    toastr()->success('MCQs imported successfully from JSON');
                } else {
                    toastr()->error('Invalid JSON format.');
                }
            }

            return redirect()->route('All.mcqs');
        }

        // Manual MCQ entry
        $validated = $request->validate([
            'question' => 'required',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'topic_id' => 'required',
            'correct_option' => 'required|in:a,b,c,d',
            'explanation' => 'required',
            'title' => 'nullable',
            'image' => 'nullable|image',
        ]);

        $inputs = $request->except('_token');

        if ($request->hasFile('image')) {
            $inputs['image'] = $request->file('image')->store('images', 'public');
        }

        DB::table('mcqs')->insert($inputs);

        toastr()->success('MCQ created successfully');
        return redirect()->route('All.mcqs');
    }

    public function edit($id)
    {
        $mcq = DB::table('mcqs')->where('id', $id)->first();
        $action = route('mcqs.update', ['id' => $mcq->id]);
        $categories = Category::all();

        // Get subcategories for the current category
        $subcategories = DB::table('subcategories')
            ->where('category_id', $mcq->category_id)
            ->get();

        // Get topics for the current subcategory
        $topics = DB::table('topics')
            ->where('subcategory_id', $mcq->subcategory_id)
            ->get();

        return view('admin.mcqs.create', compact('mcq', 'action', 'categories', 'subcategories', 'topics'));
    }

    public function update($id, Request $request)
    {
        $validated = $request->validate([
            'question' => 'required',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'topic_id' => 'required',
            'correct_option' => 'required',
            'explanation' => 'required',
        ]);

        $inputs = $request->except('_token');
        DB::table('mcqs')->where('id', $id)->update($inputs);

        toastr()->success('MCQ updated successfully');
        return redirect()->route('All.mcqs');
    }

    public function delete($id)
    {
        DB::table('mcqs')->where('id', $id)->delete();
        toastr()->success('MCQ deleted successfully');
        return redirect()->back();
    }

    public function rdelete($id)
    {
        DB::table('reports')->where('id', $id)->delete();
        toastr()->success('Report deleted successfully');
        return redirect()->back();
    }

    public function import(Request $request)
    {
        // If a file (CSV or JSON) is uploaded
        if ($request->hasFile('file')) {
            $request->validate([
                'file' => 'required|mimes:csv,txt,json',
            ]);

            $extension = $request->file('file')->getClientOriginalExtension();

            if ($extension === 'csv' || $extension === 'txt') {
                // CSV Import
                Excel::import(new McqsImport, $request->file('file'));
                toastr()->success('MCQs imported successfully from CSV');
            } elseif ($extension === 'json') {
                // JSON Import
                $jsonData = file_get_contents($request->file('file')->getRealPath());
                $data = json_decode($jsonData, true);

                if (is_array($data)) {
                    foreach ($data as $mcq) {
                        DB::table('mcqs')->insert([
                            'question'       => $mcq['question'] ?? '',
                            'option_a'       => $mcq['option_a'] ?? '',
                            'option_b'       => $mcq['option_b'] ?? '',
                            'option_c'       => $mcq['option_c'] ?? '',
                            'option_d'       => $mcq['option_d'] ?? '',
                            'category_id'    => $mcq['category_id'] ?? null,
                            'subcategory_id' => $mcq['subcategory_id'] ?? null,
                            'topic_id'       => $mcq['topic_id'] ?? null,
                            'correct_option' => $mcq['correct_option'] ?? '',
                            'explanation'    => $mcq['explanation'] ?? '',
                            'title'          => $mcq['title'] ?? null,
                            'image'          => $mcq['image'] ?? null,
                            'created_at'     => now(),
                            'updated_at'     => now(),
                        ]);
                    }
                    toastr()->success('MCQs imported successfully from JSON');
                } else {
                    toastr()->error('Invalid JSON format.');
                }
            }

            return redirect()->route('All.mcqs');
        }

        toastr()->error('Please select a file to import.');
        return redirect()->back();
    }

    public function showImportForm()
    {
        $categories = Category::all();
        return view('admin.mcqs.import', compact('categories'));
    }

    public function getSubcategories($categoryId)
    {
        $subcategories = DB::table('subcategories')->where('category_id', $categoryId)->get();
        return response()->json($subcategories);
    }

    public function getTopics($subcategoryId)
    {
        $topics = DB::table('topics')->where('subcategory_id', $subcategoryId)->get();
        return response()->json($topics);
    }

    //     public function importByEachCategory(Request $request)
    // {
    //     $request->validate([
    //         'file' => 'required|mimes:json',
    //         'category_id' => 'required|exists:categories,id',
    //         'subcategory_id' => 'required|exists:subcategories,id',
    //         'topic_id' => 'required|exists:topics,id',
    //     ]);

    //     $categoryId = $request->category_id;
    //     $subcategoryId = $request->subcategory_id;
    //     $topicId = $request->topic_id;

    //     $jsonData = file_get_contents($request->file('file')->getRealPath());
    //     $data = json_decode($jsonData, true);

    //     if (!is_array($data)) {
    //         toastr()->error('Invalid JSON format.');
    //         return redirect()->back();
    //     }

    //     foreach ($data as $mcq) {
    //         DB::table('mcqs')->insert([
    //             'question'       => $mcq['question'] ?? '',
    //             'option_a'       => $mcq['option_a'] ?? '',
    //             'option_b'       => $mcq['option_b'] ?? '',
    //             'option_c'       => $mcq['option_c'] ?? '',
    //             'option_d'       => $mcq['option_d'] ?? '',
    //             'correct_option' => $mcq['correct_option'] ?? '',
    //             'explanation'    => $mcq['explanation'] ?? '',
    //             'title'          => $mcq['title'] ?? null,
    //             'image'          => $mcq['image'] ?? null,
    //             'category_id'    => $categoryId,
    //             'subcategory_id' => $subcategoryId,
    //             'topic_id'       => $topicId,
    //             'created_at'     => now(),
    //             'updated_at'     => now(),
    //         ]);
    //     }

    //     toastr()->success('MCQs imported successfully.');
    //     return redirect()->route('All.mcqs');
    // }

    public function importByEachCategory(Request $request)
    {
        try {
            $request->validate([
                'file' => 'required|mimes:json',
                'category_id' => 'required|exists:categories,id',
                'subcategory_id' => 'required|exists:subcategories,id',
                'topic_id' => 'required|exists:topics,id',
            ]);
        
            $categoryId = $request->category_id;
            $subcategoryId = $request->subcategory_id;
            $topicId = $request->topic_id;
        
            // Check file upload
            if (!$request->hasFile('file')) {
                toastr()->error('No file was uploaded.');
                return redirect()->back();
            }
            
            $file = $request->file('file');
            $jsonData = file_get_contents($file->getRealPath());
            
            // Check if file is empty
            if (empty($jsonData)) {
                toastr()->error('The uploaded file is empty.');
                return redirect()->back();
            }
            
            $data = json_decode($jsonData, true);
            
            // Check JSON decoding errors
            if (json_last_error() !== JSON_ERROR_NONE) {
                toastr()->error('Invalid JSON format: ' . json_last_error_msg());
                return redirect()->back();
            }
            
            if (!is_array($data)) {
                toastr()->error('Invalid JSON data format. Expected an array of MCQs.');
                return redirect()->back();
            }
            
            // Log the first item for debugging
            \Log::info('First MCQ item in JSON:', [
                'keys' => !empty($data[0]) ? array_keys($data[0]) : 'Empty data',
                'category_id' => $categoryId,
                'subcategory_id' => $subcategoryId,
                'topic_id' => $topicId
            ]);
    
        $errors = [];
        $successCount = 0;
        $uploadedQuestions = []; // Track questions in current upload
    
        foreach ($data as $index => $mcq) {
            // Validate required fields
            if (empty($mcq['question'])) {
                $errors[] = "Row " . ($index + 1) . ": Question is required";
                continue;
            }
    
            $question = trim($mcq['question']);
    
            // Check for duplicate in current upload file
            $questionLower = strtolower($question);
            if (isset($uploadedQuestions[$questionLower])) {
                $errors[] = "Row " . ($index + 1) . ": Duplicate question in upload file (also found at row " . $uploadedQuestions[$questionLower] . ")";
                continue;
            }
    
            // Check if question already exists in database for this topic
            $existingMcq = DB::table('mcqs')
                ->where('topic_id', $topicId)
                ->whereRaw('LOWER(question) = ?', [$questionLower])
                ->first();
    
            if ($existingMcq) {
                $errors[] = "Row " . ($index + 1) . ": Question already exists in database for this topic";
                continue;
            }
    
            // Mark this question as seen in current upload
            $uploadedQuestions[$questionLower] = $index + 1;
    
            // Check if correct_option key exists (try both 'correct_option' and 'correct_answer' for backward compatibility)
            $correctOption = null;
            if (isset($mcq['correct_option'])) {
                $correctOption = $mcq['correct_option'];
            } elseif (isset($mcq['correct_answer'])) {
                $correctOption = $mcq['correct_answer'];
                // Log the use of 'correct_answer' for debugging
                \Log::info('Using correct_answer instead of correct_option', ['row' => $index + 1]);
            } else {
                $errors[] = "Row " . ($index + 1) . ": Missing 'correct_option' key";
                continue;
            }
    
            // Normalize the correct option to lowercase and validate
            $correctOption = strtolower(trim($correctOption));
            
            // Check if the value is a number (1-4) and convert to letter if needed
            if (is_numeric($correctOption) && $correctOption >= 1 && $correctOption <= 4) {
                $correctOption = chr(96 + $correctOption); // Convert 1->a, 2->b, etc.
                \Log::info('Converted numeric option to letter', [
                    'original' => $mcq['correct_option'] ?? $mcq['correct_answer'] ?? 'none',
                    'converted' => $correctOption
                ]);
            }
            
            // Validate format: must be exactly 'a', 'b', 'c', or 'd' (case insensitive)
            if (!in_array($correctOption, ['a', 'b', 'c', 'd'])) {
                $errors[] = "Row " . ($index + 1) . ": Invalid 'correct_option' value '" . ($mcq['correct_option'] ?? $mcq['correct_answer'] ?? '') . "'. Must be a, b, c, or d (or 1, 2, 3, 4)";
                continue;
            }
    
            // Normalize to lowercase for database
            $correctOption = strtolower($correctOption);
    
            // Validate that the option exists
            $optionKey = 'option_' . $correctOption;
            if (!isset($mcq[$optionKey]) || empty($mcq[$optionKey])) {
                $errors[] = "Row " . ($index + 1) . ": Correct option '$correctOption' doesn't exist in the options";
                continue;
            }
    
            DB::table('mcqs')->insert([
                'question'       => $question,
                'option_a'       => $mcq['option_a'] ?? '',
                'option_b'       => $mcq['option_b'] ?? '',
                'option_c'       => $mcq['option_c'] ?? '',
                'option_d'       => $mcq['option_d'] ?? '',
                'correct_option' => $correctOption,
                'explanation'    => $mcq['explanation'] ?? '',
                'title'          => $mcq['title'] ?? null,
                'image'          => $mcq['image'] ?? null,
                'category_id'    => $categoryId,
                'subcategory_id' => $subcategoryId,
                'topic_id'       => $topicId,
                'created_at'     => now(),
                'updated_at'     => now(),
            ]);
    
            $successCount++;
        }
    
            // Log successful imports
            if ($successCount > 0) {
                \Log::info("Successfully imported $successCount MCQs", [
                    'category_id' => $categoryId,
                    'subcategory_id' => $subcategoryId,
                    'topic_id' => $topicId
                ]);
                toastr()->success("$successCount MCQs imported successfully.");
            } else {
                \Log::warning('No MCQs were imported', [
                    'total_attempted' => count($data),
                    'errors_count' => count($errors)
                ]);
            }
            
            // Show errors if any
            if (!empty($errors)) {
                $errorCount = count($errors);
                $maxErrorsToShow = 5;
                
                // Log all errors
                \Log::error("MCQ import encountered $errorCount errors", [
                    'first_few_errors' => array_slice($errors, 0, $maxErrorsToShow)
                ]);
                
                // Show first few errors to user
                foreach (array_slice($errors, 0, $maxErrorsToShow) as $error) {
                    toastr()->error($error);
                }
                
                if ($errorCount > $maxErrorsToShow) {
                    $remaining = $errorCount - $maxErrorsToShow;
                    toastr()->warning("$remaining more errors found. Check the log for details.");
                }
            }
            
            return redirect()->route('All.mcqs');
            
        } catch (\Exception $e) {
            \Log::error('Error in importByEachCategory: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            toastr()->error('An error occurred while importing MCQs. Please check the log for details.');
            return redirect()->back();
        }
    }




}

