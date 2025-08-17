<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



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
            'description' => 'nullable|max:1000',
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
            'description' => 'nullable|max:1000',
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

}
