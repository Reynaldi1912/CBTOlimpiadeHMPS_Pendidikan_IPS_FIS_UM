@extends('layouts.app')

@section('content')
            <!-- Main Container -->
            <main id="main-container">

                <!-- Page Content -->
                <div class="content">
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Buat Token <small>Ujian</small></h3>
                        </div>
                        <div class="block-content">
                            <!-- Bootstrap Forms Validation -->
                            <div class="row justify-content-center py-20">
                                <div class="col-xl-6">
                                    <!-- jQuery Validation functionality is initialized in js/pages/be_forms_validation.min.js which was auto compiled from _es6/pages/be_forms_validation.js -->
                                    <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Token <span class="text-danger">*</span></label>
                                            <div class="col-lg-8">
                                                <span class="input-group-text" id="maketoken">
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" class="btn btn-alt-primary">Buat Token</button>
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
                return result;
                document.getElementById("maketoken").innerHTML = result; 
            }
                console.log(makeid(5));
            </script>
            </main>
            <!-- END Main Container -->            
@endsection