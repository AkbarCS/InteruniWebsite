@extends('layouts.app')
<title>Images</title>

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('partials._imageGallery')
            </div>
        </div>
    </div>
@endsection