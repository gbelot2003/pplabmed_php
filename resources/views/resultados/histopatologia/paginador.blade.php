<div class="btn-group" role="group" aria-label="...">

    @if (!isset($previous))
        {{--<a class="btn btn-info disabled"><span><</span></a>--}}
        <a type="button" class="btn btn-info disabled">Anter.</a>
    @else
        <a type="button" class="btn btn-info prev" href="{{ action('HistopatologiaController@edit', $previous) }}" rel="prev">Anter.</a>
    @endif

    <a type="button" class="btn btn-primary disabled">{{ $item->id }} de {{ $total }}</a>

    @if (!isset($next))
            <a type="button " class="btn btn-info disabled">Sig.</a>
    @else
            <a type="button" class="btn btn-info next" href="{{ action('HistopatologiaController@edit', $next) }}" rel="next">Sig.</a>
    @endif
</div>