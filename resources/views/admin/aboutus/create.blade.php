@extends('layouts.app')

@section('contents')
<div class="container-fluid my-4">
    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-header bg-gradient text-white"
             style="background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);">
            <h4 class="mb-0"><i class="bi bi-info-circle me-2"></i> Add / Update About Us</h4>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('aboutus.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Title --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">Title</label>
                    <input type="text" name="title"
                        value="{{ old('title', $aboutus->title ?? '') }}"
                        class="form-control form-control-lg rounded-2 shadow-sm"
                        placeholder="Enter page title..." required>
                </div>

                {{-- Content --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">Content</label>
                    <textarea name="content" rows="5"
                        class="form-control rounded-2 shadow-sm"
                        placeholder="Write detailed content here...">{{ old('content', $aboutus->content ?? '') }}</textarea>
                </div>

                {{-- Image --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">Upload Image</label>
                    <input type="file" name="image" class="form-control shadow-sm">
                    @if(!empty($aboutus->image))
                        <div class="mt-3">
                            <img src="{{ asset($aboutus->image) }}" width="150" class="img-thumbnail shadow-sm">
                        </div>
                    @endif
                </div>

                <hr class="my-4">

                {{-- SEO Section --}}
                <h5 class="fw-bold text-primary mb-3">
                    <i class="bi bi-search me-2"></i> SEO Meta Information
                </h5>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Meta Title</label>
                        <input type="text" name="meta_title"
                            value="{{ old('meta_title', $aboutus->meta_title ?? '') }}"
                            class="form-control shadow-sm"
                            placeholder="SEO meta title...">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Meta Keywords <small>(comma separated)</small></label>
                        <input type="text" name="meta_keywords"
                            value="{{ old('meta_keywords', $aboutus->meta_keywords ?? '') }}"
                            class="form-control shadow-sm"
                            placeholder="about us, company, services">
                    </div>

                    <div class="col-12">
                        <label class="form-label">Meta Description</label>
                        <textarea name="meta_description" rows="3"
                            class="form-control shadow-sm"
                            placeholder="Short SEO description...">{{ old('meta_description', $aboutus->meta_description ?? '') }}</textarea>
                    </div>
                </div>

                <div class="text-end mt-4">
                    <button type="submit" class="btn btn-lg px-4 text-white shadow-sm"
                        style="background: linear-gradient(135deg, #1cc88a 0%, #17a673 100%);">
                        <i class="bi bi-save me-2"></i> Save About Us
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
