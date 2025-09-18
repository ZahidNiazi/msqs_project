@extends('layouts.app')

@section('contents')
<div class="card shadow mb-4">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Import SubCategories (JSON)</h6>
    </div>
    <div class="card-body">
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('subcategory.import.json') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="json_file">Upload JSON File</label>
                <input type="file" name="json_file" id="json_file" class="form-control" accept=".json,.txt">
                @error('json_file')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">
                <i class="fas fa-upload"></i> Import
            </button>
            <a href="{{ route('all.subcategory') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
</div>
@endsection
