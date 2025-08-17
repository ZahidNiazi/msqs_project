@extends('layouts.app')

@section('contents')
<div class="container-fluid">
    <h1 class="mb-4">Add SubCategory</h1>

    <form action="{{ route('subcategory.save') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="category_id">Select Category</label>
            <select name="category_id" id="category_id" class="form-control" required>
                <option value="">-- Select Category --</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
            @error('category_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="name">SubCategory Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter subcategory name" value="{{ old('name') }}" required>
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button class="btn btn-success" type="submit">Save SubCategory</button>
        <a href="{{ route('all.subcategory') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
