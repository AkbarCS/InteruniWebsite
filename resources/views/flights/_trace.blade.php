@php
$trace = array_map(function($point) {
    return [
        'lat' => $point->latitude,
        'lng' => $point->longitude,
    ];
}, $flightdata->traces->lateral);
@endphp

<div class="panel panel-default">
    <div class="panel-heading">
        <span class="glyphicon glyphicon-send" aria-hidden="true"></span> Flight Trace Visualization
    </div>

    <div class="panel-body">
        <trace :path="{{ json_encode($trace) }}"></trace>
    </div>
</div>
