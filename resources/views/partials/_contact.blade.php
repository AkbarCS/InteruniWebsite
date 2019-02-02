<div class="panel panel-default">
    <div class="panel-heading"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Contact Us</div>

    <div class="panel-body">

        @if (Session::get('status') == 'sent')
            <div class="alert alert-success">
                <strong>Success!</strong> Your message has been successfully sent! We'll try to get back to you as soon as possible.
            </div>
        @endif

        <form id="contactForm" class="form-horizontal" role="form" method="POST" action="{{ route('contact') }}">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">Name</label>

                <div class="col-md-6">
                    @if (Auth::guest())
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                    @else
                        <input id="name" type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required disabled>
                    @endif
                    @if ($errors->has('name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                <div class="col-md-6">
                    @if(Auth::guest())
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                    @else
                        <input id="email" type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" required disabled>
                    @endif

                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
                <label for="subject" class="col-md-4 control-label">Subject</label>

                <div class="col-md-6">
                    <input id="subject" type="text" class="form-control" name="subject" value="{{ old('subject') }}" required autofocus>

                    @if ($errors->has('subject'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('subject') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                <label for="body" class="col-md-4 control-label">Body</label>

                <div class="col-md-6">
                    <textarea id="body" name="body" class="form-control" rows="3" required autofocus>{{ old('body') }}</textarea>

                    @if ($errors->has('body'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <recaptcha target="#contactForm">
                        <button class="btn btn-primary" type="submit">
                            Send Message
                        </button>
                    </recaptcha>
                </div>
            </div>

        </form>

    </div>
</div>
