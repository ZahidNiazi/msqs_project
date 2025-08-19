@extends('layouts.app')

@section('contents')
<h2>Add About Us</h2>
<form action="{{ route('aboutus.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('admin.aboutus.partials.form')
    <button type="submit" class="btn btn-success">Save</button>
</form>
@endsection
