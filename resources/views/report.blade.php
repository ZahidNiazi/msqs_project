@extends('layouts.web-app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h5>IF YOU THINK THE MCQ POSTED ABOVE IS INACCURATE. PLEASE COMMENT BELOW WITH THE RIGHT ANSWER AND EXPLANATION OF IT IN DETAIL.</h5>
                    <form action="{{$action}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1" style="font-family:sans-serif">Please write your report with detail [ Name, Email , Contact, Website reference & Mcqs Detail. ]</label>
                            <textarea class="form-control" placeholder="Write Comment..." id="exampleFormControlTextarea1" rows="10" cols="10" name="report" required></textarea>

                          </div>
                          <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
