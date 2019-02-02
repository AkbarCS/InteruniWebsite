<div class="panel panel-default">
    <div class="panel-heading">
        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Submited IGC Flight Logger Files
        <a href="{{ route('flights.create') }}" class="close"><span style="font-size: 0.7em;" class="glyphicon glyphicon-plus text-success" aria-hidden="true"></span></a>
    </div>

    <table class="panel-body table table-bordered">
        <thead>
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Type</th>
            <th class="text-center">Uploaded</th>
            <th class="text-center">Status</th>
            <th class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            @php
                $colors = [
                    'queued' => 'text-muted',
                    'rejected' => 'text-danger',
                    'parsed' => 'text-info',
                    'processed' => 'text-success',
                ];
            @endphp
            @forelse(Auth::user()->flights as $flight)
                <tr>
                    <td class="text-center">{{ $flight->id }}</td>
                    <td class="text-center">{{ $flight->type === 'crosscountry' ? 'Cross Country' : 'Soaring' }}</td>
                    <td class="text-center">{{ $flight->created_at }}</td>
                    <td class="text-center {{ $colors[$flight->status] }}">{{ ucfirst($flight->status) }}</td>
                    <td class="text-center"><a href="{{ route('flights.show', $flight) }}">View</a></td>

            @empty
                <td class="text-center" colspan="5">You haven't logged any flights! Click the plus above to upload an <code>igc</code> file.</td>
            @endforelse
        </tr>
        </tbody>
    </table>
</div>
