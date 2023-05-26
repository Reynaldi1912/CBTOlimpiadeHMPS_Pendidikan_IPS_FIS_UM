@extends('layouts.app')

@section('content')
<!-- Page Content -->
<div class="content">
    <!-- Full Table -->
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Hasil Ujian</h3>
            <input type="checkbox" checked data-toggle="toggle" data-onstyle="dark">
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
                            <th style="width: 15%;">Nilai</th>
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
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{route('hasil-ujian.show',$nilai->id)}}"><button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Edit">
                                        <i class="fa fa-eye"></i>
                                    </button>
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

<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
@endsection