@extends('layouts.app')

@section('content')
<!-- Page Content -->
<div class="content">
    <!-- Full Table -->
    <div class="block">
        <div class="block-header block-header-default row text-center">
            <div class="col text-left">
                <span class="text-bold"><b>Perlihatkan Pengumuman : </b></span>
                <select name="selectedExam" class="form-control" onchange="updatePengumuman(this.value);">
                    <option value="0" data-url="{{route('update-pengumuman', ['id' => 0])}}">Jangan Perlihatkan</option>
                    @foreach($exam as $exam_detail)
                        <option value="{{$exam_detail->id}}" data-url="{{route('update-pengumuman', ['id' => $exam_detail->id])}}" @if($exam_detail->tampil == 1) selected @endif>{{$exam_detail->title}}</option>
                    @endforeach
                </select>

            </div>
            <div class="col"></div>
            <div class="col">
            <form action="{{route('ujianAdmin.input_semua_nilai')}}" method="post">
                @csrf
                <select name="exam_id" class="form-control">
                    @foreach($exam as $ex)
                        <option value="{{$ex->id}}">{{$ex->title}}</option>
                    @endforeach
                </select>
                <button class="btn btn-success btn-block simpan_nilai" type="submit">Simpan Nilai Akhir</button>
            </form>
            </div>
           
        </div>
        <div class="block-content">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 100px;"><i class="si si-user"></i></th>
                            <th>Name</th>
                            <th style="width: 30%;">Ujian</th>
                            <th style="width: 30%;">Asal Sekolah</th>
                            <th style="width: 15%;">Jumlah Soal</th>
                            <th style="width: 15%;">Nilai Otomatis (PG)</th>
                            <th style="width: 15%;">Nilai Akhir</th>
                            <th style="width: 15%;">Status Kelulusan</th>
                            <th class="text-center" style="width: 100px;">Lihat/Nilai Pengerjaan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                        ?>
                        
                        @foreach($nilai as $nilai)
                        <tr>
                            <td class="text-center">
                                <img class="img-avatar img-avatar48" src="/codebase/media/avatars/avatar12.jpg" alt="">
                            </td>
                            <td class="font-w600">{{$nilai->name}}</td>
                            <td>{{$nilai->title}}</td>
                            <td>SMP Muhammadiyah 1 Malang</td>
                            <td>{{count($soal->where('exam_id',$nilai->exam_id))}} Soal</td>
                            <td>
                                <span class="badge badge-primary">{{$nilai->nilai}} / {{$nilai->total_nilai}}</span>
                            </td>
                            <td>  
                                @if($hasil_akhir_ujian->where('id_user',$nilai->id_user)->where('exam_id',$nilai->exam_id)->first())
                                <span class="badge badge-success">
                                    {{$hasil_akhir_ujian->where('id_user',$nilai->id_user)->where('exam_id',$nilai->exam_id)->first()->nilai_akhir}}
                                </span>
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @if($hasil_akhir_ujian->where('id_user',$nilai->id_user)->where('exam_id',$nilai->exam_id)->first())
                                        @if($hasil_akhir_ujian->where('id_user',$nilai->id_user)->where('exam_id',$nilai->exam_id)->first()->status == 1)
                                            <span class="badge badge-success">Lolos</span>
                                        @else
                                            <span class="badge badge-danger">Belum Lolos</span>
                                        @endif
                                @else
                                    -
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{route('hasil-ujian.show',$nilai->id)}}"><button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Edit">
                                        <i class="fa fa-eye"></i>
                                    </button> &nbsp
                                    @if($hasil_akhir_ujian->where('id_user',$nilai->id_user)->where('exam_id',$nilai->exam_id)->first())
                                        <form action="{{route('ujianAdmin.update_lolos',$hasil_akhir_ujian->where('id_user',$nilai->id_user)->where('exam_id',$nilai->exam_id)->first()->id)}}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Ganti Status Lolos">
                                                <i class="fa fa-refresh"></i>
                                            </button>
                                        </form>
                                    @else
                                        -
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- END Full Table -->
</div>
<!-- END Page Content -->


<!-- Pop Out Modal -->
<div class="modal fade" id="edit-nilai" tabindex="-1" role="dialog" aria-labelledby="modal-popout" aria-hidden="true">
    <div class="modal-dialog modal-dialog-popout" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Masukkan Nilai</h3>
                </div>
                <div class="block-content">
                <form action="be_forms_elements_bootstrap.html" method="post" onsubmit="return false;">
                    <div class="form-group">
                        <label for="example-nf-email">Nilai</label>
                        <input type="value" class="form-control" id="example-nf-email" name="example-nf-email" placeholder="Masukkan Nilai.." require>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-alt-success" data-dismiss="modal">
                            <i class="fa fa-check"></i> Submit
                        </button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Pop Out Modal -->
<script>
function updatePengumuman(selectedValue) {
    var select = document.getElementsByName('selectedExam')[0]; // Mengakses elemen <select> berdasarkan nama
    var selectedOption = select.querySelector("option[value='" + selectedValue + "']"); // Memperoleh opsi yang dipilih
    var url = selectedOption.getAttribute('data-url');
    var tampil = selectedOption.value;

    // Mengirim permintaan AJAX
    var xhr = new XMLHttpRequest();
    xhr.open('post', url, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');    
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log('Pengumuman diperbarui!');
        }
    };
    xhr.send('tampil=' + tampil);
}



</script>


<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
@endsection