@extends('layouts.app')

@section('content')
<!-- Main Container -->
<main id="main-container">

<!-- Page Content -->
<div class="content">
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Buat Jadwal Ujian</h3>
            <!-- Pop Out Modal -->
            <!-- <div class="block">
                <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-popout">Lihat Token</button>
            </div> -->
            <!-- END Pop Out Modal -->
        </div>
        <div class="block-content">
            <!-- Bootstrap Forms Validation -->
            <div class="row justify-content-center py-20">
                <div class="col-xl-5" id="inputUjian">
                    <!-- jQuery Validation functionality is initialized in js/pages/be_forms_validation.min.js which was auto compiled from _es6/pages/be_forms_validation.js -->
                    <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                    <form action="{{route('ujianAdmin.store')}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Nama Ujian <span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="txtNamaUjian" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Deskripsi Ujian</label>
                            <div class="col-lg-8">
                                <textarea name="txtDeskripsiUjian" class="form-control" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Mulai Ujian <span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <input type="text" class="js-flatpickr form-control bg-white" id="example-flatpickr-datetime" name="txtMulaiUjian" data-enable-time="true">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Durasi Ujian <span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <input type="number" class="form-control" name="txtDurasiUjian" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-8 ml-auto">
                                <button class="btn btn-alt-success btn-block" type="submit">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-xl-7">
                <div class="block">
                        <div class="block-content block-content-full">
                            <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th class="text-center"></th>
                                        <th>Nama Ujian</th>
                                        <th class="d-none d-sm-table-cell">Deskripsi Ujian</th>
                                        <th class="d-none d-sm-table-cell" style="width: 15%;">Mulai Ujian</th>
                                        <th class="text-center" style="width: 15%;">Durasi Ujian</th>
                                        <th class="text-center" style="width: 15%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i = 1;
                                    ?>
                                    @foreach($exam as $exam)
                                    <tr data-id="{{$exam->id}}">
                                        <td class="text-center">{{$i++}}</td>
                                        <td class="font-w600">{{$exam->title}}</td>
                                        <td class="d-none d-sm-table-cell">{{$exam->description}}</td>
                                        <td class="d-none d-sm-table-cell">
                                            {{$exam->start_at}}
                                        </td>
                                        <td>{{$exam->duration}} menit</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-sm btn-warning text-white" onclick="updateForm('{{$exam->id}}', '{{$exam->title}}', '{{$exam->description}}', '{{$exam->start_at}}', {{$exam->duration}})">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                            <a class="btn btn-sm btn-success text-white btn-show-modal" title="tambah peserta" data-toggle="modal" data-target="#modal-popout"><i class="fa fa-eye"></i></a>
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
    </div>
    <!-- Bootstrap Forms Validation -->
        </div>
    </div>
</div>
<!-- END Page Content -->   

<div class="modal fade" id="modal-popout" tabindex="-1" role="dialog" aria-labelledby="modal-popout" aria-hidden="true">
    <div class="modal-dialog modal-dialog-popout" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <div class="row">
                        <div class="col-8">
                            <h3 class="block-title text-white">List Peserta Ujian</h3>
                        </div>
                        <div class="col">
                            <a id="addPeserta" class="btn btn-success btn-block">Tambah Peserta Ujian</a>
                        </div>
                    </div>
                </div>
                <div class="block-content">
                    <!-- Striped Table -->
                    <div class="block">
                        <div class="block-content">
                            <table class="table table-striped table-vcenter">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 50px;">No.</th>
                                        <th class="d-none d-sm-table-cell" style="width: 50%;">Nama Peserta</th>
                                        <th class="d-none d-sm-table-cell" style="width: 50%;">Asal Sekolah</th>
                                        <th class="d-none d-sm-table-cell" style="width: 15%;">Status</th>
                                        <th class="text-center" style="width: 100px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="content">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END Striped Table -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- END Pop Out Modal -->

<script>
$(document).ready(function (){
    $(".btn-show-modal").click(function () {
        var id = $(this).closest("tr").data("id");
        document.getElementById("addPeserta").href = "/pengerjaan/"+id+"/edit";
        var results = document.getElementById("content");
        $.getJSON("/endpoint_data_peserta/"+id, function(result){
            let outerDiv = "";
            for (let index = 0; index < result.length; index++) {
                outerDiv += '<tr>'+
                                "<td>"+(index+1)+"</td>"+
                                "<td>"+result[index].name+"</td>"+
                                "<td>Test Sekolah</td>"+
                                "<td>"+(result[index].finish == 1 ? '<span class="text-success">Selesai</span>':'<span class="text-info">Belum Selesai</span>')+"</td>"+
                                '<td>'+
                                    '<form method="POST" action="/pengerjaan/'+result[index].id_attemps+'" style="display:inline">'+
                                        '@csrf'+
                                        '<input type="hidden" name="_method" value="DELETE">'+
                                        '<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>'+
                                    '</form>'+
                                '</td>'+
                            '</tr>';
            }
            results.innerHTML = outerDiv;
        });
    });
});

function updateForm(id , title , description , start_at , duration){
    console.log(start_at);
    var updateForm = document.getElementById("inputUjian");
    let date = new Date(start_at);
    let formattedDate = date.toLocaleString('sv', { timeZone: 'Asia/Jakarta' }).replace(' ', 'T');
    updateForm.innerHTML = 
                    '<form action="/updateJadwal/'+id+'" method="post">'+
                        '@csrf'+
                        '@method('PUT')'+
                        "<div class='form-group row'>"+
                            "<label class='col-lg-4 col-form-label'>Nama Ujian <span class='text-danger'>*</span></label>"+
                            "<div class='col-lg-8'>"+
                                "<input type='text' class='form-control' name='txtNamaUjian' value='"+title+"' required>"+
                            "</div>"+
                        "</div>"+
                        "<div class='form-group row'>"+
                            "<label class='col-lg-4 col-form-label'>Deskripsi Ujian</label>"+
                            "<div class='col-lg-8'>"+
                                "<textarea name='txtDeskripsiUjian' class='form-control' cols='30' rows='10'>"+description+"</textarea>"+
                            "</div>"+
                        "</div>"+
                        "<div class='form-group row'>"+
                            "<label class='col-lg-4 col-form-label'>Mulai Ujian <span class='text-danger'>*</span></label>"+
                            "<div class='col-lg-8'>"+
                                "<input type='datetime-local' class='js-flatpickr form-control bg-white' id='example-flatpickr-datetime' name='txtMulaiUjian' data-enable-time='true' value="+formattedDate+">"+
                            "</div>"+
                        "</div>"+
                        "<div class='form-group row'>"+
                            "<label class='col-lg-4 col-form-label'>Durasi Ujian <span class='text-danger'>*</span></label>"+
                            "<div class='col-lg-8'>"+
                               " <input type='number' class='form-control' name='txtDurasiUjian' required value="+duration+">"+
                            "</div>"+
                        "</div>"+
                        "<div class='form-group row'>"+
                            "<div class='col-lg-8 ml-auto'>"+
                                "<button class='btn btn-alt-warning btn-block' type='submit'>Edit</button>"+
                            "</div>"+
                        "</div>"+
                    "</form>";
}
</script>
@endsection