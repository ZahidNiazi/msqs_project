<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;

class SubCategoryController extends Controller
{

    public function getByCategory($category_id)
    {
        $subcategories = SubCategory::where('category_id', $category_id)->get();

        return response()->json($subcategories);
    }
    // Show all subcategories
    public function index()
    {
        $subcategories = Subcategory::with('category')->paginate(10);
        return view('admin.subcategory.index', compact('subcategories'));
    }

    // Show create form
    public function add()
    {
        $categories = Category::all();
        return view('admin.subcategory.add', compact('categories'));
    }

    // Save new subcategory
    public function save(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
        ]);

        SubCategory::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
        ]);

        return redirect()->route('all.subcategory')->with('success', 'Subcategory added successfully');
    }

    // Show edit form
    public function edit($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $categories = Category::all();
        return view('admin.subcategory.edit', compact('subcategory', 'categories'));
    }

    // Update subcategory
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
        ]);

        $subcategory = SubCategory::findOrFail($id);
        $subcategory->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
        ]);

        return redirect()->route('admin.all.subcategory')->with('success', 'Subcategory updated successfully');
    }

    // Delete subcategory
    public function delete($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->delete();

        return redirect()->route('all.subcategory')->with('success', 'Subcategory deleted successfully');
    }

    // Show import form
    public function importForm()
    {
        $categories = Category::all();
        return view('admin.subcategory.import', compact('categories'));
    }

    // Handle JSON upload
    public function importJson(Request $request)
    {
        $request->validate([
            'json_file' => 'required|file|mimes:json,txt',
        ]);

        $jsonData = json_decode(file_get_contents($request->file('json_file')), true);


        if (!$jsonData || !is_array($jsonData)) {
            return back()->with('error', 'Invalid JSON format.');
        }

        foreach ($jsonData as $item) {
            if (isset($item['name'], $item['category_id'])) {
                SubCategory::updateOrCreate(
                    ['name' => $item['name'], 'category_id' => $item['category_id']],
                    ['name' => $item['name']]
                );
            }
        }

        return redirect()->route('all.subcategory')->with('success', 'Subcategories imported successfully.');
    }



}
