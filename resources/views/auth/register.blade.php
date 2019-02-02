@extends('layouts.app')
<title>Register for the 2018 Interuniversity Gliding Competition</title>

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form id="registrationForm" class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" placeholder="Enter your full name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('university') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">University <sup>[1]</sup></label>

                            <div class="col-md-6">
                                <select id="university" class="selectpicker form-control" name="university" title="Select your university" data-live-search="true">
                                    @foreach(\App\University::all() as $datum)
                                        @if(old('university') == $datum->id)
                                            <option value="{{ $datum->id }}" data-subtext="{{ $datum->domain }}" selected>{{ $datum->name }}</option>
                                        @else
                                            <option value="{{ $datum->id }}" data-subtext="{{ $datum->domain }}">{{ $datum->name }}</option>
                                        @endif
                                    @endforeach
                                </select>

                                @if ($errors->has('university'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('university') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" placeholder="Enter a valid email address" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" placeholder="Enter a secure password" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" placeholder="Confirm your password" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <recaptcha target="#registrationForm">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </recaptcha>
                            </div>
                        </div>
                    </form>
                </div>
                <p class="small text-center"><sup>[1]</sup> The list of university gliding clubs is taken from the BGA website. If your university is not in the list, please <a href="{{ route('contact') }}">contact us</a>.</p>
            </div>
        </div>
    </div>
</div>
@endsection
