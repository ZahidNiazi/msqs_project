<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Models\Category;


class TopicController extends Controller
{
    public function index()
    {
        $topics = Topic::with(['subcategory.category'])->paginate(10);
        return view('admin.topic.index', compact('topics'));
    }

    public function add()
    {
        $categories = Category::all();
        return view('admin.topic.add', compact('categories'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'required|exists:subcategories,id',
            'name' => 'required|string|max:255',
        ]);

        Topic::create([
            'subcategory_id' => $request->subcategory_id,
            'name' => $request->name,
        ]);

        return redirect()->route('admin.all.topic')->with('success', 'Topic added successfully');
    }

    public function edit($id)
    {
        $topic = Topic::findOrFail($id);
        $categories = Category::all();
        return view('admin.topic.edit', compact('topic', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'required|exists:subcategories,id',
            'name' => 'required|string|max:255',
        ]);

        $topic = Topic::findOrFail($id);
        $topic->update([
            'subcategory_id' => $request->subcategory_id,
            'name' => $request->name,
        ]);

        return redirect()->route('admin.all.topic')->with('success', 'Topic updated successfully');
    }

    public function delete($id)
    {
        $topic = Topic::findOrFail($id);
        $topic->delete();

        return redirect()->route('admin.all.topic')->with('success', 'Topic deleted successfully');
    }

    public function getBySubcategory($subcategory_id)
    {
        $topics = Topic::where('subcategory_id', $subcategory_id)->get();
        return response()->json($topics);
    }

    public function addTopicForm()
    {
        $categories = Category::all();
        return view('admin.topic.add', compact('categories'));
    }

    public function saveTopic(Request $request)
    {
        $request->validate([
            'subcategory_id' => 'required|exists:subcategories,id',
            'name' => 'required|string|max:255',
        ]);

        Topic::create([
            'subcategory_id' => $request->subcategory_id,
            'name' => $request->name,
        ]);

        return redirect()->route('admin.all.topic')->with('success', 'Topic added successfully');
    }

    public function getSubcategoriesByCategory($category_id)
    {
        $subcategories = Subcategory::where('category_id', $category_id)->get();
        return response()->json($subcategories);
    }
}

