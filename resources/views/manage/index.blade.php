@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-sunglasses" aria-hidden="true"></span> Manage Users
                        <div class="pull-right"><span class="badge" style="background-color: #F94913;">{{ \App\User::count() }}</span></div>
                    </div>

                    <table class="panel-body table table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>University</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(\App\User::all() as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->university->domain }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-education" aria-hidden="true"></span> Manage Progression Claims
                        <div class="pull-right"><span class="badge" style="background-color: #F94913;">{{ \App\Claim::count() }}</span></div>
                    </div>

                    <table class="panel-body table table-bordered">
                        <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Pilot</th>
                            <th class="text-center">Points</th>
                            <th class="text-center">Created</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse(\App\Claim::get() as $claim)
                                <tr>
                                    <td class="text-center">{{ $claim->id }}</td>
                                    <td class="text-center">{{ $claim->date }}</td>
                                    <td class="text-center">{{ $claim->user->name }}</td>
                                    <td class="text-center">{{ $claim->points }}</td>
                                    <td class="text-center">{{ $claim->created_at }}</td>
                                    <td class="text-center">{{ ucfirst($claim->status) }}</td>
                                    <td class="text-center"><a href="{{ route('claims.edit', $claim) }}">View</a></td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="6">No one has made any progression claims yet</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
				
				<div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-education" aria-hidden="true"></span> Edit Scores for Soaring and Cross Country Claims
                        <div class="pull-right"><span class="badge" style="background-color: #F94913;">{{ \App\Flight::count() }}</span></div>
                    </div>

                    <table class="panel-body table table-bordered">
                        <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Pilot</th>
							<th class="text-center">Type</th>
                            <th class="text-center">Points</th>
                            <th class="text-center">Status</th>                            
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse(\App\Flight::get() as $flight)
                                <tr>
                                    <td class="text-center">{{ $flight->id }}</td>
                                    <td class="text-center">{{ $flight->created_at }}</td>
                                    <td class="text-center">{{ $flight->user->name }}</td>
									<td class="text-center">{{ $flight->type }}</td>
                                    <td class="text-center">{{ $flight->points }}</td>
                                    <td class="text-center">{{ ucfirst($flight->status) }}</td>
									<td class="text-center"><a href="{{ route('flights.edit', $flight) }}">Edit Score</a></td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="6">No one has made any soaring or cross country claims yet</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
    </div>
@endsection
