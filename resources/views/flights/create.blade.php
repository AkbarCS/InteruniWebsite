@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><span class="glyphicon glyphicon-plane" aria-hidden="true"></span> Upload an <code>igc</code> flight logger file</div>

                    <div class="panel-body">

                        <form id="requestForm" class="form-horizontal" role="form" method="POST" action="{{ route('flights.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group {{ $errors->has('flightlog') ? ' has-error' : '' }}">
                                <label for="flightlog" class="col-md-4 control-label">IGC File</label>

                                <div class="col-md-6">
                                    <input type="file" name="flightlog" class="form-control">

                                    @if ($errors->has('flightlog'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('flightlog') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('type') ? ' has-error' : '' }}">
                                <label for="type" class="col-md-4 control-label">Type</label>

                                <div class="col-md-6">
                                    <select id="type" class="form-control" name="type" required>
                                        <option value="soaring" selected>Soaring</option>
                                        <option value="crosscountry">Cross Country</option>
                                    </select>

                                    @if ($errors->has('type'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('type') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button class="btn btn-primary" type="submit">
                                        Create Logbook Entry
                                    </button>
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
