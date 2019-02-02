@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('partials.ladder._progression')
                @include('partials.ladder._soaring')
                @include('partials.ladder._crosscountry')
            </div>
        </div>
    </div>
@endsection
