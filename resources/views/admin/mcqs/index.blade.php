@extends('layouts.app')

@section('contents')
<div class="container-fluid py-3">
    <div class="card shadow-sm border-0">

        <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">
            <h4 class="mb-0 fw-bold text-primary">All MCQs</h4>
            <a href="{{ route('mcqs.add') }}" class="btn btn-sm btn-success">
                <i class="fa fa-plus"></i> Add MCQ
            </a>
        </div>

        <div class="card-body">
            <!-- Search -->
            <form action="{{ route('mcqs.index') }}" method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control shadow-sm"
                           placeholder="🔍 Search for questions"
                           value="{{ $search ?? '' }}">
                    <button class="btn btn-primary shadow-sm" type="submit">Search</button>
                </div>
            </form>

            <!-- Table -->
            <div class="table-responsive">
                <table id="datatable-mcqs" class="table table-hover align-middle text-center">
                    <thead class="bg-gradient bg-primary text-white">
                        <tr>
                            <th>#</th>
                            <th>Question</th>
                            <th>A</th>
                            <th>B</th>
                            <th>C</th>
                            <th>D</th>
                            <th>Correct</th>
                            <th>Category</th>
                            <th>Explanation</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($mcqs as $mcq)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="truncate-cell" title="{{ $mcq->question }}">
                                {{ Str::limit($mcq->question, 40) }}
                            </td>
                            <td>{{ $mcq->option_a }}</td>
                            <td>{{ $mcq->option_b }}</td>
                            <td>{{ $mcq->option_c }}</td>
                            <td>{{ $mcq->option_d }}</td>
                            <td>
                                <span class="badge bg-success">{{ $mcq->correct_option }}</span>
                            </td>
                            <td>{{ $mcq->category_name }}</td>
                            <td class="truncate-cell" title="{{ $mcq->explanation }}">
                                {{ Str::limit($mcq->explanation, 40) }}
                            </td>
                            <td>{{ $mcq->title }}</td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('mcqs.edit', $mcq->id) }}"
                                       class="btn btn-sm btn-outline-primary" title="Edit">
                                        <i class="fa fa-pen"></i>
                                    </a>
                                    <form method="POST" action="{{ route('mcqs.delete', $mcq->id) }}">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Are you sure?')"
                                                title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="11" class="text-center text-muted">No Record Found!</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-3">
                {{ $mcqs->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.table thead th {
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: .5px;
}
.truncate-cell {
    max-width: 180px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.dataTables_wrapper .dataTables_paginate .pagination {
    justify-content: center !important;
}
.dataTables_wrapper .dataTables_paginate .page-item.active .page-link {
    background-color: #0d6efd !important;
    border-color: #0d6efd !important;
    color: #fff !important;
    border-radius: 50% !important;
}
.dataTables_wrapper .dataTables_paginate .page-link {
    border-radius: 50% !important;
    margin: 0 3px;
    padding: .5rem .8rem;
    color: #0d6efd;
}
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function () {
    $('#datatable-mcqs').DataTable({
        responsive: true,
        pageLength: 10,
        lengthMenu: [5, 10, 25, 50, 100],
        order: [[0, 'asc']],
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search MCQs..."
        },
        dom: '<"d-flex justify-content-between align-items-center mb-2"lf>t<"d-flex justify-content-between mt-3"ip>'
    });
});
</script>
@endpush
