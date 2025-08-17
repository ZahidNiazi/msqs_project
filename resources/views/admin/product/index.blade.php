@extends('layouts.app')

{{-- @section('title', 'Data Category') --}}

@section('contents')
  <div class="card shadow mb-4">

    <div class="card-header ">

      <a style="float: right; " href="{{ route('admin.product.create') }}" class="btn btn-primary mb-3">Add Products</a>
      <h4 class="m-0 font-weight-bold text-primary " style="padding:10px">Products</h4>
    </div>
    <div class="card-body">

      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead style="text-align: center";>
            <tr>
              <th>S.No</th>
              <th>Name</th>
              <th>Image</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Brand</th>
              <th>Category</th>
              <th>Date</th>
              <th>Status</th>

              <th >Action</th>
            </tr>
          </thead>
          <tbody  style="text-align: center";>

            @php($no = 1)
            @foreach ($products as $product)
              <tr>
                <td scope="row" width="5%" >{{ $products->firstItem()+$loop->index }}</td>
                <td width="10%">{{ $product->name }}</td>
                <td width="15%">
                    <img src="{{ asset('products/images/product/'.$product->image) }}"
                    class="img-fluid zoom" style="max-width:80px; height: 50px;" alt="{{$product->image}}">
                  </td>
                <td width="10%">{{ $product->price }}</td>
                <td width="5%">{{  $product->quantity }}</td>
                <td width="5%">{{ $product->brand->name }}</td>
                <td width="5%">{{ $product->category->name }}</td>
                <td width="15%">{{ $product->created_at }} </td>
                <td>
                    <span class="badge badge-success {{$product->status}}">{{$product->status}}</span>
                </td>

                <td width="25%" >
                  <a href="{{ url('/product/edit/'.$product->id) }}"  ><button > <i class="fa-solid fa fa-pen"></i></button></a>
                  <a href="{{ url('/product/delete/'.$product->id) }}" ><button><i class="fa fa-trash"></i></button></a>






                </td>
              </tr>
            @endforeach


          </tbody>

        </table>
        <div class="pagination-container">
            {{ $products->links() }}
        </div>
      </div>
    </div>
  </div>
@endsection
