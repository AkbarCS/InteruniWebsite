<div class="panel panel-default">
    <div class="panel-heading"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> My Requests
        @if (! Auth::guest())
            <a href="{{ route('shirts.create') }}" class="close"><span style="font-size: 0.7em;" class="glyphicon glyphicon-plus text-success" aria-hidden="true"></span></a>
        @endif
    </div>

    <table class="panel-body table table-bordered">
        @if(Auth::guest())
            <tr>
                <td class="text-center">Please <a href="{{ route('login') }}">login</a> (or <a href="{{ route('register') }}">register</a> if you haven't) to place, view, or update your t-shirt request.</td>
            </tr>
        @else
            <thead>
            <tr>
                <th>ID</th>
                <th>Size</th>
                <th>Placed on</th>
                <th>Actions</th>
            </tr>
            <thead>
            <tbody>
            @forelse(Auth::user()->requests as $request)
                <tr>
                    <td>{{ $request->id }}</td>
                    <td>{{ ucfirst($request->size) }}</td>
                    <td>{{ $request->created_at}}</td>
                    <td>
                        <a href="{{ route('shirts.delete', $request) }}">
                            Delete
                        </a>
                    </td>
                </tr>
            @empty
                <tr><td class="text-center" colspan="4">You haven't placed any t-shirt requests. Click the plus above to place one!</td></tr>
            @endforelse
            </tbody>
    @endif
</div>
