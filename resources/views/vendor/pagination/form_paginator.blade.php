@if ($paginator->hasPages())
    <div class="btn-group" role="group" aria-label="...">        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            {{--<a class="btn btn-info disabled"><span><</span></a>--}}
            <a type="button" class="btn btn-info disabled">Prev.</a>
        @else
            {{--<a class="btn btn-info"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"><</a></a>--}}
            <a type="button" class="btn btn-info" href="{{ $paginator->previousPageUrl() }}" rel="prev">Prev.</a>
        @endif

        <a type="button" class="btn btn-warning disabled">{{ $paginator->currentPage() }} de {{ $paginator->total() }}</a>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            {{--<a class="btn btn-info"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">>/a></a>--}}
            <a type="button" class="btn btn-info" href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a>
        @else
            {{--<a class="btn btn-info disabled"><span>></span></a>--}}
            <a type="button " class="btn btn-info disabled">Next</a>
        @endif
    </div>
@endif