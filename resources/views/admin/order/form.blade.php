

<h2>Order</h2>
<div class="hr-line-dashed"></div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Client Name</label>
    <div class="col-sm-8">
        <input type="text" class="form-control @error('name') invalid @enderror" name="name" value="{{old('name', $order->name)}}" required>
        @error('name')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Phone</label>
    <div class="col-sm-8">
        <input type="text" class="form-control @error('phone') invalid @enderror" name="phone" value="{{old('phone', $order->phone)}}" required>
        @error('phone')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Total Product</label>
    <div class="col-sm-8">
        <input type="text" class="form-control @error('total_product') invalid @enderror" name="total_product" value="{{old('total_product', $order->total_product)}}" required>
        @error('total_product')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
</div>
<div class="hr-line-dashed"></div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Category</label>
    <div class="col-sm-8">
        <select class="form-control @error('category_id') invalid @enderror" id="category_id" name="category_id" required >
            <option readonly="">Please Select</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}" @if(isset($order) && $order->category_id == $category->id) selected @endif>{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
</div>



<div class="form-group row">
    <label class="col-sm-2 col-form-label">Products</label>
    <div class="col-sm-8">
        <select class="form-control @error('product_id') invalid @enderror" id="products" name="product_id" required>
            <option readonly="">Please Select</option>
            @foreach($products as $product)
            <option value="{{ $product->id }}" @if(isset($order) && $order->product_id == $product->id) selected @endif>{{ $product->name }}</option>
            @endforeach
        </select>
        @error('product_id')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Status</label>
    <div class="col-sm-8">
        <select id="status" name="status" class="select2 form-control">
            <option value="Pending" @if($order->status == 'Pending') selected @endif>Pending</option>
            <option value="Delivered" @if($order->status == 'Delivered') selected @endif>Delivered</option>
            <option value="Complete" @if($order->status == 'Complete') selected @endif>Complete</option>
            <option value="Cancelled" @if($order->status == 'Cancelled') selected @endif>Cancelled</option>
        </select>
    </div>
</div>

<div class="hr-line-dashed"></div>
<div class="form-group row">
    <div class="col-sm-4 col-sm-offset-2">
        <button class="btn btn-primary btn-sm" type="submit">Save changes</button>
    </div>
</div>
</div>


@push('scripts')
<script>


    $("#category_id").change(function() {
     $.ajax({
                    url: '/order/fetchProducts/' + this.value,
                    type: 'GET',
                    dataType: 'json',
                    success: function (response) {
                        // $('#products').val('');
                        $('#products').html('<option value="">Select Products</option>');


                        $.each(response.products, function (i,item) {
                            // console.log(response.products);
                       $product   =$('#products').append(new Option(item.name, item.id));
                       $('#products').append($product);
                        });
                    }
                });

        });
</script>
@endpush
