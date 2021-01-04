@if ($paginator->hasPages())
    <div class="row justify-content-center">
        <div class="">
            <p class="center-align">Записи {{ $paginator->firstItem() }} - {{ $paginator->lastItem() }}
                из {{ $paginator->total() }}</p>
        </div>
    </div>
    <div class="row justify-content-center">
        <nav aria-label="">
            <ul class="pagination">

                @if ($paginator->onFirstPage())
                    <li class="page-item disabled"><a class="page-link" href="#">Назад</a></li>
                @else
                    <li class="page-item "><a href="{{ $paginator->previousPageUrl() }}" class="page-link" href="#">Назад</a>
                    </li>
                @endif

                @foreach ($elements as $element)
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active"><a class="page-link" href="#!">{{ $page }}</a></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                @if ($paginator->hasMorePages())
                    <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}">Вперед</a></li>
                @else
                    <li class="page-item disabled"><a class="page-link" href="#">Вперед</a></li>
                @endif
            </ul>
        </nav>
    </div>
@endif