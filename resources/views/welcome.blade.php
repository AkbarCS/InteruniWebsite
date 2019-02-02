@extends('layouts.app')
<title>About this Competition</title>

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('partials._welcome')
				@include('partials._nugcinfo')
                @include('partials._hostAirfield')
                @include('partials._fees')
				@include('partials._accomodation')
                @include('partials._sponsors')
            </div>
        </div>
    </div>
@endsection
