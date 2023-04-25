@extends('layouts.app')

@section('content')
<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">List Ujian <small>Peserta</small></h3>
            </div>
            <div class="block-content">
                <table class="table table-vcenter">
                    <thead>
                        <tr>
                            <th>Ujian</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Tanggal Mulai</th>
                            <th class="text-center" style="width: 100px;">Durasi</th>
                            <th class="text-center" style="width: 100px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $data)
                    <tr data-id="{{$data->id}}">
                        <td>{{$data->title}}</td>
                        <td>{{$data->start_at}}</td>
                        <td>{{$data->duration}} menit</td>
                        <td>
                            <a class="btn btn-success text-white btn-show-modal" title="tambah peserta" data-toggle="modal" data-target="#modal-popout"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Bootstrap Forms Validation -->
            </div>
        </div>
    </div>
    <!-- END Page Content -->

</main>
<!-- END Main Container -->
<!-- Pop Out Modal -->
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
</script>

@endsection

