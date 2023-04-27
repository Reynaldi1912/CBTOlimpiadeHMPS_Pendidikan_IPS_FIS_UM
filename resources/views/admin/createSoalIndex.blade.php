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
                                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-popin" title="View Customer">
                                        <i class="fa fa-plus"></i>
                                    </button>
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


<!-- Pop In Modal -->
<div class="modal fade" id="modal-popin" tabindex="-1" role="dialog" aria-labelledby="modal-popin" aria-hidden="true">
    <div class="modal-dialog modal-dialog-popin modal-lg" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Create Soal</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <label for="">Type Soal</label>
                    <select name="question_type" class="form-control mb-5" onchange="getType();">
                        <option value="0"></option>
                        @foreach($question_type as $key)
                            <option value="{{$key->id}}">{{$key->title}}</option>
                        @endforeach
                    </select>
                    <form action="" method="post">
                        @csrf
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Pertanyaan</h3>
                        </div>                   
                        <div class="block-content block-content-full">
                            <textarea id="summernote" name="editordata"></textarea>
                        </div>
                        <hr>
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Option Jawaban</h3>
                            <div class="row">
                                <div class="col-9">
                                    <input type="number" class="form-control" name="numberLooping">
                                </div>
                                <div class="col">
                                    <button class="btn btn-success" onclick="plusOption();" type="button"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                        </div>  
                        <div id="content">

                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-alt-success" onclick="getForm();">
                    <i class="fa fa-check"></i> Perfect
                </button>
            </div>
        </div>
    </div>
</div>
<!-- END Pop In Modal -->

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
<!-- END From Right Modal -->

<script>

    $(document).ready(function() {
        $('#summernote').summernote();
    })

    function getType(){
        var question_type_id = $('select[name="question_type"]').val();
        var updateForm = document.getElementById("content");
        if(question_type_id == 1 || question_type_id == 2){
            updateForm.innerHTML =  
                                    '<div class="row">'+
                                        '<div class="col-1">'+
                                            '<div class="block-content block-content-full">'+
                                                '<label class="css-control css-control-primary css-switch">'+
                                                    '<input type="checkbox" class="css-control-input">'+
                                                    '<span class="css-control-indicator"></span> Jawaban Benar'+
                                                '</label>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="col-11">'+
                                            '<div class="block-content block-content-full">'+
                                                '<textarea id="summernote1" name="option_answer[]"></textarea>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                    '<div id="optionPlus">'+
                                    '</div>'
                                    ;
            $('#summernote1').summernote();
        }else if(question_type_id == 3){
            updateForm.innerHTML =      
                                    '<div class="block-content block-content-full">'+
                                        '<label class="css-control css-control-lg css-control-primary css-radio">'+
                                            '<input type="radio" class="css-control-input" name="status" checked="">'+
                                            ' <span class="css-control-indicator"></span> Benar'+
                                        '</label>'+
                                        '<label class="css-control css-control-lg css-control-primary css-radio">'+
                                            '<input type="radio" class="css-control-input" name="status">'+
                                            '<span class="css-control-indicator"></span> Salah'+
                                        '</label>'+
                                    '</div>';
        }else if(question_type_id == 4){
            updateForm.innerHTML =                                    
                                    '<div class="row">'+
                                        '<div class="col-8">'+
                                            '<div class="block-content block-content-full">'+
                                                '<textarea id="summernote1" name="option_answer[]"></textarea>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="col-4">'+
                                            '<div class="block-content block-content-full">'+
                                                '<textarea type="text" class="form-control" row="30" col="15"></textarea>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                    '<div id="optionPlus">'+
                                    '</div>';
            $('#summernote1').summernote();
        }
    }

    function plusOption(){
        var question_type_id = $('select[name="question_type"]').val();
        var numberLooping = $('input[name="numberLooping"]').val();

        if(question_type_id == 1 || question_type_id == 2){
            var updateForm = document.getElementById("optionPlus");
            updateForm.innerHTML = '';
            for (let index = 0; index < parseInt(numberLooping); index++) {
                updateForm.innerHTML +=  
                                    '<div class="row" id="option'+(index+2)+'">'+
                                        '<div class="col-1">'+
                                            '<button class="btn btn-danger btn-sm" type="button" onclick="deleteRow('+(index+2)+')"><i class="fa fa-trash"></i></button>'+
                                        '</div>'+
                                        '<div class="col-1">'+
                                            '<label class="css-control css-control-primary css-switch">'+
                                                '<input type="checkbox" class="css-control-input">'+
                                                '<span class="css-control-indicator"></span> Jawaban Benar'+
                                            '</label>'+
                                        '</div>'+
                                        '<div class="col-10">'+
                                            '<div class="block-content block-content-full">'+
                                                '<textarea id="summernote'+(index+2)+'" name="option_answer[]"></textarea>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'
                                    ;
            }
            
            for (let index = 0; index < parseInt(numberLooping); index++) {
                $('#summernote'+(index+2)+'').summernote();                
            }
        }else if(question_type_id == 4){
            var updateForm = document.getElementById("optionPlus");
            var updateForm = document.getElementById("optionPlus");
            updateForm.innerHTML = '';
            for (let index = 0; index < parseInt(numberLooping); index++) {
                updateForm.innerHTML += 
                                        '<div class="row" id="option'+(index+2)+'">'+
                                            '<div class="col-1">'+
                                                '<div class="block-content block-content-full">'+
                                                    '<button class="btn btn-danger btn-sm" type="button" onclick="deleteRow('+(index+2)+')"><i class="fa fa-trash"></i></button>'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="col-7">'+
                                                '<div class="block-content block-content-full">'+
                                                    '<textarea id="summernote'+(index+2)+'" name="option_answer[]"></textarea>'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="col-4">'+
                                                '<div class="block-content block-content-full">'+
                                                    '<textarea type="text" class="form-control" row="30" col="15"></textarea>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>';

            }
            for (let index = 0; index < parseInt(numberLooping); index++) {
                $('#summernote'+(index+2)+'').summernote();                
            }
        }
    }

    function deleteRow(id){
        var deleteForm = document.getElementById("option"+id);
        deleteForm.remove();
    }
</script>

@endsection