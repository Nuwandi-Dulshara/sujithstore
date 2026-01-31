@if ($paginator->hasPages())
<nav>
    <ul class="pagination pagination-custom justify-content-center align-items-center">

        {{-- First Page --}}
        <li class="page-item {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $paginator->url(1) }}">
                <i class="fa fa-angles-left"></i>
            </a>
        </li>

        {{-- Previous Page --}}
        <li class="page-item {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $paginator->previousPageUrl() }}">
                <i class="fa fa-chevron-left"></i>
            </a>
        </li>

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)

            {{-- Dots --}}
            @if (is_string($element))
                <li class="page-item disabled">
                    <span class="page-link dots">{{ $element }}</span>
                </li>
            @endif

            {{-- Page Numbers --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active">
                            <span class="page-link">{{ $page }}</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif

        @endforeach

        {{-- Next Page --}}
        <li class="page-item {{ $paginator->hasMorePages() ? '' : 'disabled' }}">
            <a class="page-link" href="{{ $paginator->nextPageUrl() }}">
                <i class="fa fa-chevron-right"></i>
            </a>
        </li>

        {{-- Last Page --}}
        <li class="page-item {{ $paginator->hasMorePages() ? '' : 'disabled' }}">
            <a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}">
                <i class="fa fa-angles-right"></i>
            </a>
        </li>

    </ul>
</nav>
@endif
