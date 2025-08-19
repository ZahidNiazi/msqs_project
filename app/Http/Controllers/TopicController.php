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
        $topics = Topic::with('subcategory')->paginate(10);
        return view('admin.topic.index', compact('topics'));
    }

    public function add()
    {
        $subcategories = Subcategory::all();
        return view('admin.topic.add', compact('subcategories'));
    }

    public function save(Request $request)
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

    public function edit($id)
    {
        $topic = Topic::findOrFail($id);
        $subcategories = Subcategory::all();
        return view('admin.topic.edit', compact('topic', 'subcategories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
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
    $categories = Category::all(); // Fetch all categories
    return view('admin.topic.add', compact('categories'));
}



}

