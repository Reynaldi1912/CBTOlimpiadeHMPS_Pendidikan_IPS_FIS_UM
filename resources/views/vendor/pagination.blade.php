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
    @if ($paginator->currentPage() == $paginator->lastPage())
    <footer class="footer">
        <div class="container">
            <div class="row justify-content-center">
            <div class="col-auto">
                <a type="button" href="{{route('pengerjaan.index')}}" class="btn btn-danger btn-block">Selesaikan Ujian</a>
            </div>
            </div>
        </div>
    </footer>
    @endif
@endif
