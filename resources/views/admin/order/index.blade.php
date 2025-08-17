@extends('layouts.app')

{{-- @section('title', 'Data Category') --}}

@section('contents')
<div style="padding: 10px;">
  <div class="card shadow mb-2">

    <div class="card-header py-3">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <a href="{{ route('admin.order.create') }}" class="btn btn-primary mb-3">Add Order</a>
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>All Order</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                    <tr>
                                        <th width="15%">Order Date</th>
                                        <th width="10%">Client Name</th>
                                        <th width="15%">Phone</th>
                                        <th width="10%">Category</th>
                                        <th width="10%">Total Product</th>
                                        <th width="15%">Products</th>
                                        <th width="10%">Status</th>
                                        <!-- <th>Updated At</th> -->
                                        <th width="15%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $colors_array=array("Pending"=>"badge-warning","Complete"=>"badge-primary",
                                    "Delivered"=>"badge-success","Cancelled"=>"badge-danger");@endphp

                                    @if(isset($orders) && !$orders->isEmpty())
                                    @foreach($orders as $order)
                                    <tr>
                                        <td>{{$order->created_at}}</td>
                                        <td>{{$order->name}}</td>
                                        <td>{{$order->phone}}</td>
                                        <td>{{$order->category->name}}</td>
                                        <td>{{$order->total_product}}</td>
                                        <td>{{$order->product->name}}</td>

                                        <td>
                                            <span class="badge {{$colors_array[$order->status]}}">{{$order->status}}</span>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="mr-1">
                                                    <a href="{{route('admin.order.edit', [$order->id])}}"><button class="btn btn-warning"><i class="fa-solid fa fa-pen"></i></button></a>
                                                </div>
                                                <div class="">
                                                    <form method="POST" action="{{route('admin.order.delete', [$order->id])}}">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-danger default-delete-confirmation"><i class="fa fa-trash"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="8" class="text-center">No Record Found!</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                            <div class="pagination-container">
                                {{ $orders->links() }}
                            </div>
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
