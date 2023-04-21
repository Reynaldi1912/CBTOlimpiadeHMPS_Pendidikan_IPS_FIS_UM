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
                <div class="col-xl-6" id="visibleToken">
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
                                <input type="text" class="form-control" name="txtDeskripsiUjian">
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
            </div>

        </div>
    </div>
    <!-- Bootstrap Forms Validation -->
        </div>
    </div>
</div>
<!-- END Page Content -->         
@endsection