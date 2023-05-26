@extends('layouts.app')

@section('content')
<!-- Page Content -->
<div class="content">
    <h2 class="content-heading">Kelola Peserta</h2>
    <!-- Full Table -->
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Daftar Peserta</h3>
            <button type="button" class="btn btn-alt-success mr-5 mb-5" data-toggle="modal" data-target="#tambah-peserta">
                <i class="fa fa-plus mr-5"></i>Tambah Peserta
            </button>
        </div>
        <div class="block-content">
            <div class="table-responsive">
                <table class="table table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 100px;"><i class="si si-user"></i></th>
                            <th>Name</th>
                            <th style="width: 30%;">Email</th>
                            <th style="width: 15%;">Username</th>
                            <th class="text-center" style="width: 100px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $dt)
                        <tr>
                            <td class="text-center">
                                <img class="img-avatar img-avatar48" src="/codebase/media/avatars/avatar12.jpg" alt="">
                            </td>
                            <td class="font-w600">{{$dt->name}}</td>
                            <td>{{$dt->email}}</td>
                            <td>
                                <span class="badge badge-info">{{$dt->username}}</span>
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Delete">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- END Full Table -->

    <!-- Pop Out Modal -->
    <div class="modal fade" id="tambah-peserta" tabindex="-1" role="dialog" aria-labelledby="modal-popout" aria-hidden="true">
            <div class="modal-dialog modal-dialog-popout" role="document">
                <div class="modal-content">
                <form class="js-validation-signup" method="POST" action="{{route('user.store')}}">
                    @csrf
                <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Tambah Peserta</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="si si-close"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                            <!-- Default Elements -->
                            <div class="block">
                                    <div class="block-content">
                                        <div class="form-group row">
                                            <input type="hidden" value="peserta" name="status">
                                            <div class="col-12">
                                                <div class="form-material floating">
                                                    <input type="text" class="form-control" id="signup-name" name="name">
                                                    <label for="signup-name">Nama Lengkap</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <div class="form-material floating">
                                                    <input type="text" class="form-control" id="signup-username" name="username">
                                                    <label for="signup-username">Username</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <div class="form-material floating">
                                                    <input type="email" class="form-control" id="signup-email" name="email">
                                                    <label for="signup-email">Email</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <div class="form-material floating">
                                                    <input type="text" class="form-control" id="signup-password" name="password">
                                                    <label for="signup-password">Password</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <!-- END Default Elements -->
                        </div>
                    </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-alt-success">
                                <i class="fa fa-check"></i> Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END Pop Out Modal -->
</div>
<!-- END Page Content -->
@endsection