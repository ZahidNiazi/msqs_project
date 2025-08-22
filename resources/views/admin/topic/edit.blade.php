@extends('layouts.app')

@section('contents')
<div class="container">
    <h2 class="mb-4">Edit Topic</h2>

    <form action="{{ route('admin.update.topic', $topic->id) }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="category_id">Select Category</label>
            <select name="category_id" id="category_id" class="form-control" required>
                <option value="">-- Select Category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $topic->subcategory->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="subcategory_id">Select Subcategory</label>
            <select name="subcategory_id" id="subcategory_id" class="form-control" required>
                <option value="">-- Select Subcategory --</option>
            </select>
            @error('subcategory_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            <small class="text-muted" id="subcategory-help">Please select a category first</small>
        </div>

        <div class="form-group">
            <label for="name">Topic Name</label>
            <input type="text" name="name" class="form-control" value="{{ $topic->name }}" required>
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Topic</button>
        <a href="{{ route('admin.all.topic') }}" class="btn btn-secondary">Back</a>
    </form>
</div>

<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    var currentSubcategoryId = {{ $topic->subcategory_id }};

    // When category changes
    $('#category_id').change(function() {
        var categoryId = $(this).val();
        var subcategorySelect = $('#subcategory_id');
        var subcategoryHelp = $('#subcategory-help');

        // Reset subcategory dropdown
        subcategorySelect.empty().append('<option value="">-- Select Subcategory --</option>');

        if (categoryId) {
            // Fetch subcategories for selected category
            $.ajax({
                url: '/admin/subcategories/by-category/' + categoryId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data.length > 0) {
                        // Add subcategory options
                        $.each(data, function(key, value) {
                            var selected = (value.id == currentSubcategoryId) ? 'selected' : '';
                            subcategorySelect.append('<option value="' + value.id + '" ' + selected + '>' + value.name + '</option>');
                        });

                        // Enable subcategory dropdown
                        subcategorySelect.prop('disabled', false);
                        subcategoryHelp.text('Select a subcategory from the list above');
                        subcategoryHelp.removeClass('text-danger').addClass('text-muted');
                    } else {
                        // No subcategories found
                        subcategorySelect.prop('disabled', true);
                        subcategoryHelp.text('No subcategories found for this category. Please select a different category.');
                        subcategoryHelp.removeClass('text-muted').addClass('text-danger');
                    }
                },
                error: function() {
                    subcategorySelect.prop('disabled', true);
                    subcategoryHelp.text('Error loading subcategories. Please try again.');
                    subcategoryHelp.removeClass('text-muted').addClass('text-danger');
                }
            });
        } else {
            // No category selected
            subcategorySelect.prop('disabled', true);
            subcategoryHelp.text('Please select a category first');
            subcategoryHelp.removeClass('text-danger').addClass('text-muted');
        }
    });

    // Trigger change event on page load to populate subcategories
    $('#category_id').trigger('change');
});
</script>
@endsection
