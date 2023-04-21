@extends('layouts.app')

@section('content')
            <!-- Main Container -->
            <main id="main-container">

                <!-- Page Content -->
                <div class="content">
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Buat Token <small>Ujian</small></h3>
                            <!-- Pop Out Modal -->
                            <div class="block">
                                <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-popout">Lihat Token</button>
                            </div>
                            <!-- END Pop Out Modal -->
                        </div>
                        <div class="block-content">
                            <!-- Bootstrap Forms Validation -->
                            <div class="row justify-content-center py-20">
                                <div class="col-xl-6" id="visibleToken">
                                    <!-- jQuery Validation functionality is initialized in js/pages/be_forms_validation.min.js which was auto compiled from _es6/pages/be_forms_validation.js -->
                                    <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label">Token <span class="text-danger">*</span></label>
                                            <div class="col-lg-8" id="theToken" style="display: none;">
                                                <span class="input-group-text" id="maketoken">
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label">Pilih Jadwal <span class="text-danger">*</span></label>
                                            <div class="col-lg-8">
                                                <select class="form-control" id="example-select" name="example-select">
                                                    <option value="0">Please select</option>
                                                    <option value="1">Option #1</option>
                                                    <option value="2">Option #2</option>
                                                    <option value="3">Option #3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button onclick="visibleToken()" class="btn btn-alt-primary">Perlihatkan Token</button>
                                                <button class="btn btn-alt-success">Submit</button>
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
        
                <!-- Pop Out Modal -->
                <div class="modal fade" id="modal-popout" tabindex="-1" role="dialog" aria-labelledby="modal-popout" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-popout" role="document">
                        <div class="modal-content">
                            <div class="block block-themed block-transparent mb-0">
                                <div class="block-header bg-primary-dark">
                                    <h3 class="block-title">List Token</h3>
                                </div>
                                <div class="block-content">
                                    <!-- Striped Table -->
                                    <div class="block">
                                        <div class="block-content">
                                            <table class="table table-striped table-vcenter">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" style="width: 50px;">No.</th>
                                                        <th>Nama Token</th>
                                                        <th class="d-none d-sm-table-cell" style="width: 15%;">Status</th>
                                                        <th class="text-center" style="width: 100px;">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th class="text-center" scope="row">1</th>
                                                        <td>Helen Jacobs</td>
                                                        <td class="d-none d-sm-table-cell">
                                                            <span class="badge badge-success">Active</span>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Delete">
                                                                    <i class="fa fa-times"></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center" scope="row">2</th>
                                                        <td>Brian Cruz</td>
                                                        <td class="d-none d-sm-table-cell">
                                                            <span class="badge badge-danger">Non-Active</span>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Delete">
                                                                    <i class="fa fa-times"></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center" scope="row">3</th>
                                                        <td>Thomas Riley</td>
                                                        <td class="d-none d-sm-table-cell">
                                                            <span class="badge badge-success">Active</span>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Delete">
                                                                    <i class="fa fa-times"></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
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
                function makeid(length) {
                let result = '';
                const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                const charactersLength = characters.length;
                let counter = 0;
                while (counter < length) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
                counter += 1;
                }
                document.getElementById("maketoken").innerHTML = result;
            }
                console.log(makeid(8));
            </script>

            <script>
                function visibleToken() {
                var x = document.getElementById("theToken");
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
                }
            </script>
            </main>
            <!-- END Main Container -->            
@endsection