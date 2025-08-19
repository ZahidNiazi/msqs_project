@extends('layouts.app')

@section('contents')
<div class="container">
    <h2 class="mb-4">All Topics</h2>

    <a href="{{ route('admin.add.topic') }}" class="btn btn-primary mb-3">Add New Topic</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Topic Name</th>
                <th>Subcategory</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($topics as $topic)
                <tr>
                    <td>{{ $topic->id }}</td>
                    <td>{{ $topic->name }}</td>
                    <td>{{ $topic->subcategory->name ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('admin.edit.topic', $topic->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <a href="{{ route('admin.delete.topic', $topic->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this topic?')">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $topics->links() }}
</div>
@endsection
