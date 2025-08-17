
 @extends('layouts.app')

 @section('title', 'Data Category')

@section('contents')
  <div class="card shadow mb-4">



 <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">

                        <div class="ibox-content">
                            <form enctype="multipart/form-data" action="{{route('admin.product.update', ['product'=>$product])}}" method="POST">
                                @csrf
                                @method('PATCH')
                                @include('admin.product.form')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>
@endsection
