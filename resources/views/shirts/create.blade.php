@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><span class="glyphicon glyphicon-shopping-cart accent-color" aria-hidden="true"></span> <span class="accent-color">Request a t-shirt!</span></div>

                    <div class="panel-body">
                        <form id="requestForm" class="form-horizontal" role="form" method="POST" action="{{ route('shirts.store') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('size') ? ' has-error' : '' }}">
                                <label for="size" class="col-md-4 control-label">Size</label>

                                <div class="col-md-6">
                                    <select id="size" class="form-control" name="size" required>
                                        <option value="small">Small</option>
                                        <option value="medium" selected>Medium</option>
                                        <option value="large">Large</option>
                                    </select>

                                    @if ($errors->has('size'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('size') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <recaptcha target="#requestForm">
                                        <button class="btn btn-primary" type="submit">
                                            Place t-shirt request
                                        </button>
                                    </recaptcha>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
