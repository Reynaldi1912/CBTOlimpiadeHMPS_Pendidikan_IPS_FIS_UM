<!doctype html>
<html lang="en" class="no-focus">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Soal</title>

    <meta name="description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="Codebase">
    <meta property="og:description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="/codebase/media/favicons/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/codebase/media/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/codebase/media/favicons/apple-touch-icon-180x180.png">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="/codebase/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
    <link rel="stylesheet" href="/codebase/js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" href="/codebase/js/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/codebase/js/plugins/jquery-tags-input/jquery.tagsinput.min.css">
    <link rel="stylesheet" href="/codebase/js/plugins/jquery-auto-complete/jquery.auto-complete.min.css">
    <link rel="stylesheet" href="/codebase/js/plugins/ion-rangeslider/css/ion.rangeSlider.css">
    <link rel="stylesheet" href="/codebase/js/plugins/dropzonejs/dist/dropzone.css">
    <link rel="stylesheet" href="/codebase/js/plugins/flatpickr/flatpickr.min.css">
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="/codebase/js/plugins/slick/slick.css">
    <link rel="stylesheet" href="/codebase/js/plugins/slick/slick-theme.css">
    <link rel="stylesheet" href="/codebase/js/plugins/datatables/dataTables.bootstrap4.css">

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/index.global.min.js'></script>

    <!-- Fonts and Codebase framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700&display=swap">
    <link rel="stylesheet" id="css-main" href="/codebase/css/codebase.min.css">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="/codebase/css/themes/flat.min.css"> -->
    <!-- END Stylesheets -->
</head>
<body>
<!-- Page Content -->
<div class="content">
    <!-- Dynamic Table Full -->
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Jawaban <small>Peserta</small></h3>
            <input class="input-group-text min-min-width-20" type="text" readonly placeholder="80/100">
            <div class="container">
                <button type="button" class="btn btn-success min-width-125" data-toggle="modal" data-target="#edit-nilai" title="Edit">Rubah Nilai Peserta</button>
            </div>
            <a href="/hasil-ujian"><button type="button" class="btn btn-outline-danger min-width-125" data-toggle="click-ripple">Kembali</button></a>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 5%;">No.</th>
                        <th>Soal</th>
                        <th class="d-none d-sm-table-cell" style="width: 30%;">Jawaban</th>
                        <th class="d-none d-sm-table-cell" style="width: 10%;">Benar/Salah</th>
                        <th class="d-none d-sm-table-cell" style="width: 10%;">Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">1</td>
                        <td class="font-w600">Lori Grant</td>
                        <td class="d-none d-sm-table-cell">Pilihan Ganda</td>
                        <td class="d-none d-sm-table-cell">
                            <span class="badge badge-success">Benar</span>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <span class="badge badge-success">+2</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">2</td>
                        <td class="font-w600">Jose Mills</td>
                        <td class="d-none d-sm-table-cell">
                            <ul>
                                <li>Pilihan Ganda Kompleks 1</li>
                                <li>Pilihan Ganda Kompleks 1</li>
                                <li>Pilihan Ganda Kompleks 1</li>
                                <li>Pilihan Ganda Kompleks 1</li>
                            </ul>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <span class="badge badge-danger">Salah</span>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <span class="badge badge-danger">-1</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">3</td>
                        <td class="font-w600">Marie Duncan</td>
                        <td class="d-none d-sm-table-cell">
                            <ul>
                                <button class="btn btn-outline-primary min-width-125" disabled >1</button>
                                <button class="btn btn-outline-primary min-width-125" disabled >1</button>
                            </ul>
                            <ul>
                                <button class="btn btn-outline-secondary min-width-125" disabled >2</button>
                                <button class="btn btn-outline-secondary min-width-125" disabled >2</button>
                            </ul>
                            <ul>
                                <button class="btn btn-outline-success min-width-125" disabled >3</button>
                                <button class="btn btn-outline-success min-width-125" disabled >3</button>
                            </ul>
                            <ul>
                                <button class="btn btn-outline-info min-width-125" disabled >4</button>
                                <button class="btn btn-outline-info min-width-125" disabled >4</button>
                            </ul>
                            <ul>
                                <button class="btn btn-outline-warning min-width-125" disabled >5</button>
                                <button class="btn btn-outline-warning min-width-125" disabled >5</button>
                            </ul>
                            <ul>
                                <button class="btn btn-outline-danger min-width-125" disabled >6</button>
                                <button class="btn btn-outline-danger min-width-125" disabled >6</button>
                            </ul>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <span class="badge badge-danger">Salah</span>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <span class="badge badge-secondary">0</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">4</td>
                        <td class="font-w600">Brian Stevens</td>
                        <td class="d-none d-sm-table-cell">Uraian</td>
                        <td class="d-none d-sm-table-cell">
                            <span class="badge badge-success">Benar</span>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <span class="badge badge-success">+2</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- END Dynamic Table Full -->
</div>
<!-- END Page Content -->

<!-- Pop Out Modal -->
<div class="modal fade" id="edit-nilai" tabindex="-1" role="dialog" aria-labelledby="modal-popout" aria-hidden="true">
    <div class="modal-dialog modal-dialog-popout" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Masukkan Nilai</h3>
                </div>
                <div class="block-content">
                <form action="be_forms_elements_bootstrap.html" method="post" onsubmit="return false;">
                    <div class="form-group">
                        <label for="example-nf-email">Nilai</label>
                        <input type="value" class="form-control" id="example-nf-email" name="example-nf-email" placeholder="Masukkan Nilai.." require>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-alt-success" data-dismiss="modal">
                            <i class="fa fa-check"></i> Submit
                        </button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Pop Out Modal -->
</body>
</html>

<!-- END Main Container -->
<script src="/codebase/js/codebase.core.min.js"></script>
<script src="/codebase/js/codebase.app.min.js"></script>

<!-- Page JS Plugins -->
<script src="/codebase/js/plugins/chartjs/Chart.bundle.min.js"></script>

<!-- Page JS Code -->
<script src="/codebase/js/pages/be_pages_dashboard.min.js"></script>
<script src="/codebase/js/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/codebase/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<script src="/codebase/js/pages/be_tables_datatables.min.js"></script>

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
    integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="/codebase/js/plugins/pwstrength-bootstrap/pwstrength-bootstrap.min.js"></script>
<script src="/codebase/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="/codebase/js/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="/codebase/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
<script src="/codebase/js/plugins/select2/js/select2.full.min.js"></script>
<script src="/codebase/js/plugins/jquery-tags-input/jquery.tagsinput.min.js"></script>
<script src="/codebase/js/plugins/jquery-auto-complete/jquery.auto-complete.min.js"></script>
<script src="/codebase/js/plugins/masked-inputs/jquery.maskedinput.min.js"></script>
<script src="/codebase/js/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
<script src="/codebase/js/plugins/dropzonejs/dropzone.min.js"></script>
<script src="/codebase/js/plugins/flatpickr/flatpickr.min.js"></script>

<script src="/codebase/js/pages/be_forms_plugins.min.js"></script>

<script src="/codebase/js/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="/codebase/js/plugins/moment/moment.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>