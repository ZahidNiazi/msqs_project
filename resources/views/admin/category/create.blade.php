@extends('layouts.app')

@section('contents')
<form action="{{ isset($category) ? route('category.update', $category->id) : route('category.save') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        {{ isset($category) ? 'Edit Category' : 'Add Category' }}
                    </h6>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="text" class="form-control" id="name" name="name" 
                               value="{{ old('name', $category->name ?? '') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" 
                               value="{{ old('title', $category->title ?? '') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                               <textarea type="text" class="form-control" id="description" name="description"  cols="30" rows="10" required
                                   value="{{ old('description', $category->description ?? '') }}">
                               </textarea>
                    </div>

                    <div class="form-group">
                        <label for="file">Category Image</label>
                        <input type="file" class="form-control-file" id="file" name="file">
                        
                        @if(isset($category) && $category->file)
                            <div class="mt-2">
                                <img src="{{ asset($category->file) }}" alt="Current Image" height="60">
                            </div>
                        @endif
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>

            </div>
        </div>
    </div>
</form>
@endsection

