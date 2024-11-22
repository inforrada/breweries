@props ([
    'code',
    'message'
])

@isset ($code)
<div>
    @if ($code == 0)
    <span class="text-info">
    @elseif ($code > 0)
    <span class="text-danger">{{$code}} -
    @endif

        {!! $message !!}
    </span>
</div>
@endisset
