@extends('layouts.app')

<title>Contact Us</title>
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
				{{--@include('partials._contact')--}}
                @include('partials._call')
            </div>
        </div>
    </div>
@endsection
