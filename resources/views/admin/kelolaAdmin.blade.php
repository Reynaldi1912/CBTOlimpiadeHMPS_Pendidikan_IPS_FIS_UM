@extends('layouts.app')

@section('content')
<!-- Page Content -->
<div class="content">
    <h2 class="content-heading">Kelola Admin</h2>
    <!-- Full Table -->
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Daftar Admin</h3>
            <button type="button" class="btn btn-alt-success mr-5 mb-5" data-toggle="modal" data-target="#tambah-admin">
                <i class="fa fa-plus mr-5"></i>Tambah Admin
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
                            <th style="width: 15%;">Role</th>
                            <th class="text-center" style="width: 100px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">
                                <img class="img-avatar img-avatar48" src="/codebase/media/avatars/avatar12.jpg" alt="">
                            </td>
                            <td class="font-w600">Henry Harrison</td>
                            <td>customer1@example.com</td>
                            <td>
                                <span class="badge badge-info">Admin</span>
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#edit-admin" title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Delete">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <img class="img-avatar img-avatar48" src="/codebase/media/avatars/avatar11.jpg" alt="">
                            </td>
                            <td class="font-w600">Scott Young</td>
                            <td>customer2@example.com</td>
                            <td>
                                <span class="badge badge-info">Admin</span>
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
                        <tr>
                            <td class="text-center">
                                <img class="img-avatar img-avatar48" src="/codebase/media/avatars/avatar16.jpg" alt="">
                            </td>
                            <td class="font-w600">Jeffrey Shaw</td>
                            <td>customer3@example.com</td>
                            <td>
                                <span class="badge badge-info">Admin</span>
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- END Full Table -->

    <!-- Pop Out Modal Tambah Admin-->
    <div class="modal fade" id="tambah-admin" tabindex="-1" role="dialog" aria-labelledby="modal-popout" aria-hidden="true">
        <div class="modal-dialog modal-dialog-popout" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Tambah Admin</h3>
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
                                    <form action="be_forms_elements_bootstrap.html" method="post" enctype="multipart/form-data" onsubmit="return false;">
                                        <div class="form-group row">
                                            <label class="col-12">Role</label>
                                            <div class="col-md-9">
                                                <div class="form-control-plaintext">Admin</div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12" for="example-text-input">Nama</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="example-nama-input" name="example-nama-input" placeholder="Nama..">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12" for="example-text-input">Username</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="example-username-input" name="example-username-input" placeholder="Username..">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12" for="example-email-input">Email</label>
                                            <div class="col-md-9">
                                                <input type="email" class="form-control" id="example-email-input" name="example-email-input" placeholder="Email..">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12" for="example-password-input">Password</label>
                                            <div class="col-md-9">
                                                <input type="password" class="form-control" id="example-password-input" name="example-password-input" placeholder="Password..">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-alt-success">
                                                <i class="fa fa-check"></i> Submit
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- END Default Elements -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Pop Out Modal Tambah Admin-->

    <!-- Pop In Modal Edit Admin -->
    <div class="modal fade" id="edit-admin" tabindex="-1" role="dialog" aria-labelledby="modal-popin" aria-hidden="true">
            <div class="modal-dialog modal-dialog-popin" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Edit Admin</h3>
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
                                    <form action="be_forms_elements_bootstrap.html" method="post" enctype="multipart/form-data" onsubmit="return false;">
                                        <div class="form-group row">
                                            <label class="col-12">Role</label>
                                            <div class="col-md-9">
                                                <div class="form-control-plaintext">Admin</div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12" for="example-text-input">Nama</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="example-nama-input" name="example-nama-input" placeholder="Nama..">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12" for="example-text-input">Username</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="example-username-input" name="example-username-input" placeholder="Username..">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12" for="example-email-input">Email</label>
                                            <div class="col-md-9">
                                                <input type="email" class="form-control" id="example-email-input" name="example-email-input" placeholder="Email..">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12" for="example-password-input">Password</label>
                                            <div class="col-md-9">
                                                <input type="password" class="form-control" id="example-password-input" name="example-password-input" placeholder="Password..">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-alt-success">
                                                <i class="fa fa-check"></i> Submit
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- END Default Elements -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Pop In Modal Edit Admin -->
</div>
<!-- END Page Content -->
@endsection