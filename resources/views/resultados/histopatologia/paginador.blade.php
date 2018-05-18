<div class="btn-group" role="group" aria-label="...">

    @if (!isset($previous))
        {{--<a class="btn btn-info disabled"><span><</span></a>--}}
        <a type="button" class="btn btn-info disabled"><<</a>
        <a type="button" class="btn btn-info disabled">Anter.</a>
    @else
        <a type="button" class="btn btn-info"
           href="{{ action('HistopatologiaController@edit', $first->factura_id) }}"><<</a>
        <a type="button" class="btn btn-info prev" href="{{ action('HistopatologiaController@edit', $previous) }}"
           rel="prev">Anter.</a>
    @endif



    @if (!isset($next))
        <a type="button " class="btn btn-info disabled">Sig.</a>
        <a type="button" class="btn btn-info disabled">>></a>
    @else
        <a type="button" class="btn btn-info next" href="{{ action('HistopatologiaController@edit', $next) }}"
           rel="next">Sig.</a>
        <a type="button" class="btn btn-info" href="{{ action('HistopatologiaController@edit', $last->factura_id) }}">>></a>
    @endif
</div>