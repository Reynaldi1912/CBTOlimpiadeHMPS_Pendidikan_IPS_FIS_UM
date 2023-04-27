@extends('layouts.app')

@section('content')
<br>
<h5 class="text-center">
    {{$id_exam->title}}
</h5>
<div class="block block-themed block-transparent mb-0">
    <form action="{{route('question-admin.store')}}" method="post">
    @csrf
        <div class="block-content">
            <input type="hidden" name="exam_id" id="exam_id" value="{{$id_exam->id}}">
            <label for="">Type Soal</label>
            <select name="question_type" class="form-control mb-5" onchange="getType();">
                <option value="0"></option>
                @foreach($question_type as $key)
                    <option value="{{$key->id}}">{{$key->title}}</option>
                @endforeach
            </select>
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
            </div>
        </div>
        <div class="modal-footer">
            <button  class="btn btn-success" type="submit">
                <i class="fa fa-check"></i> Simpan
            </button>
        </div>
    </form>
</div>

<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    })
    
    function getType(){
        var question_type_id = $('select[name="question_type"]').val();
        var updateForm = document.getElementById("content");
        if(question_type_id == 1){
            updateForm.innerHTML =  
                                    '<div class="row">'+
                                        '<div class="col-3">'+
                                            '<div class="block-content block-content-full">'+
                                                '<select class="form-control" name="true_answer[]">'+
                                                    '<option value="1">Benar</option>'+
                                                    '<option value="0">Salah</option>'+
                                                '</select>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="col-9">'+
                                            '<div class="block-content block-content-full">'+
                                                '<textarea id="summernote1" name="option_answer[]"></textarea>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                    '<div id="optionPlus">'+
                                    '</div>'
                                    ;
            $('#summernote1').summernote();
        }else if(question_type_id == 2){
            updateForm.innerHTML =  
                                    '<div class="row">'+
                                        '<div class="col-3">'+
                                            '<div class="block-content block-content-full">'+
                                                '<select class="form-control" name="true_answer[]">'+
                                                    '<option value="1">Benar</option>'+
                                                    '<option value="0">Salah</option>'+
                                                '</select>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="col-9">'+
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
                                            '<input type="radio" class="css-control-input" name="status" value="1" checked="">'+
                                            ' <span class="css-control-indicator"></span> Benar'+
                                        '</label>'+
                                        '<label class="css-control css-control-lg css-control-primary css-radio">'+
                                            '<input type="radio" class="css-control-input" name="status" value="0">'+
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
                                                '<textarea type="text" class="form-control" row="30" col="15" name="right_option[]"></textarea>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                    '<div id="optionPlus">'+
                                    '</div>';
            $('#summernote1').summernote();
        }else{
            updateForm.innerHTML = '';
        }
    }

    function plusOption(){
        var question_type_id = $('select[name="question_type"]').val();
        var numberLooping = $('input[name="numberLooping"]').val();

        if(question_type_id == 1){
            var updateForm = document.getElementById("optionPlus");
            updateForm.innerHTML = '';
            for (let index = 0; index < parseInt(numberLooping); index++) {
                updateForm.innerHTML +=  
                                    '<div class="row" id="option'+(index+2)+'">'+
                                        '<div class="col-1">'+
                                            '<button class="btn btn-danger btn-sm" type="button" onclick="deleteRow('+(index+2)+')"><i class="fa fa-trash"></i></button>'+
                                        '</div>'+
                                        '<div class="col-2">'+
                                            '<label class="css-control css-control-primary css-switch">'+
                                                    '<select class="form-control" name="true_answer[]">'+
                                                        '<option value="1">Benar</option>'+
                                                        '<option value="0">Salah</option>'+
                                                    '</select>'+
                                            '</label>'+
                                        '</div>'+
                                        '<div class="col-9">'+
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
        }else if(question_type_id == 2){
            var updateForm = document.getElementById("optionPlus");
            updateForm.innerHTML = '';
            for (let index = 0; index < parseInt(numberLooping); index++) {
                updateForm.innerHTML +=  
                                    '<div class="row" id="option'+(index+2)+'">'+
                                        '<div class="col-1">'+
                                            '<button class="btn btn-danger btn-sm" type="button" onclick="deleteRow('+(index+2)+')"><i class="fa fa-trash"></i></button>'+
                                        '</div>'+
                                        '<div class="col-1">'+
                                            '<select class="form-control" name="true_answer[]">'+
                                                '<option value="1">Benar</option>'+
                                                '<option value="0">Salah</option>'+
                                            '</select>'+
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
                                                    '<textarea type="text" class="form-control" row="30" col="15" name="right_option[]"></textarea>'+
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