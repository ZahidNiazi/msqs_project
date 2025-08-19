<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $aboutus = AboutUs::latest()->paginate(10);
        return view('admin.aboutus.index', compact('aboutus'));
    }

    public function create()
    {
        return view('admin.aboutus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:255',
        ]);

        $data = $request->only(['title', 'content', 'meta_title', 'meta_description', 'meta_keywords']);

        if ($request->hasFile('image')) {
            $imageName = time().'_'.$request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/aboutus'), $imageName);
            $data['image'] = 'uploads/aboutus/'.$imageName;
        }

        AboutUs::create($data);

        return redirect()->route('aboutus.index')->with('success', 'About Us created successfully.');
    }

    public function edit(AboutUs $aboutus)
    {
        return view('admin.aboutus.edit', compact('aboutus'));
    }

    public function update(Request $request, AboutUs $aboutus)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:255',
        ]);

        $data = $request->only(['title', 'content', 'meta_title', 'meta_description', 'meta_keywords']);

        if ($request->hasFile('image')) {
            if ($aboutus->image && file_exists(public_path($aboutus->image))) {
                unlink(public_path($aboutus->image));
            }
            $imageName = time().'_'.$request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/aboutus'), $imageName);
            $data['image'] = 'uploads/aboutus/'.$imageName;
        }

        $aboutus->update($data);

        return redirect()->route('aboutus.index')->with('success', 'About Us updated successfully.');
    }

    public function destroy(AboutUs $aboutus)
    {
        if ($aboutus->image && file_exists(public_path($aboutus->image))) {
            unlink(public_path($aboutus->image));
        }
        $aboutus->delete();
        return redirect()->route('aboutus.index')->with('success', 'About Us deleted successfully.');
    }
}

