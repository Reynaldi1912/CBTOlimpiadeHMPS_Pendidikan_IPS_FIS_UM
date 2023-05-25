@extends('layouts.app')

@section('content')
<main id="main-container">

<!-- Page Content -->
<div class="content">
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Create <small>Soal</small></h3>
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
                            @foreach($exam as $exams)
                            <tr>
                                <td class="text-center">{{$i++}}</td>
                                <td class="font-w600">{{$exams->title}}</td>
                                <td class="d-none d-sm-table-cell">{{$exams->duration}}</td>
                                <td class="d-none d-sm-table-cell">
                                   {{$total_question->where('exam_id',$exams->id)->count()}}
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-sm btn-info open-modal" data-toggle="modal" data-target="#modal-fromright" data-examid="{{$exams->id}}">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <a type="button" class="btn btn-sm btn-success" href="{{route('question-admin.show',$exams->id)}}" >
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
@foreach($exam as $examData)
<div class="modal fade" id="modal-fromright-{{$examData->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-fromright-{{$examData->id}}" aria-hidden="true">
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
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th class="text-center"></th>
                                <th>Soal</th>
                                <th class="d-none d-sm-table-cell" style="width: 15%;">Type</th>
                                <th class="text-center" style="width: 15%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 1;
                            ?>
                            @foreach($exam_question->where('id', $examData->id) as $data)
                            <tr>
                                <td>
                                    {{$i++}}
                                </td>
                                <td>
                                    <?php
                                    echo $data->question
                                    ?>
                                </td>
                                <td>{{$data->question_type}}</td>
                                <td>
                                    <a type="button" class="btn btn-sm btn-success" href="#">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a type="button" class="btn btn-sm btn-danger" href="#">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
@endforeach



<script>
    $(document).ready(function() {
        $('.open-modal').click(function() {
            var examId = $(this).data('examid'); // Mengambil parameter examid dari tombol yang diklik
            var modalId = '#modal-fromright-' + examId; // Membuat ID modal sesuai dengan parameter examid
            // Lakukan operasi lain dengan parameter yang diambil, misalnya melakukan permintaan Ajax untuk mengambil data terkait

            // Buka modal yang sesuai
            $(modalId).modal('show');
        });
    });
</script>
@endsection
