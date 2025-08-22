@extends('layouts.app')

@section('contents')
<div class="container-fluid">
    <h2 class="mb-4">Add New Topic</h2>

    <form action="{{ route('admin.save.topic') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="subcategory_id">Select Subcategory</label>
            <select name="subcategory_id" id="subcategory_id" class="form-control" required>
                <option value="">-- Select Subcategory --</option>
                @foreach($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                @endforeach
            </select>
            @error('subcategory_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="name">Topic Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter topic name" required>
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Save Topic</button>
        <a href="{{ route('admin.all.topic') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
