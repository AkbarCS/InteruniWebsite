@foreach($data as $key => $value)
    @if (array_key_exists('title', $value))
        <li>{{ $value['title'] }} - <b>{{ $value['points'] }} points</b></li>
    @else
        @php $guid = kebab_case($key); @endphp
        <li><a href="#{{ $guid }}" data-toggle="collapse" data-parent="#progression">{{ $key }}</a></li>
        <ul id="{{ $guid }}" class="collapse" style="padding-left: 15px">
            @include('partials._categories', ['data' => $value])
        </ul>
    @endif
@endforeach