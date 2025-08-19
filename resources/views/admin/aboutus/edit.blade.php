@extends('layouts.app')

@section('contents')
<h2>Edit About Us</h2>
<form action="{{ route('aboutus.update', $aboutus->id) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    @include('admin.aboutus.partials.form')
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
