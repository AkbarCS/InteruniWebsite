<div class="panel panel-default">
    <div class="panel-heading"><span class="glyphicon glyphicon-sunglasses" aria-hidden="true"></span> Entries</div>

    <table class="panel-body table table-bordered">
        <thead>
        <tr>
            <th>Name</th>
            <th>University</th>
            <th>Registration Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach(\App\User::all() as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->university->name}}</td>
                <td>{{ $user->created_at->format('d-m-Y') }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
