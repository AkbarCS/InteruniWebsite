@extends('layouts.app')

<title>Competitions and Rules</title>
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    @include('partials._rules')
                    @include('partials._progression')
                    @include('partials._soaring')
                    @include('partials._crosscountry')
                </div>
            </div>
        </div>
    </div>
@endsection
