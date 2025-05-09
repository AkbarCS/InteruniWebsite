<div class="panel panel-default">
    <div class="panel-heading"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> Soaring Ladder</div>

    <table class="panel-body table table-bordered">
        <thead>
        <tr>
            <th class="text-center">Place</th>
            <th class="text-center">University</th>
            <th class="text-center">Points</th>
        </tr>
        </thead>
        <tbody>
        @php
            $counter = 0;
            $universities = \App\University::get()->sortByDesc('soaringPoints')->reject(function($v, $k) {
                return $v->soaringPoints === 0;
            });
        @endphp
        @forelse($universities as $uni)
            @php
                $counter++;
            @endphp
            <tr>
                <td class="text-center">{{ $counter }}</td>
                <td class="text-center">{{ $uni->name }} <small>({{ $uni->domain }})</small></td>
                <td class="text-center">{{ $uni->soaringPoints }}</td>
            </tr>
        @empty
            <tr><td class="text-center" colspan="3">We haven't scored any soaring flights yet!</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
