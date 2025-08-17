@extends('layouts.app')

{{-- @section('title', 'Data Category') --}}

@section('contents')
<form action="{{ isset($category) ? route('category.update', $category->id) : route('category.save') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-12"> <!-- Adjust the column width based on your layout -->

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ isset($category) ? 'Form Edit Category' : 'Form add Category' }}</h6>
                </div>

                <div class="card-body">
                    <div class="form-group col-4">
                        <label for="name">Title</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ isset($category) ? $category->name : '' }}" required>
                    </div>

                    <div class="form-group col-4">
                        <label for="name">Slug</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ isset($category) ? $category->name : '' }}" required>
                    </div>

                    <!-- Add the image field -->
                    <div class="form-group float-right">
                        <label for="image">Post Image</label>
                        <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
                    </div>

                    <div class="form-group col-4">
                        <label for="name">Description</label>
                        <textarea class="form-control" id="name" name="name" rows="5">{{ isset($category) ? $category->name : '' }}</textarea>
                    </div>

                                        <div class="form-group col-4">
                        <label for="name">Category</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ isset($category) ? $category->name : '' }}" required>
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

