<div class="panel panel-default">
    <div class="panel-heading"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> Statistics</div>

    <table class="panel-body table table-bordered">
        <thead>
        <tr>
            <th>Domain</th>
            <th>University</th>
            <th>Total Entries</th>
        </tr>
        </thead>
        <tbody>
        @foreach(\App\University::withCount('users')->orderBy('users_count', 'desc')->get() as $university)
            @if ($university->users_count != 0)
                <tr>
                    <td><i>{{ $university->domain }}</i></td>
                    <td>{{ $university->name }}</td>
                    <td>{{ $university->users_count }}</td>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>
</div>
