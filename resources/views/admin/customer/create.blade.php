@extends('layouts.app')

{{-- @section('title', 'Data Category') --}}

@section('contents')
  <div class="card shadow mb-4" style="padding: 50px;">





<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-content">
                    <form action="{{$action}}" method="POST">
                        @csrf
                        @include('admin.customer.form')
                    </form>



                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>



@endsection
