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

}
