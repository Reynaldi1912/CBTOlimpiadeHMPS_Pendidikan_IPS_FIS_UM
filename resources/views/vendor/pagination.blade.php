@if ($paginator->hasPages())
    <div class="container">
        <ul class="pagination justify-content-start">
            <li class="page-item {{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
                <a class="page-link" href="{{ $paginator->url(1) }}">1</a>
            </li>

            @for ($i = 2; $i <= $paginator->lastPage(); $i++)
                @if($i == 11 || $i % 11 == 0)
                    </ul>
                    <ul class="pagination justify-content-start">
                @endif
                <li class="page-item {{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                    <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                </li>
            @endfor
        </ul>
    </div>
@endif
