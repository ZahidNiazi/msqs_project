@extends('layouts.app')

{{-- @section('title', 'Data Category') --}}

@section('contents')
<div class="card shadow mb-2">
        {{-- @if (session('success'))


                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>{{ session('success') }}</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    @endif --}}

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Post</h6>
        </div>
         <form action="#" method="GET">
          <div class="input-group mb-3 col-4 mt-2" style="float: right; ">
          <input type="text" name="search" class="form-control" placeholder="Search Post" value="{{ request('search') }}">
          <div class="input-group-append">
            <button class="btn btn-info" type="submit">Search</button>
          </div>
           <div class="input-group-append">
            <a href="#" class="btn btn-info">Clear</a>
        </div>
         </div>
      </form>



        <div class="card-body">
            <a href="{{ route('category.add') }}" class="btn btn-primary mb-3">Add Post</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Description</th>
                            
                            <th style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                   

                </table>
            
            </div>
        </div>
    </div>
@endsection