

<h2>Order</h2>
<div class="hr-line-dashed"></div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Customer Name</label>
    <div class="col-sm-8">
        <input type="text" class="form-control @error('name') invalid @enderror" name="name" value="{{old('name', $customer->name)}}" required>
        @error('name')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Phone</label>
    <div class="col-sm-8">
        <input type="text" class="form-control @error('phone') invalid @enderror" name="phone" value="{{old('phone', $customer->phone)}}" required>
        @error('phone')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Total Product</label>
    <div class="col-sm-8">
        <input type="text" class="form-control @error('total_product') invalid @enderror" name="total_product" value="{{old('total_product', $customer->total_product)}}" required>
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
            <option value="{{ $category->id }}" @if(isset($customer) && $customer->category_id == $category->id) selected @endif>{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Brand</label>
    <div class="col-sm-8">
        <select class="form-control @error('brand_id') invalid @enderror" id="brands" name="brand_id" required >
            <option readonly="">Please Select</option>
            @foreach($brands as $brand)
            <option value="{{ $brand->id }}" {{ $brand->id == $customer->brand_id ? 'selected' : '' }}>{{ $brand->name }}</option>
            @endforeach
        </select>
        @error('brand_id')
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
            <option value="{{ $product->id }}" @if(isset($customer) && $customer->product_id == $product->id) selected @endif>{{ $product->name }}</option>
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
            <option value="Pending" @if($customer->status == 'Pending') selected @endif>Pending</option>
            <option value="Delivered" @if($customer->status == 'Delivered') selected @endif>Delivered</option>
            <option value="Complete" @if($customer->status == 'Complete') selected @endif>Complete</option>
            <option value="Cancelled" @if($customer->status == 'Cancelled') selected @endif>Cancelled</option>
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







    $(document).ready(function() {
    $('#category_id').change(function() {
        var category_id = $(this).val();
        $.ajax({
            url: '/subcategories/' + category_id,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                $('#brands').val('');
                var brands = response;
                var options = '';
                for (var i = 0; i < brands.length; i++) {
                    options += '<option value="' + brands[i].id + '">' + brands[i].name + '</option>';
                }
                $('#brands').html(options);
            }
        });
    });

    $('#brands').change(function() {
        var brands = $(this).val();
        $.ajax({
            url: '/products/' + brands,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                $('#products').val('');
                var products = response;
                var options = '';
                for (var i = 0; i < products.length; i++) {
                    options += '<option value="' + products[i].id + '">' + products[i].name + '</option>';
                }
                $('#products').html(options);
            }
        });
    });
});

</script>
@endpush
