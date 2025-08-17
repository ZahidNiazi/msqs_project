

<div class="card shadow mb-4 " style="padding: 50px;">



    <h2 style="padding-bottom: 35px;  ">Add Product </h2>
    <div class="hr-line-dashed"></div>
    <div class="form-group row">
        <div class="col-lg-6">
            <div class="row">
                <label class="col-sm-4 col-form-label">Name</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control @error('name') invalid @enderror" name="name" value="{{old('name', $product->name)}}" required>
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <div class="row mt-3">
                <label class="col-sm-4 col-form-label">Price</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control @error('price') invalid @enderror" name="price" value="{{old('price', $product->price)}}" required>
                    @error('price')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="row mt-3">
                <label class="col-sm-4 col-form-label">Quantity</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control @error('quantity') invalid @enderror" name="quantity" value="{{old('quantity', $product->quantity)}}" required>
                    @error('quantity')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="row mt-3">
                <label class="col-sm-4 col-form-label">Status</label>
                <div class="col-sm-8">
                    <select id="status" name="status" class="select2 form-control">
                       <option value="Active" @if($product->status == 'Active') selected @endif>Active</option>
                        <option value="Inactive" @if($product->status == 'Inactive') selected @endif>Inactive</option>
                    </select>
                </div>
            </div>
        </div>
        <label class="col-sm-2 col-form-label">Picture</label>
        <div class="col-sm-4">
            @if($product->image) <img id="image_preview" src="{{ asset('products/images/product/'.$product->image) }}" class="img-fluid" style="height:200px;"> @else <img id="image_preview" src="{{asset('assets/admin/img/placeholder.png')}}" class="img-fluid" style="height:200px;"> @endif
            <input id="image" type="file" name="image" class="form-control">
            @error('image')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="hr-line-dashed"></div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Brand</label>
        <div class="col-sm-4">
            <select class="form-control @error('brand_id') invalid @enderror" name="brand_id" required>
                <option readonly="">Please Select</option>
                @foreach($brands as $brand)
                <option value="{{$brand->id}}" @if(isset($product) && $product->brand_id == $brand->id) selected @endif>{{$brand->name}}</option>
                @endforeach
            </select>
            @error('brand_id')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
<div>
    </div>
        <label class="col-sm-2 col-form-label"> Category</label>
        <div class="col-sm-4">
            <select class="form-control @error('category_id') invalid @enderror" name="category_id" required>
                <option readonly="">Please Select</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}" @if(isset($product) && $product->category_id == $category->id) selected @endif>{{$category->name}}</option>
                @endforeach
            </select>
            @error('category_id')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>

    <div class="hr-line-dashed"></div>
    <div class="form-group row">
        <div class="col-sm-4 col-sm-offset-2">
            <button class="btn btn-primary btn-sm" type="submit">Save changes</button>
        </div>
    </div>


</div>


