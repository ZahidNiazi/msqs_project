@extends('layouts.app')

@section('contents')
<form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Category</h6>
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
                        <textarea class="form-control" id="description" name="description" rows="10">{{ old('description', $category->description ?? '') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="file">Category Image</label>
                        <input type="file" class="form-control-file" id="file" name="file">

                        @if(isset($category) && $category->file)
                            <div class="mt-2">
                                <img src="{{ asset('assets/banner/' . $category->file) }}" alt="Current Image" height="60">
                            </div>
                        @endif
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('All.Category') }}" class="btn btn-secondary">Back</a>
                </div>

            </div>
        </div>
    </div>
</form>

<!-- CKEditor CDN -->
<script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create(document.querySelector('#description'), {
            toolbar: {
                items: [
                    'heading',
                    '|',
                    'bold',
                    'italic',
                    'link',
                    'bulletedList',
                    'numberedList',
                    '|',
                    'outdent',
                    'indent',
                    '|',
                    'blockQuote',
                    'insertTable',
                    'undo',
                    'redo'
                ]
            },
            language: 'en',
            image: {
                toolbar: [
                    'imageTextAlternative',
                    'imageStyle:full',
                    'imageStyle:side'
                ]
            },
            table: {
                contentToolbar: [
                    'tableColumn',
                    'tableRow',
                    'mergeTableCells'
                ]
            }
        })
        .then(editor => {
            console.log('CKEditor initialized successfully');
        })
        .catch(error => {
            console.error('Error initializing CKEditor:', error);
        });
</script>
@endsection
