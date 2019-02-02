@extends('layouts.app')
<title>Dashboard</title>

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @if (Session::get('status') == 'submitted')
                    <div class="alert alert-success">
                        <strong>Success!</strong> Your progression claim has gone through! Our team will review your claim shortly.
                    </div>
                @endif

                @include('partials._breakdown')
                @include('partials._claims')
                @include('partials._flightlog')
            </div>
        </div>
    </div>
@endsection
