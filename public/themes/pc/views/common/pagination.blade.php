@if ($paginator->hasPages())
    <div class="page">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <div class="page-item fb-inlineBlock"><a href="javascript:;">第一页</a></div>
        @else
            <div class="page-item fb-inlineBlock"><a href="{{ $paginator->previousPageUrl() }}">上一页</a></div>
        @endif
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <div class="page-item fb-inlineBlock active"><a href="javascript:;">{{ $element }}</a></div>
            @endif
            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <div class="page-item fb-inlineBlock active"><a href="javascript:;">{{ $page }}</a></div>
                    @else
                        <div class="page-item fb-inlineBlock "><a href="{{ $url }}">{{ $page }}</a></div>
                    @endif
                @endforeach
            @endif
        @endforeach
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <div class="page-item  fb-inlineBlock"><a href="{{ $paginator->nextPageUrl() }}">下一页</a></div>
        @else
            <div class="page-item  fb-inlineBlock"><a href="javascript:;">最后一页</a></div>
        @endif
    </div>
@endif

