@extends('layouts.app')

{{-- @section('title', 'Data Category') --}}

@section('contents')
<div style="padding: 10px;">
  <div class="card shadow mb-2">

    <div class="card-header py-3">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <a href="{{ route('mcqs.create') }}" class="btn btn-primary mb-3">Add Mcq</a>

                <form action="" style="float: right">
                    <div class="from-group">
                        <input type="search" id="search" name="search" placeholder="Search By name & email" value="{{ $search }}">
                        <button class="btn btn-primary">Search</button>
                        <a href="{{ route('admin.all.customer') }}">
                        <button class="btn btn-info">Reset</button>
                        </a>
                    </div>
                </form>

                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>All Mcqs</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                    <tr>
                                        <th width="15%">#</th>
                                        <th width="15%">Question</th>
                                        <th width="10%">Option A</th>
                                        <th width="10%">Option B</th>
                                        <th width="10%">Option C</th>
                                        <th width="10%">Option D</th>
                                        <th width="10%">Correct Option</th>
                                        <th width="10%">Category</th>
                                        <th width="10%">Explanation</th>
                                        <th width="15%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    {{-- @if(isset($customer) && !$customer->isEmpty()) --}}

                                    @forelse($mcqs as $mcq)

                                    <tr>
                                        <td>{{$mcq->question}}</td>
                                        <td>{{$mcq->option_a}}</td>
                                        <td>{{$mcq->option_b}}</td>
                                        <td>{{$mcq->option_c}}</td>
                                        <td>{{$mcq->option_d}}</td>
                                        <td>{{$mcq->correct_option}}</td>
                                        <td>{{$mcq->category->name}}</td>
                                        <td>{{$mcq->explanation}}</td>

                                        <td>
                                            <div class="d-flex">
                                                <div class="mr-1">
                                                    <a href="{{route('mcq.edit', [$mcq->id])}}"><button class=""><i class="fa-solid fa fa-pen" ></i></button></a>
                                                </div>
                                                <div class="">
                                                    <form method="POST" action="{{route('mcq.delete', [$mcq->id])}}">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class=" default-delete-confirmation"><i class="fa fa-trash"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="9" class="text-center">No Record Found!</td>
                                    </tr>
                                    @endforelse

                                </tbody>
                            </table>
                            {{-- <div class="pagination-container">
                                {{ $customers->links() }}
                            </div> --}}
                        </div>
                    </div>
                </div>

        </div>
    </div>
</div>

</div>

</div>
  </div>
@endsection
