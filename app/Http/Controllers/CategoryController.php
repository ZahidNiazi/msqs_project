<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;



class CategoryController extends Controller
{

    public function index()
    {
        $categories = DB::table('categories')->orderBy('id', 'desc')->paginate(20);

        return view('admin.category.index', compact('categories'));
    }

    /// For Search Button
    public function search(Request $request)
    {
        $search = $request->input('search');

        $categories = DB::table('categories')
            ->where('name', 'like', "%$search%")
            ->get();
        if ($categories->isEmpty()) {
            return view('admin.category.index', ['message' => 'Category not available']);
        }
        return view('admin.category.index', compact('categories'));
    }

    // For Search Clear Button
    public function clear()
    {
    return redirect()->route('All.Category');
    }

    public function add()
    {
        return view('admin.category.create');

    }

    public function save(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:255',
            'title' => 'required|max:255',
            'description' => 'nullable|max:5000',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'name.required' => 'Please input category name',
            'title.required' => 'Please input category title',
        ]);

        $fileName = null;

        if ($request->hasFile('file')) {
            $fileName = $request->file('file')->getClientOriginalName();
            $request->file('file')->move(public_path('assets/banner'), $fileName);
        }

        DB::table('categories')->insert([
            'name' => $request->name,
            'title' => $request->title,
            'description' => $request->description,
            'file' => $fileName, // only the filename saved
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        toastr()->success('Category Inserted Successfully');
        return redirect()->route('All.Category');
    }

    public function edit($id)
    {
             $category = DB::table('categories')
            ->where('id', $id)
            ->first();

            return view('admin.category.create', ['category' => $category]);
    }

    public function update($id, Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'title' => 'required|max:255',
            'description' => 'nullable|max:5000',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $category = DB::table('categories')->where('id', $id)->first();

        $fileName = $category->file;

        if ($request->hasFile('file')) {
            $fileName = $request->file('file')->getClientOriginalName();
            $request->file('file')->move(public_path('assets/banner'), $fileName);
        }

        DB::table('categories')->where('id', $id)->update([
            'name' => $request->name,
            'title' => $request->title,
            'description' => $request->description,
            'file' => $fileName, // only filename saved
            'updated_at' => now(),
        ]);

        toastr()->success('Category Updated Successfully');
        return redirect()->route('All.Category');
    }


    public function delete($id)
    {

             $deleted = DB::table('categories')->where('id', $id)->delete();
             toastr()->success('Category Deleted Successfully');
             return redirect()->back();

    }

    public function getSubcategories($id)
    {
        $subcategories = Subcategory::where('category_id', $id)->get(['id', 'name']);
        return response()->json($subcategories);
    }

    // Show simple upload form (or you can include upload form in index blade)
public function importForm()
{
    return view('admin.category.import'); // we'll create this blade below
}

public function importJson(Request $request)
{
    // Validate uploaded file
    $request->validate([
        'json_file' => 'required|file|mimes:json,txt|max:10240', // up to 10MB
    ], [
        'json_file.required' => 'Please upload a JSON file.',
    ]);

    $file = $request->file('json_file');
    $content = file_get_contents($file->getRealPath());
    $data = json_decode($content, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        return redirect()->back()->withErrors(['json_file' => 'Invalid JSON file: ' . json_last_error_msg()]);
    }

    if (!is_array($data)) {
        return redirect()->back()->withErrors(['json_file' => 'JSON structure must be an array of category objects.']);
    }

    $inserted = 0;
    $skipped = 0;
    $errors = [];

    DB::beginTransaction();
    try {
        foreach ($data as $index => $item) {
            // Basic shape validation for each item
            $validator = Validator::make($item, [
                'name' => 'required|string|max:255',
                'title' => 'required|string|max:255',
                'description' => 'nullable|string|max:5000',
                'image' => 'nullable|string|url',
            ]);

            if ($validator->fails()) {
                $errors[] = "Row {$index}: " . implode(', ', $validator->errors()->all());
                $skipped++;
                continue;
            }

            // Skip if category with same name exists (change behavior to update if wanted)
            $exists = DB::table('categories')->where('name', $item['name'])->first();
            if ($exists) {
                $skipped++;
                continue;
            }

            $fileName = null;

            // If JSON provides image_url, try to download it
            if (!empty($item['image'])) {
                try {
                    // attempt to fetch remote image
                    $imgContents = @file_get_contents($item['image']);
                    if ($imgContents !== false) {
                        $ext = pathinfo(parse_url($item['image'], PHP_URL_PATH), PATHINFO_EXTENSION) ?: 'jpg';
                        $ext = preg_replace('/[^a-zA-Z0-9]/', '', $ext) ?: 'jpg';
                        $fileName = Str::slug($item['name']) . '_' . time() . '.' . $ext;
                        file_put_contents(public_path('assets/banner/' . $fileName), $imgContents);
                    }
                } catch (\Exception $e) {
                    // ignore, proceed without image
                }
            }

            // If JSON provides image_base64 (data URI or raw base64)

            // insert category
            DB::table('categories')->insert([
                'name' => $item['name'],
                'title' => $item['title'],
                'description' => $item['description'] ?? null,
                'file' => $fileName,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $inserted++;
        }

        DB::commit();
    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->back()->withErrors(['json_file' => 'Import failed: ' . $e->getMessage()]);
    }

    $msg = "Import finished. Inserted: {$inserted}. Skipped: {$skipped}.";
    if (count($errors) > 0) {
        // attach a small report in session (you can store more if needed)
        session()->flash('import_errors', $errors);
    }

    toastr()->success($msg);
    return redirect()->route('All.Category');
}


}
