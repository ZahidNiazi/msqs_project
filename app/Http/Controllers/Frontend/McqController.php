<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Mcq;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Pagination\LengthAwarePaginator;

class McqController extends Controller
{
    public function index($cat = null)
    {
        $categories = Category::with('subcategories')->whereNull('parent_id')->get();
        $categories = \App\Models\Category::with('subcategories')->get();
        $selectedCategory = null;

        try {
            // Always use paginate, even if $cat is null
            if ($cat !== null) {
                $selectedCategory = Category::findOrFail($cat);
                $mcqs = Mcq::with(['category', 'subCategory', 'topic'])
                    ->where('category_id', $cat)
                    ->orderBy('id', 'desc')
                    ->paginate(10);
            } else {
                $mcqs = Mcq::with(['category', 'subCategory', 'topic'])
                    ->orderBy('id', 'desc')
                    ->paginate(10);
            }

            // Debug: Check if MCQs are being fetched
            if ($mcqs->isEmpty()) {
                Log::info('No MCQs found. Category: ' . ($cat ?? 'all'));
            } else {
                Log::info('MCQs found: ' . $mcqs->count() . ' records');
            }

            return view('frontend.mcqs', compact('categories', 'mcqs', 'selectedCategory'));

        } catch (\Exception $e) {
            Log::error('Error fetching MCQs: ' . $e->getMessage());

            // Return empty MCQs collection on error - create empty paginator
            $mcqs = new LengthAwarePaginator(
                collect(), // empty collection
                0, // total items
                10, // items per page
                1, // current page
                ['path' => request()->url()]
            );
            return view('frontend.mcqs', compact('categories', 'mcqs', 'selectedCategory'));
        }
    }

    public function getSubcategories($id)
    {
        try {
            $subcategories = Category::where('parent_id', $id)->get();
            return response()->json($subcategories);
        } catch (\Exception $e) {
            Log::error('Error fetching subcategories: ' . $e->getMessage());
            return response()->json([]);
        }
    }
}

