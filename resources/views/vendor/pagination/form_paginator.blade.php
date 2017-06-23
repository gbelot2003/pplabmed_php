@if ($paginator->hasPages())
    <div class="btn-group" role="group" aria-label="...">        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            {{--<a class="btn btn-info disabled"><span><</span></a>--}}
            <a type="button" class="btn btn-info disabled">Anter.</a>
        @else
            <a type="button" class="btn btn-info" href="{{ $paginator->url(1) }}" rel="next">Primer</a>
            <a type="button" class="btn btn-info" href="{{ $paginator->previousPageUrl() }}" rel="prev">Anter.</a>
        @endif

        <a type="button" class="btn btn-primary disabled">{{ $paginator->currentPage() }} de {{ $paginator->total() }}</a>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())

            <a type="button" class="btn btn-info" href="{{ $paginator->nextPageUrl() }}" rel="next">Sig.</a>
            <a type="button" class="btn btn-info" href="{{ $paginator->url($paginator->lastPage()) }}" rel="next">Ultima</a>
        @else
            {{--<a class="btn btn-info disabled"><span>></span></a>--}}
            <a type="button " class="btn btn-info disabled">Sig.</a>
        @endif
    </div>
@endif