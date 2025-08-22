@extends('layouts.app')

@section('contents')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary mb-0">📄 About Us Pages</h2>
        <a href="{{ route('aboutus.create') }}" class="btn btn-success shadow-sm">
            <i class="bi bi-plus-circle me-1"></i> Add New Page
        </a>
    </div>

    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Meta Title</th>
                            <th>Meta Description</th>
                            <th>Meta Keywords</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($aboutus as $item)
                        <tr>
                            <td class="fw-bold">{{ $loop->iteration }}</td>
                            <td>
                                <span class="fw-semibold">{{ $item->title }}</span>
                            </td>
                            <td>
                                @if($item->image)
                                    <img src="{{ asset($item->image) }}"
                                         class="img-thumbnail rounded"
                                         style="width: 70px; height: 70px; object-fit: cover;">
                                @else
                                    <span class="badge bg-secondary">No Image</span>
                                @endif
                            </td>
                            <td><span class="text-truncate d-inline-block" style="max-width: 150px;">{{ $item->meta_title }}</span></td>
                            <td><span class="text-muted small">{{ Str::limit($item->meta_description, 50) }}</span></td>
                            <td><span class="text-muted small">{{ Str::limit($item->meta_keywords, 50) }}</span></td>
                            <td class="text-center">
                                <a href="{{ route('aboutus.edit', $item->id) }}" class="btn btn-sm btn-outline-primary me-2">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <form action="{{ route('aboutus.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Delete this page?')">
                                        <i class="bi bi-trash3"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">
                                <div class="text-muted">No About Us pages found.</div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer bg-light d-flex justify-content-center">
            {{ $aboutus->links() }}
        </div>
    </div>
</div>
@endsection
