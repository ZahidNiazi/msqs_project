{{-- @extends('layouts.app')

{{-- @section('title', 'Data Category') --}}

@section('contents')
<form action="{{ url('')}}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($category) ? 'Form Edit Category' : 'Form add Category' }}</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="nama">Name Category</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ isset($category) ? $category->name : '' }} " required>
            </div>
          </div>
           <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" 
                               value="{{ old('title', $category->title ?? '') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" id="description" name="description" 
                               value="{{ old('description', $category->description ?? '') }}" required>
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
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection
