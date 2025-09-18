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

        public function importByEachCategory(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:json',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'required|exists:subcategories,id',
            'topic_id' => 'required|exists:topics,id',
        ]);

        $categoryId = $request->category_id;
        $subcategoryId = $request->subcategory_id;
        $topicId = $request->topic_id;

        $jsonData = file_get_contents($request->file('file')->getRealPath());
        $data = json_decode($jsonData, true);

        if (!is_array($data)) {
            toastr()->error('Invalid JSON format.');
            return redirect()->back();
        }

        foreach ($data as $mcq) {
            DB::table('mcqs')->insert([
                'question'       => $mcq['question'] ?? '',
                'option_a'       => $mcq['option_a'] ?? '',
                'option_b'       => $mcq['option_b'] ?? '',
                'option_c'       => $mcq['option_c'] ?? '',
                'option_d'       => $mcq['option_d'] ?? '',
                'correct_option' => $mcq['correct_option'] ?? '',
                'explanation'    => $mcq['explanation'] ?? '',
                'title'          => $mcq['title'] ?? null,
                'image'          => $mcq['image'] ?? null,
                'category_id'    => $categoryId,
                'subcategory_id' => $subcategoryId,
                'topic_id'       => $topicId,
                'created_at'     => now(),
                'updated_at'     => now(),
            ]);
        }

        toastr()->success('MCQs imported successfully.');
        return redirect()->route('All.mcqs');
    }




}

