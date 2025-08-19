<div class="mb-3">
    <label>Title</label>
    <input type="text" name="title" value="{{ old('title', $aboutus->title ?? '') }}" class="form-control" required>
</div>

<div class="mb-3">
    <label>Content</label>
    <textarea name="content" class="form-control">{{ old('content', $aboutus->content ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label>Image</label>
    <input type="file" name="image" class="form-control">
    @if(!empty($aboutus->image))
        <img src="{{ asset($aboutus->image) }}" width="100" class="mt-2">
    @endif
</div>

<hr>
<h5>SEO Meta Information</h5>

<div class="mb-3">
    <label>Meta Title</label>
    <input type="text" name="meta_title" value="{{ old('meta_title', $aboutus->meta_title ?? '') }}" class="form-control">
</div>

<div class="mb-3">
    <label>Meta Description</label>
    <textarea name="meta_description" rows="3" class="form-control">{{ old('meta_description', $aboutus->meta_description ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label>Meta Keywords <small>(comma separated)</small></label>
    <input type="text" name="meta_keywords" value="{{ old('meta_keywords', $aboutus->meta_keywords ?? '') }}" class="form-control">
</div>
