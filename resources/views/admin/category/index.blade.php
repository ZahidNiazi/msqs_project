@extends('layouts.app')

{{-- @section('title', 'Data Category') --}}

@section('contents')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Category</h6>
        </div>
         <form action="{{ route('searchCategory') }}" method="GET">
          <div class="input-group mb-3 col-4 mt-2" style="float: right; ">
          <input type="text" name="search" class="form-control" placeholder="Search Categories" value="{{ request('search') }}">
          <div class="input-group-append">
            <button class="btn btn-info" type="submit">Search</button>
          </div>
           <div class="input-group-append">
            <a href="{{ route('clearCategory') }}" class="btn btn-info">Clear</a>
        </div>
         </div>
      </form>



        <div class="card-body">
            <a href="{{ route('category.add') }}" class="btn btn-primary mb-3">Add Category</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Name Category</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Banner Image</th>
                            <th>Time Duration</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @php ($no = 1)
                        @forelse ($categories as $row)
                            <tr>
                                <td scope="row" width="10%">{{$no++}}</td>
                                <td width="20%">{{ $row->name }}</td>
                                <td width="10%">{{ $row->title }}</td>
                                <td width="20%">{{ \Illuminate\Support\Str::limit($row->description, 100) }}</td>
                                <td class="text-align-center" width="10%" style="text-align: center;">
                                    @if($row->file)
                                        <img src="{{ asset('assets/banner/' . $row->file) }}" alt="Banner" height="80" style="border-radius:10px;">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>
                                <td width="10%">
                                    {{ $row->created_at }}
                                </td>
                                <td width="20%" style="text-align: center">

                                    <a href="{{ url('/category/edit/' . $row->id) }}" class="btn btn-warning  ">Edit</a>
                                    <a href="{{ url('category/delete/' . $row->id) }}" class="btn btn-danger">Delete</a>

                                </td>
                                
                            </tr>
                            @empty
                        <tr>
                            <td colspan="5" class="text-center">No SubCategories found.</td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>
                    <div style="justify-content: center;">
                        {{$categories->links()}}
                    </div>
            </div>
        </div>
    </div>
@endsection
<style>
    .pagination{
        justify-content: center;
    }
</style>
