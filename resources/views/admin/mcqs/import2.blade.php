@extends('layouts.app')

@section('contents')
    <div class="container mt-4">
        <div class="card shadow-sm border-0" style="background-color: #f9f9f9;">
            <div class="card-body">
                <h4 class="mb-4 text-primary">Import MCQs for Correct_option selct any category, subcategory & topic </h4>

                <form action="{{ route('mcqs.import2') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">Category</label>
                            <select name="category_id" id="category" class="form-control" required>
                                <option value="">Select Category</option>
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">Subcategory</label>
                            <select name="subcategory_id" id="subcategory" class="form-control" required>
                                <option value="">Select Subcategory</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">Topic</label>
                            <select name="topic_id" id="topic" class="form-control" required disabled>
                                <option value="">Select Topic</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">Select JSON File</label>
                            <input type="file" name="file" class="form-control" accept=".json" required>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">
                                Import MCQs
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#category').on('change', function() {
            const categoryId = $(this).val();
            $('#subcategory').html('<option value="">Loading...</option>');
            $('#topic').html('<option value="">Select Topic</option>').prop('disabled', true);

            $.get('/get-subcategories/' + categoryId, function(data) {
                let options = '<option value="">Select Subcategory</option>';
                data.forEach(function(sub) {
                    options += `<option value="${sub.id}">${sub.name}</option>`;
                });
                $('#subcategory').html(options);
            });
        });

        $('#subcategory').on('change', function() {
            const subId = $(this).val();
            $('#topic').html('<option value="">Loading...</option>');

            $.get('/get-topics/' + subId, function(data) {
                if (data.length > 0) {
                    let options = '<option value="">Select Topic</option>';
                    data.forEach(function(topic) {
                        options += `<option value="${topic.id}">${topic.name}</option>`;
                    });
                    $('#topic').html(options).prop('disabled', false);
                } else {
                    $('#topic').html('<option value="">No Topics Found</option>').prop('disabled', true);
                }
            });
        });
    </script>
@endpush
