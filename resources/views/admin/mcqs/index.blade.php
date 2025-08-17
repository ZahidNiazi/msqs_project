@extends('layouts.app')

{{-- @section('title', 'Data Category') --}}

@section('contents')
<div style="padding: 10px;">
  <div class="card shadow mb-2">

    <div class="card-header py-3">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <a href="{{ route('mcqs.add') }}" class="btn btn-primary mb-3">Add Mcq</a>



                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>All Mcqs</h5>
                        
                 <form action="{{ route('mcqs.index') }}" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" name="search" class="form-control" placeholder="Search for questions" value="{{ $search ?? '' }} ">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </div>
                    </div>
                </form>

                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table id="datatable-mcqs" class="table table-striped table-bordered table-hover align-middle">
                                <thead class="table-dark">
                                    <tr>
                                        <th width="5%">#</th>
                                        <th width="15%">Question</th>
                                        <th width="10%">Option A</th>
                                        <th width="10%">Option B</th>
                                        <th width="10%">Option C</th>
                                        <th width="10%">Option D</th>
                                        <th width="3%">Correct Option</th>
                                        <th width="10%">Category</th>
                                        <th width="15%">Explanation</th>
                                        <th width="4%">Title</th>
                                        <th width="15%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    {{-- @if(isset($customer) && !$customer->isEmpty()) --}}

                                    @forelse($mcqs as $mcq)

                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td class="truncate-cell" title="{{$mcq->question}}">{{ Str::limit($mcq->question, 30) }}</td>
                                        <td>{{$mcq->option_a}}</td>
                                        <td>{{$mcq->option_b}}</td>
                                        <td>{{$mcq->option_c}}</td>
                                        <td>{{$mcq->option_d}}</td>
                                        <td>{{$mcq->correct_option}}</td>
                                        <td>{{ @$mcq->category_name}}</td>
                                        <td class="truncate-cell" title="{{$mcq->explanation}}">{{ Str::limit($mcq->explanation, 40) }}</td>
                                        <td>{{$mcq->title}}</td>
                                       

                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{route('mcqs.edit', [$mcq->id])}}" class="btn btn-sm btn-outline-primary me-1" title="Edit"><i class="fa fa-pen"></i></a>
                                                <form method="POST" action="{{route('mcqs.delete', [$mcq->id])}}" style="display:inline;">
                                                        @method('DELETE')
                                                        @csrf
                                                    <button class="btn btn-sm btn-outline-danger default-delete-confirmation" title="Delete"><i class="fa fa-trash"></i></button>
                                                    </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="11" class="text-center">No Record Found!</td>
                                    </tr>
                                    @endforelse

                                </tbody>
                            </table>
                         
                        </div>
                    </div>
                </div>

        </div>
    </div>
</div>

</div>

</div>
  </div>

{{-- Custom styles for truncating text --}}
@push('styles')
<style>
.truncate-cell {
    max-width: 180px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
</style>
@endpush

{{-- DataTables initialization --}}
@push('scripts')
<script>
$(document).ready(function() {
    $('#datatable-mcqs').DataTable({
        responsive: true,
        pageLength: 10,
        lengthMenu: [5, 10, 25, 50, 100],
        order: [[0, 'asc']],
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search MCQs..."
        }
    });
});
</script>
@endpush

@endsection
