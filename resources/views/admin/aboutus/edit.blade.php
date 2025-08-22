@extends('layouts.app')

@section('contents')
<h2>Edit About Us</h2>
<form action="{{ route('aboutus.update', $aboutus->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- Title -->
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" value="{{ old('title', $aboutus->title) }}" class="form-control" required>
    </div>

    <!-- Content -->
    <div class="form-group mt-3">
        <label for="content">Content</label>
        <textarea name="content" class="form-control" rows="5">{{ old('content', $aboutus->content) }}</textarea>
    </div>

    <!-- Image -->
    <div class="form-group mt-3">
        <label for="image">Image</label><br>
        @if($aboutus->image)
            <img src="{{ asset($aboutus->image) }}" width="120" class="mb-2"><br>
        @endif
        <input type="file" name="image" class="form-control">
    </div>

    <!-- Meta Fields -->
    <div class="form-group mt-3">
        <label for="meta_title">Meta Title</label>
        <input type="text" name="meta_title" value="{{ old('meta_title', $aboutus->meta_title) }}" class="form-control">
    </div>

    <div class="form-group mt-3">
        <label for="meta_description">Meta Description</label>
        <textarea name="meta_description" class="form-control">{{ old('meta_description', $aboutus->meta_description) }}</textarea>
    </div>

    <div class="form-group mt-3">
        <label for="meta_keywords">Meta Keywords</label>
        <input type="text" name="meta_keywords" value="{{ old('meta_keywords', $aboutus->meta_keywords) }}" class="form-control">
    </div>

    <!-- Submit -->
    <button type="submit" class="btn btn-primary mt-4">Update</button>
</form>

@endsection
