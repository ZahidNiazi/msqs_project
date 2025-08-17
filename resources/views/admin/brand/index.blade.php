@extends('layouts.app')

{{-- @section('title', 'Data Category') --}}

@section('contents')
  <div class="card shadow mb-4">
    {{-- @if (session('success'))


                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>{{ session('success') }}</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    @endif --}}
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Brand</h6>
    </div>
    <div class="card-body">
      <a href="{{ route('brand.add') }}" class="btn btn-primary mb-3">Add Brand</a>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>S.No</th>
              <th>Category Name</th>
              <th>Name Brand</th>
              <th>Time Duration</th>
              <th style="text-align: center;">Action</th>
            </tr>
          </thead>
          <tbody>
            @php($no = 1)
            @foreach ($brands as $row)
              <tr>
                <td scope="row" width="20%" >{{ $no++ }}</td>
                <td width="20%">{{ $row->category->name }}</td>
                <td width="20%">{{ $row->name }}</td>
                <td width="20%">
                    {{ $row->created_at }}
                </td>
                <td width="30%" style="text-align: center">

                  <a href="{{ url('/brand/edit/'.$row->id) }}" class=" " ><button><i class="fa-solid fa fa-pen"></i></button></a>
                  <a href="{{ url('brand/delete/'. $row->id) }}" class=""><button ><i class="  fa fa-trash"></i></button></a>

                </td>
              </tr>
            @endforeach


          </tbody>

        </table>
        {{-- <div class="pagination-container">
            {{ $brands->links() }}
        </div> --}}
      </div>
    </div>
  </div>
@endsection
