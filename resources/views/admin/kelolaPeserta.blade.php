@extends('layout.master')

@section('content')
<!-- Page Content -->
<div class="content">
    <h2 class="content-heading">Kelola Peserta</h2>
    <!-- Full Table -->
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Daftar Peserta</h3>
            <button type="button" class="btn btn-success min-width-125" data-toggle="modal" data-target="#tambah-peserta">Tambah Peserta</button>
        </div>
        <div class="block-content">
            <div class="table-responsive">
                <table class="table table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 100px;"><i class="si si-user"></i></th>
                            <th>Name</th>
                            <th style="width: 30%;">Email</th>
                            <th style="width: 15%;">Access</th>
                            <th class="text-center" style="width: 100px;">Actions</th>
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
                                <span class="badge badge-info">Business</span>
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
                                <img class="img-avatar img-avatar48" src="/codebase/media/avatars/avatar11.jpg" alt="">
                            </td>
                            <td class="font-w600">Scott Young</td>
                            <td>customer2@example.com</td>
                            <td>
                                <span class="badge badge-primary">Personal</span>
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
                                <span class="badge badge-info">Business</span>
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
                                <img class="img-avatar img-avatar48" src="/codebase/media/avatars/avatar15.jpg" alt="">
                            </td>
                            <td class="font-w600">Thomas Riley</td>
                            <td>customer4@example.com</td>
                            <td>
                                <span class="badge badge-danger">Disabled</span>
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
                                <img class="img-avatar img-avatar48" src="/codebase/media/avatars/avatar11.jpg" alt="">
                            </td>
                            <td class="font-w600">Henry Harrison</td>
                            <td>customer5@example.com</td>
                            <td>
                                <span class="badge badge-info">Business</span>
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

    <!-- Pop Out Modal -->
    <div class="modal fade" id="tambah-peserta" tabindex="-1" role="dialog" aria-labelledby="modal-popout" aria-hidden="true">
            <div class="modal-dialog modal-dialog-popout" role="document">
                <div class="modal-content">
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
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Default Elements</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option">
                                            <i class="si si-wrench"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="block-content">
                                    <form action="be_forms_elements_bootstrap.html" method="post" enctype="multipart/form-data" onsubmit="return false;">
                                        <div class="form-group row">
                                            <label class="col-12">Static</label>
                                            <div class="col-md-9">
                                                <div class="form-control-plaintext">Username</div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12" for="example-text-input">Text</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="example-text-input" name="example-text-input" placeholder="Text..">
                                                <div class="form-text text-muted">Further info about this input</div>
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
                                        <div class="form-group row">
                                            <label class="col-12" for="example-text-input-valid">Valid State</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control is-valid" id="example-text-input-valid" name="example-text-input-valid" placeholder="Valid State..">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12" for="example-text-input-invalid">Invalid State</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control is-invalid" id="example-text-input-invalid" name="example-text-input-invalid" placeholder="Invalid State..">
                                                <div class="invalid-feedback">Invalid feedback</div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12" for="example-disabled-input">Disabled</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="example-disabled-input" name="example-disabled-input" placeholder="Disabled.." disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12" for="example-textarea-input">Textarea</label>
                                            <div class="col-12">
                                                <textarea class="form-control" id="example-textarea-input" name="example-textarea-input" rows="6" placeholder="Content.."></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12" for="example-select">Select</label>
                                            <div class="col-md-9">
                                                <select class="form-control" id="example-select" name="example-select">
                                                    <option value="0">Please select</option>
                                                    <option value="1">Option #1</option>
                                                    <option value="2">Option #2</option>
                                                    <option value="3">Option #3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12" for="example-multiple-select">Multiple Select</label>
                                            <div class="col-md-9">
                                                <select class="form-control" id="example-multiple-select" name="example-multiple-select" size="7" multiple>
                                                    <option value="1">Option #1</option>
                                                    <option value="2">Option #2</option>
                                                    <option value="3">Option #3</option>
                                                    <option value="4">Option #4</option>
                                                    <option value="5">Option #5</option>
                                                    <option value="6">Option #6</option>
                                                    <option value="7">Option #7</option>
                                                    <option value="8">Option #8</option>
                                                    <option value="9">Option #9</option>
                                                    <option value="10">Option #10</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12">Radios</label>
                                            <div class="col-12">
                                                <div class="custom-control custom-radio mb-5">
                                                    <input class="custom-control-input" type="radio" name="example-radios" id="example-radio1" value="option1" checked>
                                                    <label class="custom-control-label" for="example-radio1">Option 1</label>
                                                </div>
                                                <div class="custom-control custom-radio mb-5">
                                                    <input class="custom-control-input" type="radio" name="example-radios" id="example-radio2" value="option2">
                                                    <label class="custom-control-label" for="example-radio2">Option 2</label>
                                                </div>
                                                <div class="custom-control custom-radio mb-5">
                                                    <input class="custom-control-input" type="radio" name="example-radios" id="example-radio3" value="option3">
                                                    <label class="custom-control-label" for="example-radio3">Option 3</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12">Inline Radios</label>
                                            <div class="col-12">
                                                <div class="custom-control custom-radio custom-control-inline mb-5">
                                                    <input class="custom-control-input" type="radio" name="example-inline-radios" id="example-inline-radio1" value="option1" checked>
                                                    <label class="custom-control-label" for="example-inline-radio1">Option 1</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline mb-5">
                                                    <input class="custom-control-input" type="radio" name="example-inline-radios" id="example-inline-radio2" value="option2">
                                                    <label class="custom-control-label" for="example-inline-radio2">Option 2</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline mb-5">
                                                    <input class="custom-control-input" type="radio" name="example-inline-radios" id="example-inline-radio3" value="option3">
                                                    <label class="custom-control-label" for="example-inline-radio3">Option 3</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12">Checkboxes</label>
                                            <div class="col-12">
                                                <div class="custom-control custom-checkbox mb-5">
                                                    <input class="custom-control-input" type="checkbox" name="example-checkbox1" id="example-checkbox1" value="option1" checked>
                                                    <label class="custom-control-label" for="example-checkbox1">Option 1</label>
                                                </div>
                                                <div class="custom-control custom-checkbox mb-5">
                                                    <input class="custom-control-input" type="checkbox" name="example-checkbox2" id="example-checkbox2" value="option2">
                                                    <label class="custom-control-label" for="example-checkbox2">Option 2</label>
                                                </div>
                                                <div class="custom-control custom-checkbox mb-5">
                                                    <input class="custom-control-input" type="checkbox" name="example-checkbox3" id="example-checkbox3" value="option3">
                                                    <label class="custom-control-label" for="example-checkbox3">Option 3</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12">Inline Checkboxes</label>
                                            <div class="col-12">
                                                <div class="custom-control custom-checkbox custom-control-inline mb-5">
                                                    <input class="custom-control-input" type="checkbox" name="example-inline-checkbox1" id="example-inline-checkbox1" value="option1" checked>
                                                    <label class="custom-control-label" for="example-inline-checkbox1">Option 1</label>
                                                </div>
                                                <div class="custom-control custom-checkbox custom-control-inline mb-5">
                                                    <input class="custom-control-input" type="checkbox" name="example-inline-checkbox2" id="example-inline-checkbox2" value="option2">
                                                    <label class="custom-control-label" for="example-inline-checkbox2">Option 2</label>
                                                </div>
                                                <div class="custom-control custom-checkbox custom-control-inline mb-5">
                                                    <input class="custom-control-input" type="checkbox" name="example-inline-checkbox3" id="example-inline-checkbox3" value="option3">
                                                    <label class="custom-control-label" for="example-inline-checkbox3">Option 3</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12" for="example-file-input">File Input</label>
                                            <div class="col-12">
                                                <input type="file" id="example-file-input" name="example-file-input">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12" for="example-file-multiple-input">File Input (Multiple)</label>
                                            <div class="col-12">
                                                <input type="file" id="example-file-multiple-input" name="example-file-multiple-input" multiple>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12">Bootstrap's Custom File Input</label>
                                            <div class="col-8">
                                                <div class="custom-file">
                                                    <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                                    <input type="file" class="custom-file-input" id="example-file-input-custom" name="example-file-input-custom" data-toggle="custom-file-input">
                                                    <label class="custom-file-label" for="example-file-input-custom">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12">Bootstrap's Custom File Input (Multiple)</label>
                                            <div class="col-8">
                                                <div class="custom-file">
                                                    <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                                    <!-- When multiple files are selected, we use the word 'Files'. You can easily change it to your own language by adding the following to the input, eg for DE: data-lang-files="Dateien" -->
                                                    <input type="file" class="custom-file-input" id="example-file-multiple-input-custom" name="example-file-multiple-input-custom" data-toggle="custom-file-input" multiple>
                                                    <label class="custom-file-label" for="example-file-multiple-input-custom">Choose files</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-alt-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- END Default Elements -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-alt-success" data-dismiss="modal">
                            <i class="fa fa-check"></i> Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Pop Out Modal -->
</div>
<!-- END Page Content -->
@endsection