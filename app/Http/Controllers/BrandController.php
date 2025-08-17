<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::with('category')->get();
//dd($brands);
        return view('admin.brand.index',compact('brands'));
    }

    public function getSubcategoriesByCategory($category_id)
    {
        $brands = Brand::where('cat_id', $category_id)->get();
        return response()->json($brands);
    }

    public function add()
    {
         $category  = Category::all();
         $brands = Brand::all();

        return view('admin.brand.create',compact('category','brands'));


    }

    public function save(Request $request)
    {


        brand::create(['name' => $request->name ,'cat_id'=>$request->category_id]);

        toastr()->success('Brand Inserted Successfully');
        return redirect()->route('all.brand');

    }




    public function edit($id)
    {
        $brand = Brand::find($id);
        $category = Category::all();

        return view('admin.brand.create', ['brand' => $brand , 'category'=>$category]);
    }

    public function update($id, Request $request)
    {
        brand::find($id)->update(['name' => $request->name]);

        toastr()->success('Brand Updated Successfully');
        return redirect()->route('all.brand');
    }

    public function delete($id)
    {
        brand::destroy($id);
        toastr()->success('Brand Deleted Successfully');
        return redirect()->route('all.brand');

    }
}


