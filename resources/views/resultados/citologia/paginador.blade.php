<div class="btn-group" role="group" aria-label="...">

    @if (!isset($previous))
        {{--<a class="btn btn-info disabled"><span><</span></a>--}}
        <a type="button" class="btn btn-info disabled"><<</a>
        <a type="button" class="btn btn-info disabled">Anter.</a>
    @else
        <a type="button" class="btn btn-info" href="{{ action('CitologiaController@edit', $first->id) }}"><<</a>
        <a type="button" class="btn btn-info prev" href="{{ action('CitologiaController@edit', $previous) }}"
           rel="prev">Anter.</a>
    @endif



    @if (!isset($next))
        <a type="button " class="btn btn-info disabled">Sig.</a>
        <a type="button" class="btn btn-info disabled">>></a>
    @else
        <a type="button" class="btn btn-info next" href="{{ action('CitologiaController@edit', $next) }}" rel="next">Sig.</a>
        <a type="button" class="btn btn-info" href="{{ action('CitologiaController@edit', $last->id) }}">>></a>
    @endif
</div>