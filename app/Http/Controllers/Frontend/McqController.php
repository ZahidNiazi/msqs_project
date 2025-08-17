<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Mcq;

class McqController extends Controller
{
    public function index($cat = null)
    {
        $categories = Category::with('subcategories')->whereNull('parent_id')->get();
        $selectedCategory = null;
        // Always use paginate, even if $cat is null
        if (!$cat == null) {
            $selectedCategory = Category::findOrFail($cat);
            $mcqs = Mcq::with('category')->where('category_id', $cat)->orderBy('id', 'desc')->paginate(10);
        } else {
            $mcqs = Mcq::orderBy('id', 'desc')->paginate(10);
        }
        //return $mcqs;
        return view('frontend.mcqs', compact('categories', 'mcqs', 'selectedCategory'));
    }

    public function getSubcategories($id)
    {
        $subcategories = Category::where('parent_id', $id)->get();
        return response()->json($subcategories);
    }
}

