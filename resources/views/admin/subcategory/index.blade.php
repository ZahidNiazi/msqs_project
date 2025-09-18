@extends('layouts.app')

@section('contents') {{-- Make sure this matches your layout --}}
<div class="container-fluid">
    <h1 class="mb-4">All SubCategories</h1>

    <a href="{{ route('subcategory.add') }}" class="btn btn-success mb-3">Add New SubCategory</a>
    <a href="{{ route('subcategory.import.form') }}" class="btn btn-info mb-3 ml-2">
    <i class="fas fa-file-upload"></i> Import SubCategories
    </a>


    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="subcategoryTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>SubCategory Name</th>
                            <th>Category</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($subcategories as $subcat)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $subcat->name }}</td>
                            <td>{{ $subcat->category->name ?? 'N/A' }}</td>
                            <td>{{ $subcat->created_at->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('subcategory.edit', $subcat->id) }}" class="btn btn-primary btn-sm">Edit</a>

                                <a href="{{ route('subcategory.delete', $subcat->id) }}"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this subcategory?');">
                                    Delete
                                 </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">No SubCategories found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                {{-- Pagination if you use paginate() in the controller --}}
                {{ $subcategories->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
