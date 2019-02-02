@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @if (Session::get('status') == 'uploaded')
                    <div class="alert alert-success">
                        <strong>Success!</strong> Your IGC file has been successfully uploaded! It is now in the queue for parsing...
                    </div>
                @endif

                <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-plane" aria-hidden="true"></span> Post-flight Overview
                            @if ($flight->status === 'queued')
                                <div class="pull-right"><i class="fa fa-circle-o-notch fa-spin" ></i></div>
                            @endif
                        </div>

                        <table class="panel-body table table-bordered">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $flight->id }}</td>
                            </tr>
                            <tr>
                                <th>Type</th>
                                <td>{{ $flight->type === 'crosscountry' ? 'Cross Country' : 'Soaring' }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{ ucfirst($flight->status) }}</td>
                            </tr>
                            @if($flight->status != 'queued' && $flight->status != 'rejected')
                                @php
                                    $filename = str_replace('flightlogs', 'flightdata', $flight->filename);
                                    $flightdata = json_decode(Storage::get($filename));
                                @endphp
                                <tr>
                                    <th>
                                        @if (!\Carbon\Carbon::parse($flightdata->date)->between(
                                            \Carbon\Carbon::parse('2018-07-28'),
                                            \Carbon\Carbon::parse('2018-08-05'))
                                        )
                                            <span class="text-primary glyphicon glyphicon-exclamation-sign"></span>
                                        @endif
                                        Date
                                    </th>
                                    <td>{{ $flightdata->date }}</td>
                                </tr>
                                <tr>
                                    <th>
                                        @if ($flight->user->name != $flightdata->pilot)
                                            <span class="text-primary glyphicon glyphicon-exclamation-sign"></span>
                                        @endif
                                        Pilot in Command</th>
                                    <td>{{ $flightdata->pilot }}</td>
                                </tr>
                                <tr>
                                    <th>Glider Type</th>
                                    <td>{{ $flightdata->type }}</td>
                                </tr>
                                <tr>
                                    <th>Glider Registration</th>
                                    <td>{{ $flightdata->registration }}</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>

                @if ($flight->status == 'processed')
                <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-cloud" aria-hidden="true"></span> Flight Scoring
                        </div>

                        <table class="panel-body table table-bordered">
                            <tbody>
                            @if ($flight->type === 'soaring')
                                @php
                                    $filename = str_replace('flightlogs', 'flightresults', $flight->filename);
                                    $flightresults = json_decode(Storage::get($filename));
                                @endphp
                                <tr>
                                    <th>Total Points</th>
                                    <td>{{ $flight->points }}</td>
                                </tr>
                                <tr>
                                    <th>Duration</th>
                                    <td>{{ $flightresults->duration }} minutes</td>
                                </tr>
                                <tr>
                                    <th>Height Gain</th>
                                    <td>{{ $flightresults->gain }} feet</td>
                                </tr>
                                <tr>
                                    <th>Duration Points</th>
                                    <td>{{ $flightresults->timepoints }}</td>
                                </tr>
                                <tr>
                                    <th>Height Gain Points</th>
                                    <td>{{ $flightresults->heightpoints }}</td>
                                </tr>
							@elseif ($flight->type === 'crosscountry')
                                @php
                                    $filename = str_replace('flightlogs', 'flightresults', $flight->filename);
                                    $flightresults = json_decode(Storage::get($filename));
                                @endphp
								<tr>		
									<th>Total Points</th>
									<td>{{ $flight->points }}</td>
								</tr>
								<tr>
									<th>Distance Points</th>
									<td>{{ $flightresults->distancePoints }}</td>
								</tr>
								<tr>
									<th>Speed Points</th>
									<td>{{ $flightresults->speedPoints }}</td>
								</tr>
								<tr>
									<th>Completion Bonus Points</th>
									<td>{{ $flightresults->completionBonusPoints }}</td>
								</tr>					
                            @endif
                            </tbody>
                        </table>
                    </div>
                @endif


                @if($flight->status != 'queued' && $flight->status != 'rejected')
                    @include('flights._trace', compact('flightdata'))
                @endif
           </div>
        </div>
    </div>
@endsection
