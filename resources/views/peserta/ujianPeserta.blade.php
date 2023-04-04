@extends('layout.master')

@section('content')
            <!-- Main Container -->
            <main id="main-container">

                <!-- Page Content -->
                <div class="content">
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Input Token <small>Peserta</small></h3>
                        </div>
                        <div class="block-content">
                            <!-- Bootstrap Forms Validation -->
                            <div class="row justify-content-center py-20">
                                <div class="col-xl-6">
                                    <!-- jQuery Validation functionality is initialized in js/pages/be_forms_validation.min.js which was auto compiled from _es6/pages/be_forms_validation.js -->
                                    <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                    <form class="js-validation-bootstrap" action="be_forms_validation.html" method="post">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Token <span class="text-danger">*</span></label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" id="val-username" name="val-username" placeholder="Masukkan Token">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" class="btn btn-alt-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="form-group row">
                                        <div class="col-lg-8 ml-auto">
                                            <a href="{{ url('/pengerjaanUjian') }}"><button class="btn btn-alt-danger">Tes Ke Halaman Pengerjaan</button></a>
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

            </main>
            <!-- END Main Container -->
@endsection