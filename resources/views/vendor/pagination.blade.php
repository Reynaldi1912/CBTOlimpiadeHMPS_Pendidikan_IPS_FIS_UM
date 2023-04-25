@if ($paginator->hasPages())
    <div class="container">
        <ul class="pagination justify-content-start">
            <li class="page-item {{ ($paginator->currentPage() == 1) ? ' active' : (($existing_question->contains('id_exam_question' , $soal[0]->question_id)) ? 'exists' : '') }}">
                <a class="page-link" href="{{ $paginator->url(1) }}">1</a>
            </li>
            @for ($i = 2; $i <= $paginator->lastPage(); $i++)
                @if($i == 11 || $i % 11 == 0)
                    </ul>
                    <ul class="pagination justify-content-start">
                @endif
                <li class="page-item {{ ($paginator->currentPage() == $i) ? ' active' : (($existing_question->contains('id_exam_question' , $soal[$i-1]->question_id)) ? 'exists' : '') }}">
                    <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                </li>
            @endfor
        </ul>
    </div>
    @if($paginator->currentPage() == $paginator->lastPage())
        <footer class="footer">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-auto">
                        <form action="{{route('pengerjaan.selesaikanUjian',$id)}}">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-block show_confirm_simpan_ujian">Selesaikan Ujian</button>
                        </form>
                    </div>
                </div>
            </div>
        </footer>
        @endif
@endif

<script>
    // Mendapatkan tombol sebelumnya dan selanjutnya
const prevBtn = document.querySelector('#prev-btn');
const nextBtn = document.querySelector('#next-btn');

// Menambahkan event listener pada tombol sebelumnya dan selanjutnya
prevBtn.addEventListener('click', prevPage);
nextBtn.addEventListener('click', nextPage);

// Fungsi untuk berpindah ke halaman sebelumnya
function prevPage() {
  if (window.location.href.indexOf('page=') > -1) {
    // Mendapatkan nomor halaman saat ini
    const currentPage = parseInt(window.location.href.split('page=')[1]);
    if (currentPage > 1) {
      // Mengubah nomor halaman pada URL
      const prevPage = currentPage - 1;
      window.location.href = window.location.href.replace(`page=${currentPage}`, `page=${prevPage}`);
    }
  } else {
    // Jika tidak ada nomor halaman pada URL, kembali ke halaman 1
    window.location.href = window.location.href + '&page=1';
  }
}

// Fungsi untuk berpindah ke halaman selanjutnya
function nextPage() {
  if (window.location.href.indexOf('page=') > -1) {
    // Mendapatkan nomor halaman saat ini
    const currentPage = parseInt(window.location.href.split('page=')[1]);
    if (currentPage < {{ $paginator->lastPage() }}) {
      // Mengubah nomor halaman pada URL
      const nextPage = currentPage + 1;
      window.location.href = window.location.href.replace(`page=${currentPage}`, `page=${nextPage}`);
    }
  } else {
    // Jika tidak ada nomor halaman pada URL, pergi ke halaman 2
    window.location.href = window.location.href + '&page=2';
  }
}

</script>
