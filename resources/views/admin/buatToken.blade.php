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
                                    <form action="{{route('ujianAdmin.storeToken')}}" method="post">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label">Token <span class="text-danger">*</span></label>
                                            <div class="col-lg-8" id="theToken" style="display: none;">
                                                <input class="input-group-text" id="maketoken" type="text" name="token" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label">Pilih Jadwal <span class="text-danger">*</span></label>
                                            <div class="col-lg-8">
                                                <select class="form-control" id="example-select" name="jadwal_exam">
                                                    @foreach($data as $data)
                                                        <option value="{{$data->id}}">{{$data->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button onclick="visibleToken()" class="btn btn-alt-primary" type="button">Perlihatkan Token</button>
                                                <button class="btn btn-alt-success" type="submit">Submit</button>
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
                                                        <th>Nama Ujian</th>
                                                        <th class="d-none d-sm-table-cell" style="width: 15%;">Token Ujian</th>
                                                        <th class="d-none d-sm-table-cell" style="width: 15%;">Status</th>
                                                        <th class="text-center" style="width: 100px;">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $i =1;
                                                    ?>
                                                    @foreach($allData as $key)
                                                        <tr>
                                                            <th class="text-center" scope="row">{{$i++}}</th>
                                                            <td>{{$key->title}}</td>
                                                            <td class="d-none d-sm-table-cell">{{$key->token == null ? '-':$key->token}}</td>
                                                            <td class="d-none d-sm-table-cell">
                                                                @if($key->token == null)
                                                                    <span class="badge badge-danger">Non-Active</span>
                                                                @elseif($key->token != null)
                                                                    <span class="badge badge-success">Active</span>
                                                                @endif
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="btn-group">
                                                                    <form action="{{route('ujianAdmin.update',$key->id)}}" method="post">
                                                                        @csrf
                                                                        @method('PATCH')
                                                                        <input type="hidden" value="delete" name="btn">
                                                                        <button type="submit" class="btn btn-sm btn-danger show_confirm_delete" data-toggle="tooltip" title="Delete">
                                                                            Hapus Token
                                                                        </button>
                                                                    </form>
                                                                    <form action="{{route('ujianAdmin.update',$key->id)}}" method="post">
                                                                        @csrf
                                                                        @method('PATCH')
                                                                        <input type="hidden" value="update" name="btn">
                                                                        <button type="submit" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Update">
                                                                            Update Token
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
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
                document.getElementById("maketoken").value = result;
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