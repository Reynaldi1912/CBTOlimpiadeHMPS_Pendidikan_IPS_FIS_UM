@extends('layouts.app')

@section('content')
<main id="main-container">

<!-- Page Content -->
<div class="content">
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Create <small>Ujian</small></h3>
            <!-- Pop Out Modal -->
            <div class="block">
                <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-popout">Lihat Token</button>
            </div>
            <!-- END Pop Out Modal -->
        </div>
        <div class="block-content">
            <!-- Bootstrap Forms Validation -->
            <div class="row justify-content-center py-20">
                
                <div class="block-content block-content-full">
                    <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th class="text-center"></th>
                                <th>Nama Ujian</th>
                                <th class="d-none d-sm-table-cell">Durasi</th>
                                <th class="d-none d-sm-table-cell" style="width: 15%;">Jumlah Soal</th>
                                <th class="text-center" style="width: 15%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 1;
                            ?>
                            @foreach($exam as $exam)
                            <tr>
                                <td class="text-center">{{$i++}}</td>
                                <td class="font-w600">{{$exam->title}}</td>
                                <td class="d-none d-sm-table-cell">{{$exam->duration}}</td>
                                <td class="d-none d-sm-table-cell">
                                   {{$total_question->where('exam_id',$exam->id)->count()}}
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-fromright" title="View Customer">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <a type="button" class="btn btn-sm btn-success" href="{{route('question-admin.show',$exam->id)}}" >
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> 
            </div>
        </div>
    </div>
</div>


<!-- From Right Modal -->
<div class="modal fade" id="modal-fromright" tabindex="-1" role="dialog" aria-labelledby="modal-fromright" aria-hidden="true">
    <div class="modal-dialog modal-dialog-fromright modal-lg" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">List Soal</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <form action="" method="post">
                        @csrf
                        <label for="">Pertanyaan</label>
                            <select class="form-control" name="true_answer[]">
                                <option value="1">Benar</option>
                                <option value="0">Salah</option'>
                            </select>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-alt-success" data-dismiss="modal">
                    <i class="fa fa-check"></i> Perfect
                </button>
            </div>
        </div>
    </div>
</div>

@endsection