<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
   public function index()
   {
       return view('blog.backend.post.index');
   }

      public function add()
   {
       return view('blog.backend.post.create');
   
 }
    public function save(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|max:255',
            'description' => 'required',
            'postCate_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the image validation rules as needed
            // Add validation rules for other fields (description, category) here
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
        }

        // Create a new category record
        $post = new Category();
        $post->name = $request->input('name');
        $post->image = $imageName; // Save the image file name
        // Set values for other fields (description, category) here

        $post->save();

        // Redirect back with a success message
        return redirect()->route('all.post')->with('success', 'Post Inserted Successfully');
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
             $updated = DB::table('categories')
            ->where('id', $id)
            ->update(['name' => $request->name]);

             toastr()->success('Category Updated Successfully');
             return redirect()->route('All.Category');
    }

    public function delete($id)
    {

             $deleted = DB::table('categories')->where('id', $id)->delete();
             toastr()->success('Category Deleted Successfully');
             return redirect()->back();

    }
    


  
}
