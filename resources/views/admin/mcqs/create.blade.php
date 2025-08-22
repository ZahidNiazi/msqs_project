@extends('layouts.app')

{{-- @section('title', 'Data Category') --}}

@section('contents')
  <div class="card shadow mb-4" style="padding: 50px;">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-content">
                    <form  action="{{$action}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('admin.mcqs.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>



@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        // Load subcategories when category changes
        $('#category_id').on('change', function() {
            var category_id = $(this).val();
            if (category_id) {
                $.ajax({
                    url: '/subcategories/' + category_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        let options = '<option value="">Please Select</option>';
                        response.forEach(function(subcategory) {
                            options += '<option value="' + subcategory.id + '">' + subcategory.name + '</option>';
                        });
                        $('#subcategory_id').html(options);

                        // Select old value if exists (e.g., during validation error or edit)
                        let oldVal = "{{ old('subcategory_id', $mcq->subcategory_id ?? '') }}";
                        if (oldVal) {
                            $('#subcategory_id').val(oldVal);
                        }
                    }
                });
            } else {
                $('#subcategory_id').html('<option value="">Please Select</option>');
            }
        });

        // Trigger change on page load to load subcategories if category already selected
        if ($('#category_id').val()) {
            $('#category_id').trigger('change');
        }

        // Disable manual fields if a CSV file is selected
        $('input[type="file"][name="file"]').on('change', function() {
            const isFileSelected = this.files.length > 0;
            $('input[type="text"], select').not('[name="file"]').prop('disabled', isFileSelected);
        });
    });
</script>
@endpush
