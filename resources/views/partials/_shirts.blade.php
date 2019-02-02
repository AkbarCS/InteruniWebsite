<div class="panel panel-default">
    <div class="panel-heading"><span class="glyphicon glyphicon-fire" aria-hidden="true"></span> The Shirts</div>

    <div class="panel-body">
        <p>Once more, we are planning on getting competition T-shirts from Wingthing. These are a high quality pieces of clothing that will be a great souvenir from our awesome week of flying!</p>
        <p>They will be in the region of £18. Design to follow! Please respond below with your size if you want one so we can get preliminary numbers.</p>
        @php
            $requests = \App\Request::count();
            $ratio = $requests / 20;
            $percetage = $ratio > 1 ? 100 : $ratio * 100;
        @endphp
        @if ($requests < 20)
            <p>Wingthing's minimum order size before starting a design is 20 shirts. We've already got:</p>
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="{{ $requests }}" aria-valuemin="0" aria-valuemax="20" style="width: {{ $percetage }}%;">
                    {{ \App\Request::count() }} / 20
                </div>
            </div>
        @else
            <p>We've already put a request with Wingthing and the shirt design will be announced soon!</p>
        @endif
    </div>
</div>
