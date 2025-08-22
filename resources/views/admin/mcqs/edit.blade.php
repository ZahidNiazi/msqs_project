@extends('layouts.app')

@section('contents')
<div class="card shadow mb-4">
    <div style="padding:30px;">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-content">
                            <form enctype="multipart/form-data" action="{{ route('mcqs.update', ['id' => $mcq->id]) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                @include('admin.mcqs.form')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
