@if ($paginator->hasPages())
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center d-flex">
            <li class="page-item {{ $paginator->onFirstPage() ? 'disabled' : '' }} ">
                <a class="page-link" href="{{ $paginator->onFirstPage() ? '#' : $paginator->previousPageUrl() }}" tabindex="-1">Previous</a>
            </li>
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item disabled">{{ $element }}</li>
                @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        <li class="page-item {{ $page == $paginator->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $page == $paginator->currentPage() ? '#' : $url }}">{{ $page }}</a>
                        </li>
                    @endforeach
                @endif
            @endforeach
            <li class="page-item {{ !$paginator->hasMorePages() ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $paginator->hasMorePages() ? $paginator->nextPageUrl() : '#' }}" rel="next">Next</a>
            </li>
        </ul>
@endif
