@extends('layouts.app')

@section('contents')
<h2>About Us Pages</h2>
<a href="{{ route('aboutus.create') }}" class="btn btn-primary mb-3">Add New</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Image</th>
            <th>Meta Title</th>
            <th>Meta Description</th>
            <th>Meta Keywords</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($aboutus as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->title }}</td>
            <td>
                @if($item->image)
                    <img src="{{ asset($item->image) }}" width="60">
                @endif
            </td>
            <td>{{ $item->meta_title }}</td>
            <td>{{ Str::limit($item->meta_description, 50) }}</td>
            <td>{{ Str::limit($item->meta_keywords, 50) }}</td>

            <td>
                <a href="{{ route('aboutus.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('aboutus.destroy', $item->id) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Delete this page?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $aboutus->links() }}
@endsection
