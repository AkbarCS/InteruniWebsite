@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('partials._shirts')
                @include('partials._requests')
            </div>
        </div>
    </div>
@endsection
