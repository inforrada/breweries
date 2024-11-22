@if (isset($code) && ($code >= 0))
<div>
    @if (isset($image) && (trim($image) != ""))
    <img src="{{ trim($image) }}" style="height: 2em">
    @endif

    @if ($code == 0)
    <span class="text-info">
    @elseif ($code > 0)
    <span class="text-danger">{{$code}} -
    @endif

        {!! $message !!}
    </span>
</div>
@endif
