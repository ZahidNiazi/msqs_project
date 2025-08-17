@extends('layouts.app')

{{-- @section('title', 'Data Category') --}}

@section('contents')
<form action="{{ isset($brand) ? route('brand.update', $brand->id) : route('brand.save') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($brand) ? ' Edit Brand' : ' Add Brand' }}</h6>
          </div>
          <div>
            <label class="col-sm-2 col-form-label"> Category</label>
            <div class="col-sm-4">
                <select class="form-control @error('category_id') invalid @enderror" name="category_id" required>
                    <option readonly="">Please Select</option>
                    @foreach($category as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach
                </select>
                @error('category_id')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
          <div class="card-body">
            <div class="form-group">
              <label for="nama">Name Brand</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ isset($brand) ? $brand->name : '' }} " required>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection
