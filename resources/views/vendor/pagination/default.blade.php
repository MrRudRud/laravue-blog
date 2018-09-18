@if ($paginator->hasPages())
<nav class="pagination-wrapper m-t-20">
    <nav class="pagination is-centered" role="navigation" aria-label="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <a class="pagination-previous" disabled><span>&laquo;</span></a>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="pagination-previous" rel="prev">&laquo;</a>
            @endif
        <ul class="pagination-list">
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="pagination-ellipsis"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                        <li>
                        <a class="pagination-link is-current"><span>{{ $page }}</span></a>
                        </li>
                        @else
                            <li><a href="{{ $url }}" class="pagination-link">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </ul>
            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a class="pagination-next" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a>
            @else
                <a class="pagination-next" disabled><span>&raquo;</span></a>
            @endif    
    </nav>
</nav>

@endif
