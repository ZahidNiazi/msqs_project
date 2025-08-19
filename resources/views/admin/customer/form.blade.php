<form action="{{ route('mcqs.import') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Upload CSV</label>
        <div class="col-sm-8">
            <input type="file" name="file" class="form-control" accept=".csv,.json" required>
        </div>
    </div>
    <div class="form-group row mt-3">
        <div class="col-sm-8 offset-sm-2">
            <button type="submit" class="btn btn-success">Import</button>
        </div>
    </div>
</form>

<h2>MCQ</h2>
<div class="hr-line-dashed"></div>

<form action="{{ route('mcqs.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row g-3">
        <div class="col-md-3">
            <label class="form-label">Question</label>
            <input type="text" class="form-control @error('question') is-invalid @enderror" name="question" value="{{ old('question', $mcq->question ?? '') }}" placeholder="Question" required>
            @error('question')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="col-md-3">
            <label class="form-label">Option A</label>
            <input type="text" class="form-control @error('option_a') is-invalid @enderror" name="option_a" value="{{ old('option_a', $mcq->option_a ?? '') }}" placeholder="Option A" required>
            @error('option_a')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="col-md-3">
            <label class="form-label">Option B</label>
            <input type="text" class="form-control @error('option_b') is-invalid @enderror" name="option_b" value="{{ old('option_b', $mcq->option_b ?? '') }}" placeholder="Option B" required>
            @error('option_b')<span class="text-danger">{{ $message }}</span>@enderror
    </div>
        <div class="col-md-3">
            <label class="form-label">Option C</label>
            <input type="text" class="form-control @error('option_c') is-invalid @enderror" name="option_c" value="{{ old('option_c', $mcq->option_c ?? '') }}" placeholder="Option C" required>
            @error('option_c')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="col-md-3">
            <label class="form-label">Option D</label>
            <input type="text" class="form-control @error('option_d') is-invalid @enderror" name="option_d" value="{{ old('option_d', $mcq->option_d ?? '') }}" placeholder="Option D" required>
            @error('option_d')<span class="text-danger">{{ $message }}</span>@enderror
    </div>
        <div class="col-md-3">
            <label class="form-label">Category</label>
            <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                <option value="">Please Select</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}" @if(old('category_id', $mcq->category_id ?? '') == $category->id) selected @endif>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="col-md-3">
            <label class="form-label">Sub Category</label>
            <select class="form-control @error('subcategory_id') is-invalid @enderror" id="subcategory_id" name="subcategory_id">
                <option value="">Please Select</option>
            </select>
            @error('subcategory_id')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="col-md-3">
            <label class="form-label">Topic</label>
            <select class="form-control @error('topic_id') is-invalid @enderror" id="topic_id" name="topic_id" required>
                <option value="">Please Select</option>
                @foreach($topics as $topic)
                    <option value="{{ $topic->id }}" @if(old('topic_id', $mcq->topic_id ?? '') == $topic->id) selected @endif>
                        {{ $topic->name }}
                    </option>
                @endforeach
            </select>
            @error('topic_id')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="col-md-3">
            <label class="form-label">Correct Option</label>
            <select name="correct_option" class="form-control select2">
                @foreach(['a', 'b', 'c', 'd'] as $letter)
                <option value="{{ $letter }}" @if(old('correct_option', $mcq->correct_option ?? '') == $letter) selected @endif>Option {{ strtoupper($letter) }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label">Explanation</label>
            <input type="text" class="form-control @error('explanation') is-invalid @enderror" name="explanation" value="{{ old('explanation', $mcq->explanation ?? '') }}" placeholder="Explanation" required>
            @error('explanation')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="col-md-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $mcq->title ?? '') }}" placeholder="Title">
            @error('title')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12 text-end">
            <button class="btn btn-primary" type="submit">Save changes</button>
        </div>
    </div>
</form>
<div>

