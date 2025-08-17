@extends('layouts.app')

{{-- @section('title', 'Data Category') --}}

@section('contents')
<div style="padding: 10px;">
  <div class="card shadow mb-2">

    <div class="card-header py-3">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                {{-- <a href="{{ route('mcqs.add') }}" class="btn btn-primary mb-3">Mcqs Reports</a> --}}

             

                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>All Mcq Reports</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                    <tr>
                                        <th width="15%">#</th>
                                        <th width="15%">User</th>
                                        <th width="15%">Question</th>
                                        <th width="10%">Category</th>
                                        <th width="10%">Report</th>
                                        <th width="15%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    {{-- @if(isset($customer) && !$customer->isEmpty()) --}}

                                    @forelse($reports as $report)

                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{@$report->user_name}}</td>
                                        <td>{{@$report->mcq_question}}</td>
                                        <td>{{@$report->category_name}}</td>
                                        <td>{{$report->report}}</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="">
                                                    <form method="POST" action="{{route('mcqs.report.delete', [$report->id])}}">
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
