@extends('layouts.app')

{{-- @section('title', 'Data Category') --}}

@section('contents')
  <div class="card shadow mb-4">
    <div style="padding:30px;">

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-content">
                    <form  action="{{route('admin.order.update', ['order'=>$order])}}" method="POST">
                        @csrf
                        @method('PATCH')
                        @include('admin.order.form')
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
</div>

</div>
</div>
<script>


    $("#category_id").change(function() {
     $.ajax({
                    url: '/order/fetchProducts/' + this.value,
                    type: 'GET',
                    dataType: 'json',
                    success: function (response) {
                        $('#products').val('');
                        $('#products').html('<option value="">Select Products</option>');


                        $.each(response.products, function (i,item) {
                            // console.log(response.products);
                       $product =$('#products').append(new Option(item.name, item.id));
                       $('#products').append($product);
                        });
                    }
                });

        });
</script>


@endsection
