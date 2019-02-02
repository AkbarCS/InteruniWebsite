@extends('layouts.app')

@php
    $data = [
        ['id'=> 0,'title' => 'First Flight in glider', 'points' => 100],
        ['id'=> 1,'title' => 'Primary Effects of ailerons and elevator', 'points' => 50],
        ['id'=> 2,'title' => 'Secondary Effects of ailerons and elevator', 'points' => 50],
        ['id'=> 3,'title' => 'Lookout (straight glide / turning)', 'points' => 50],
        ['id'=> 4,'title' => 'Turning using all three controls together', 'points' => 50],
        ['id'=> 5,'title' => 'Trimming and speed control', 'points' => 50],
        ['id'=> 6,'title' => 'Pre-takeoff Checks', 'points' => 50],
        ['id'=> 7,'title' => 'Winch Launch', 'points' => 100],
        ['id'=> 8,'title' => 'Winch Failures', 'points' => 100],
        ['id'=> 9,'title' => 'Winch Launch Signals', 'points' => 50],
        ['id'=> 10,'title' => 'Aerotow Launch', 'points' => 100],
        ['id'=> 11,'title' => 'Aerotow Signals', 'points' => 50],
        ['id'=> 12,'title' => 'Confidence stall', 'points' => 50],
        ['id'=> 13,'title' => 'Stall warnings and symptoms', 'points' => 100],
        ['id'=> 14,'title' => 'Accelerated stalls', 'points' => 50],
        ['id'=> 15,'title' => 'Spin recognition and recovery', 'points' => 100],
        ['id'=> 16,'title' => 'Spiral dive recognition and recovery', 'points' => 50],
        ['id'=> 17,'title' => 'Stall/spin avoidance during failed winch launch', 'points' => 50],
        ['id'=> 18,'title' => 'Basic aerobatics (loop, chandelle)', 'points' => 50],
        ['id'=> 19,'title' => 'Reduced & Negative \'G\'', 'points' => 50],
        ['id'=> 20,'title' => 'Circuit Planning', 'points' => 50],
        ['id'=> 21,'title' => 'Air Brake / Elevator Co-ordination', 'points' => 50],
        ['id'=> 22,'title' => 'Approach Control', 'points' => 50],
        ['id'=> 23,'title' => 'Landing', 'points' => 100],
        ['id'=> 24,'title' => 'Side Slipping', 'points' => 100],
        ['id'=> 25,'title' => 'Thermal Soaring', 'points' => 50],
        ['id'=> 26,'title' => 'Ridge Soaring', 'points' => 50],
        ['id'=> 27,'title' => 'Wave Soaring', 'points' => 50],
        ['id'=> 28,'title' => 'First Solo', 'points' => 500],
        ['id'=> 29,'title' => 'First Solo (New Launch Type)', 'points' => 200],
        ['id'=> 30,'title' => 'Aircraft Conversion (Minor)', 'points' => 50],
        ['id'=> 31,'title' => 'Aircraft Conversion (Major)', 'points' => 100],
        ['id'=> 32,'title' => 'Bronze Flying Test', 'points' => 150],
        ['id'=> 33,'title' => 'Bronze Field Landings', 'points' => 150],
        ['id'=> 34,'title' => 'Bronze Ground Exam', 'points' => 150],
        ['id'=> 35,'title' => 'Bronze Log Book Requirement', 'points' => 50],
        ['id'=> 36,'title' => 'Bronze Badge Completion', 'points' => 25],
        ['id'=> 37,'title' => 'Cross Country 1 hr Soaring Flight', 'points' => 150],
        ['id'=> 38,'title' => 'Cross Country 2 hr Soaring Flight', 'points' => 175],
        ['id'=> 39,'title' => 'Cross Country Field Selection/Landings', 'points' => 150],
        ['id'=> 40,'title' => 'Cross Country Navigation', 'points' => 150],
        ['id'=> 41,'title' => 'Cross Country Endorsement Completion', 'points' => 25],
        ['id'=> 42,'title' => 'First Cross Country Flight', 'points' => 200],
        ['id'=> 43,'title' => 'Silver Height Gain (1,000m / 3,281ft)', 'points' => 250],
        ['id'=> 44,'title' => 'Silver Distance (50km, with \'1% rule\')', 'points' => 250],
        ['id'=> 45,'title' => 'Silver / Gold Duration (5 hrs)', 'points' => 250],
        ['id'=> 46,'title' => 'Silver Badge Completion', 'points' => 25],
        ['id'=> 47,'title' => 'BI Course', 'points' => 500],
        ['id'=> 48,'title' => '100km Diploma Part I', 'points' => 250],
        ['id'=> 49,'title' => '100km Diploma Part II', 'points' => 275],
        ['id'=> 50,'title' => 'Gold Height Gain (3,000m / 9,843ft)', 'points' => 350],
        ['id'=> 51,'title' => 'Gold Distance (300km)', 'points' => 350],
        ['id'=> 52,'title' => 'Gold Badge Completion', 'points' => 25],
        ['id'=> 53,'title' => 'Diamond Height Gain (5,000m / 16,405ft)', 'points' => 400],
        ['id'=> 54,'title' => 'Diamond Goal (300km)', 'points' => 400],
        ['id'=> 55,'title' => 'Diamond Distance (500km)', 'points' => 400],
        ['id'=> 56,'title' => 'Diamond Badge Completion', 'points' => 25],
        ['id'=> 57,'title' => 'Standard Aerobatics Badge', 'points' => 200],
    ];
@endphp

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-education" aria-hidden="true"></span> Review Progression Claim
                        <a href="{{ route('claims.update', $claim) }}" onclick="event.preventDefault(); document.getElementById('reject-form').submit();" class="close" style="padding-left:5px;"><span style="font-size: 0.7em;" class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span></a>
                        <a href="{{ route('claims.update', $claim) }}" onclick="event.preventDefault(); document.getElementById('approve-form').submit();" class="close"><span style="font-size: 0.7em;" class="glyphicon glyphicon-ok text-success" aria-hidden="true"></span></a>
                        <form id="approve-form" action="{{ route('claims.update', $claim) }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <input type="hidden" name="status" value="approved">
                        </form>
                        <form id="reject-form" action="{{ route('claims.update', $claim) }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <input type="hidden" name="status" value="rejected">
                        </form>
                    </div>

                    <table class="panel-body table table-bordered">
                        <tbody>
                        <tr>
                            <th>ID</th>
                            <td>{{ $claim->id }}</td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td>{{ $claim->date }}</td>
                        </tr>
                        <tr>
                            <th>Pilot</th>
                            <td>{{ $claim->user->name }}</td>
                        </tr>
                        <tr>
                            <th>Instructor</th>
                            <td>{{ $claim->instructor }}</td>
                        </tr>
                        <tr>
                            <th>Claims</th>
                            <td>
                                <ul style="margin-bottom: 0;">
                                    @foreach(explode(',', $claim->claims) as $c)
                                        <li>{{ $data[$c]["title"] }} (<b>{{ $data[$c]["points"] }}</b>)</li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th>Remarks</th>
                            <td>{{ $claim->remarks }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
