@extends('layouts.app')

@section('contents')
<div class="card shadow mb-4">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Import Categories (JSON)</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('category.import.json') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="json_file">Upload JSON file</label>
                <input type="file" name="json_file" id="json_file" class="form-control" accept=".json,text/json">
                @error('json_file') <div class="text-danger mt-1">{{ $message }}</div> @enderror
            </div>

            <button class="btn btn-success" type="submit">Import</button>
            <a href="{{ route('All.Category') }}" class="btn btn-secondary">Back</a>
        </form>

        @if(session('import_errors'))
            <div class="mt-3 alert alert-warning">
                <strong>Some rows had issues:</strong>
                <ul>
                    @foreach(session('import_errors') as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
@endsection
