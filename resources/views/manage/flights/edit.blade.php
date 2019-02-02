@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-education" aria-hidden="true"></span> Flight Information
                    </div>

                    <table class="panel-body table table-bordered">
                        <tbody>
                        <tr>
                            <th>ID</th>
                            <td>{{ $flight->id }}</td>
                        </tr>
						<tr>
                            <th>Type</th>
                            <td>{{ $flight->type }}</td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td>{{ $flight->created_at }}</td>
                        </tr>
                        <tr>
                            <th>Pilot</th>
                            <td>{{ $flight->user->name }}</td>
                        </tr>
						
                        </tbody>
                    </table>			
                </div>
					
				@if ($flight->type == 'soaring' && ($flight->status == 'parsed' || $flight->status == 'processed'))				
					@php
						$filename = str_replace('flightlogs', 'flightdata', $flight->filename);
						$flightdata = json_decode(Storage::get($filename));	
					@endphp

					@include('flights._trace', compact('flightdata'))					
										
					<div class="panel panel-default">
							<div class="panel-heading">
								<span class="glyphicon glyphicon-cloud" aria-hidden="true"></span> Edit Score - Soaring
							</div>

							<form id="requestForm" class="form-horizontal" role="form" method="POST" action="{{ route('flights.update', $flight, $flight->id) }}">
							{{ csrf_field() }}
								<table class="table table-bordered">
									<tbody>
									@if ($flight->status === 'processed')									
										@php
											$filename = str_replace('flightlogs', 'flightresults', $flight->filename);
											$flightresults = json_decode(Storage::get($filename));
										@endphp
											<tr>		
												<th>Total Points</th>
												<td><input type="text" name="points" value={{ $flight->points }}></td>
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
												<td><input type="text" name="timepoints" value={{ $flightresults->timepoints }}></td>
											</tr>
											<tr>
												<th>Height Gain Points</th>
												<td><input type="text" name="heightpoints" value={{ $flightresults->heightpoints }}></td>
											</tr>
										@elseif ($flight->status === 'parsed')
											<tr>		
												<th>Total Points</th>
												<td><input type="text" name="points" value=0></td>
											</tr>
											<tr>
												<th>Duration</th>
												<td><input type="text" name="duration" value=0></td>
											</tr>
											<tr>
												<th>Height Gain</th>
												<td><input type="text" name="gain" value=0></td>
											</tr>
											<tr>
												<th>Duration Points</th>
												<td><input type="text" name="timepoints" value=0></td>
											</tr>
											<tr>
												<th>Height Gain Points</th>
												<td><input type="text" name="heightpoints" value=0></td>
											</tr>
										@endif
									</tbody>
								</table>
														
								<div class="form-group">
									<div class="col-md-6 col-md-offset-4">
										<button class="btn btn-primary" type="submit" >
											Update Score
										</button>
										<button class="btn btn-primary" type="submit" name="downloadIGCFile">
											Download igc file
										</button>
									</div>
								</div>	
							</form>			
					</div>		
					
				@elseif ($flight->type == 'crosscountry' && ($flight->status == 'parsed' || $flight->status == 'processed'))
					@php
						$filename = str_replace('flightlogs', 'flightdata', $flight->filename);
						$flightdata = json_decode(Storage::get($filename));
					@endphp
					
					@include('flights._trace', compact('flightdata'))
				
					<div class="panel panel-default">
						<div class="panel-heading">
							<span class="glyphicon glyphicon-cloud" aria-hidden="true"></span> Edit Score - Cross Country
						</div>

						<form id="requestForm" class="form-horizontal" role="form" method="POST" action="{{ route('flights.update', $flight, $flight->id) }}">
							{{ csrf_field() }}
							<table class="table table-bordered">
								<tbody>
								@if ($flight->status === 'processed')
									@php
										$filename = str_replace('flightlogs', 'flightresults', $flight->filename);
										$flightresults = json_decode(Storage::get($filename));
									@endphp
									<tr>		
										<th>Total Points</th>
										<td><input type="text" name="points" value={{ $flight->points }}></td>
									</tr>
									<tr>
										<th>Distance Points</th>
										<td><input type="text" name="distancePoints" value={{ $flightresults->distancePoints }}></td>
									</tr>
									<tr>
										<th>Speed Points</th>
										<td><input type="text" name="speedPoints" value={{ $flightresults->speedPoints }}></td>
									</tr>
									<tr>
										<th>Completion Bonus Points</th>
										<td><input type="text" name="completionBonusPoints" value={{ $flightresults->completionBonusPoints }}></td>
									</tr>
									
								@elseif ($flight->status === 'parsed')
									<tr>		
										<th>Total Points</th>
										<td><input type="text" name="points" value=0></td>
									</tr>
									<tr>
										<th>Distance Points</th>
										<td><input type="text" name="distancePoints" value=0></td>
									</tr>
									<tr>
										<th>Speed Points</th>
										<td><input type="text" name="speedPoints" value=0></td>
									</tr>
									<tr>
										<th>Completion Bonus Points</th>
										<td><input type="text" name="completionBonusPoints" value=0></td>
									</tr>				
								@endif
								</tbody>
							</table>
													
							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<button class="btn btn-primary" type="submit" >
										Update Score
									</button>
									<button class="btn btn-primary" type="submit" name="downloadIGCFile">
										Download igc file
									</button>
								</div>
							</div>	
						</form>		
						
					</div>
				@endif	
				
            </div>
        </div>
    </div>
    </div>
@endsection
