

<h2>MCQ Details</h2>
<div class="hr-line-dashed"></div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Question</label>
    <div class="col-sm-8">
        <textarea class="form-control @error('question') invalid @enderror" name="question" rows="4" required>{{ old('question', $mcq->question ?? '') }}</textarea>
        @error('question')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Option A</label>
    <div class="col-sm-8">
        <input type="text" class="form-control @error('option_a') invalid @enderror" name="option_a" value="{{ old('option_a', $mcq->option_a ?? '') }}" required>
        @error('option_a')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Option B</label>
    <div class="col-sm-8">
        <input type="text" class="form-control @error('option_b') invalid @enderror" name="option_b" value="{{ old('option_b', $mcq->option_b ?? '') }}" required>
        @error('option_b')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Option C</label>
    <div class="col-sm-8">
        <input type="text" class="form-control @error('option_c') invalid @enderror" name="option_c" value="{{ old('option_c', $mcq->option_c ?? '') }}" required>
        @error('option_c')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Option D</label>
    <div class="col-sm-8">
        <input type="text" class="form-control @error('option_d') invalid @enderror" name="option_d" value="{{ old('option_d', $mcq->option_d ?? '') }}" required>
        @error('option_d')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Correct Option</label>
    <div class="col-sm-8">
        <select class="form-control @error('correct_option') invalid @enderror" name="correct_option" required>
            <option value="">Please Select</option>
            <option value="a" {{ (old('correct_option', $mcq->correct_option ?? '') == 'a') ? 'selected' : '' }}>A</option>
            <option value="b" {{ (old('correct_option', $mcq->correct_option ?? '') == 'b') ? 'selected' : '' }}>B</option>
            <option value="c" {{ (old('correct_option', $mcq->correct_option ?? '') == 'c') ? 'selected' : '' }}>C</option>
            <option value="d" {{ (old('correct_option', $mcq->correct_option ?? '') == 'd') ? 'selected' : '' }}>D</option>
        </select>
        @error('correct_option')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Explanation</label>
    <div class="col-sm-8">
        <textarea class="form-control @error('explanation') invalid @enderror" name="explanation" rows="3" required>{{ old('explanation', $mcq->explanation ?? '') }}</textarea>
        @error('explanation')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Title</label>
    <div class="col-sm-8">
        <input type="text" class="form-control @error('title') invalid @enderror" name="title" value="{{ old('title', $mcq->title ?? '') }}">
        @error('title')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
</div>

<div class="hr-line-dashed"></div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Category</label>
    <div class="col-sm-8">
        <select class="form-control @error('category_id') invalid @enderror" id="category_id" name="category_id" required >
            <option value="">Please Select</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}" @if(isset($mcq) && $mcq->category_id == $category->id) selected @endif>{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Subcategory</label>
    <div class="col-sm-8">
        <select class="form-control @error('subcategory_id') invalid @enderror" id="subcategory_id" name="subcategory_id" required {{ empty($subcategories) ? 'disabled' : '' }}>
            <option value="">Please Select</option>
            @foreach($subcategories as $subcategory)
            <option value="{{ $subcategory->id }}" @if(isset($mcq) && $mcq->subcategory_id == $subcategory->id) selected @endif>{{ $subcategory->name }}</option>
            @endforeach
        </select>
        @error('subcategory_id')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <small class="text-muted" id="subcategory-help">
            {{ empty($subcategories) ? 'Please select a category first' : 'Select a subcategory from the list above' }}
        </small>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Topic</label>
    <div class="col-sm-8">
        <select class="form-control @error('topic_id') invalid @enderror" id="topic_id" name="topic_id" required {{ empty($topics) ? 'disabled' : '' }}>
            <option value="">Please Select</option>
            @foreach($topics as $topic)
            <option value="{{ $topic->id }}" @if(isset($mcq) && $mcq->topic_id == $topic->id) selected @endif>{{ $topic->name }}</option>
            @endforeach
        </select>
        @error('topic_id')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <small class="text-muted" id="topic-help">
            {{ empty($topics) ? 'Please select a subcategory first' : 'Select a topic from the list above' }}
        </small>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Image (Optional)</label>
    <div class="col-sm-8">
        <input type="file" class="form-control-file" name="image" accept="image/*">
        @if(isset($mcq) && $mcq->image)
            <div class="mt-2">
                <img src="{{ asset('storage/' . $mcq->image) }}" alt="Current Image" height="60">
            </div>
        @endif
    </div>
</div>

<div class="hr-line-dashed"></div>

<div class="form-group row">
    <div class="col-sm-4 col-sm-offset-2">
        <button class="btn btn-primary btn-sm" type="submit">
            {{ isset($mcq) ? 'Update MCQ' : 'Create MCQ' }}
        </button>
    </div>
</div>
</div>


@push('scripts')
<script>
$(document).ready(function() {
    // When category changes
    $('#category_id').change(function() {
        var categoryId = $(this).val();
        var subcategorySelect = $('#subcategory_id');
        var topicSelect = $('#topic_id');
        var subcategoryHelp = $('#subcategory-help');
        var topicHelp = $('#topic-help');

        // Reset subcategory and topic dropdowns
        subcategorySelect.empty().append('<option value="">Please Select</option>');
        topicSelect.empty().append('<option value="">Please Select</option>');

        if (categoryId) {
            // Fetch subcategories for selected category
            $.ajax({
                url: '/subcategories/' + categoryId,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.length > 0) {
                        // Add subcategory options
                        $.each(response, function(key, value) {
                            subcategorySelect.append('<option value="' + value.id + '">' + value.name + '</option>');
                        });

                        // Enable subcategory dropdown
                        subcategorySelect.prop('disabled', false);
                        subcategoryHelp.text('Select a subcategory from the list above');
                        subcategoryHelp.removeClass('text-danger').addClass('text-muted');

                        // Disable topic dropdown
                        topicSelect.prop('disabled', true);
                        topicHelp.text('Please select a subcategory first');
                        topicHelp.removeClass('text-danger').addClass('text-muted');
                    } else {
                        // No subcategories found
                        subcategorySelect.prop('disabled', true);
                        subcategoryHelp.text('No subcategories found for this category. Please select a different category.');
                        subcategoryHelp.removeClass('text-muted').addClass('text-danger');

                        // Disable topic dropdown
                        topicSelect.prop('disabled', true);
                        topicHelp.text('No subcategories available');
                        topicHelp.removeClass('text-danger').addClass('text-muted');
                    }
                },
                error: function() {
                    subcategorySelect.prop('disabled', true);
                    subcategoryHelp.text('Error loading subcategories. Please try again.');
                    subcategoryHelp.removeClass('text-muted').addClass('text-danger');

                    topicSelect.prop('disabled', true);
                    topicHelp.text('Error loading subcategories');
                    topicHelp.removeClass('text-danger').addClass('text-muted');
                }
            });
        } else {
            // No category selected
            subcategorySelect.prop('disabled', true);
            subcategoryHelp.text('Please select a category first');
            subcategoryHelp.removeClass('text-danger').addClass('text-muted');

            topicSelect.prop('disabled', true);
            topicHelp.text('Please select a category first');
            topicHelp.removeClass('text-danger').addClass('text-muted');
        }
    });

    // When subcategory changes
    $('#subcategory_id').change(function() {
        var subcategoryId = $(this).val();
        var topicSelect = $('#topic_id');
        var topicHelp = $('#topic-help');

        // Reset topic dropdown
        topicSelect.empty().append('<option value="">Please Select</option>');

        if (subcategoryId) {
            // Fetch topics for selected subcategory
            $.ajax({
                url: '/get-topics/' + subcategoryId,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.length > 0) {
                        // Add topic options
                        $.each(response, function(key, value) {
                            topicSelect.append('<option value="' + value.id + '">' + value.name + '</option>');
                        });

                        // Enable topic dropdown
                        topicSelect.prop('disabled', false);
                        topicHelp.text('Select a topic from the list above');
                        topicHelp.removeClass('text-danger').addClass('text-muted');
                    } else {
                        // No topics found
                        topicSelect.prop('disabled', true);
                        topicHelp.text('No topics found for this subcategory. Please select a different subcategory.');
                        topicHelp.removeClass('text-muted').addClass('text-danger');
                    }
                },
                error: function() {
                    topicSelect.prop('disabled', true);
                    topicHelp.text('Error loading topics. Please try again.');
                    topicHelp.removeClass('text-muted').addClass('text-danger');
                }
            });
        } else {
            // No subcategory selected
            topicSelect.prop('disabled', true);
            topicHelp.text('Please select a subcategory first');
            topicHelp.removeClass('text-danger').addClass('text-muted');
        }
    });

    // Trigger change on page load to load subcategories if category already selected
    if ($('#category_id').val()) {
        $('#category_id').trigger('change');
    }
});
</script>
@endpush

