<div class="panel panel-default">
    <div class="panel-heading">
        <span class="glyphicon glyphicon-education" aria-hidden="true"></span> Progression Claims
        <a href="{{ route('claims.create') }}" class="close"><span style="font-size: 0.7em;" class="glyphicon glyphicon-plus text-success" aria-hidden="true"></span></a>
    </div>

    <table class="panel-body table table-bordered">
        <thead>
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Date</th>
            <th class="text-center">Instructor</th>
            <th class="text-center">Points</th>
            <th class="text-center">Created</th>
            <th class="text-center">Status</th>
        </tr>
        </thead>
        <tbody>
            @forelse(Auth::user()->claims as $claim)
            <tr>
                <td class="text-center">{{ $claim->id }}</td>
                <td class="text-center">{{ $claim->date }}</td>
                <td class="text-center">{{ $claim->instructor }}</td>
                <td class="text-center">{{ $claim->points }}</td>
                <td class="text-center">{{ $claim->created_at }}</td>
                <td class="text-center">{{ ucfirst($claim->status) }}</td>
            </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="6">You haven't made any progression claims! Press the plus above to make one.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
