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
            <div class="row">
                <div class="col">
                    <h3 class="block-title"><small>Nilai Otomatis</small></h3>
                    <input class="form-control" type="text" readonly placeholder="{{$nilai_sementara->nilai}} | {{$nilai_sementara->total_nilai}}">
                </div>
                <div class="col">
                    <h3 class="block-title"><small>Nilai Akhir</small></h3>
                    <input class="form-control" type="text" readonly placeholder="{{$nilai_akhir ? $nilai_akhir->nilai_akhir : 0}}">
                </div>
                <div class="col">
                    <h3 class="block-title"></h3>
                    <button type="button" class="btn btn-success min-width-125" data-toggle="modal" data-target="#edit-nilai" title="Edit">Rubah Nilai Peserta</button>
                </div>
            </div>
            
            <a href="/hasil-ujian"><button type="button" class="btn btn-outline-danger min-width-125" data-toggle="click-ripple">Kembali</button></a>
        </div>
        <div class="block-content block-content-full">
            <h4><small><span class="text-uppercase">{{$user->name}}</span></small></h4>
            <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                <thead>
                    <tr>
                        <th class="text-center">No.</th>
                        <th style="width: 20%;">Soal</th>
                        <th>Type</th>
                        <th class="d-none d-sm-table-cell" style="width: 30%;">Option</th>
                        <th class="d-none d-sm-table-cell" style="width: 30%;">Jawaban</th>
                        <th class="d-none d-sm-table-cell">Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 1;
                    ?>
                @foreach($soal as $soal)
                    <tr>
                        <td class="text-center">{{$i++}}</td>
                        <td class="font-w600">
                            <?php
                                echo $soal->question
                            ?>
                        </td>
                        <td>{{$soal->question_type}}</td>
                        <td class="d-none d-sm-table-cell">
                            <ul>
                            @php
                                $alreadyDisplayed = array();
                            @endphp
                            @foreach($option->where('exam_question_id' , $soal->id_question) as $option_answer)
                                @if (!in_array($option_answer->exam_question_id, $alreadyDisplayed))
                                    @if($option_answer->question_type == 'matching')
                                        @foreach($option_matching->where('exam_question_id' , $soal->id_question) as $matching_ops)
                                            <div class="row text-success">
                                                <div class="col">
                                                @php
                                                    echo $matching_ops->option_text_left;
                                                @endphp
                                                </div>
                                                /
                                                <div class="col">
                                                @php
                                                    echo $matching_ops->option_text;
                                                @endphp
                                                </div>
                                            </div>
                                            <hr>
                                        @endforeach
                                        @php
                                            $alreadyDisplayed[] = $option_answer->exam_question_id;
                                        @endphp
                                    @else
                                        @if($option_answer->value == 1)
                                            <li class="text-success font-weight-bold">
                                                    <?php
                                                        echo $option_answer->option_text
                                                    ?>
                                            </li>
                                        @elseif($option_answer->value == 0)
                                            <li>
                                                <?php
                                                    echo $option_answer->option_text
                                                ?>
                                            </li>
                                        @endif
                                    @endif
                                @endif
                            @endforeach
                            </ul>
                        </td>
                        <td class="d-none d-sm-table-cell">
                        @foreach($jawaban->where('id_exam_question',$soal->id_question) as $item)
                            @if($item->answer_question_option_id == null && $item->answer_right_option_id == null && $item->answer_desc !=null)
                                {{$item->answer_desc}}
                            @elseif($item->answer_question_option_id != null && $item->answer_right_option_id == null && $item->answer_desc ==null)
                            <ul>
                                <li>
                                    <?php
                                        echo $item->option_text_answer
                                    ?>
                                </li>
                            </ul>
                            @elseif($item->answer_question_option_id != null && $item->answer_right_option_id != null && $item->answer_desc ==null)
                                <div class="row p-5">
                                    <div class="col">
                                        <?php
                                            echo $item->option_text_answer;
                                        ?>
                                    </div>
                                    /
                                    <div class="col">
                                        <?php
                                            echo $item->option_text_right_answer ;
                                        ?>
                                    </div>
                                </div>
                                <hr>
                            @endif
                        @endforeach
                        </td>
                        <td class="d-none d-sm-table-cell">
                            @if($soal->question_type == 'long_desc' || $soal->question_type == 'short_desc')
                            @else
                                @if(count($nilai->where('id_question', $soal->id_question)) == 0)
                                    <span class="badge badge-warning">
                                        0.0
                                    </span>
                                @else
                                    @foreach($nilai->where('id_question', $soal->id_question) as $nl)
                                        @if($nl->nilai <= 0)
                                        <span class="badge badge-danger">
                                            {{$nl->nilai}}
                                        </span>
                                        @else
                                            <span class="badge badge-success">
                                                {{$nl->nilai}}
                                            </span>
                                        @endif
                                    @endforeach
                                @endif
                            @endif
                        </td>
                    </tr>
                    @endforeach
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
                <form action="{{route('ujianAdmin.input_nilai_akhir')}}" method="post" >
                    @csrf
                    <div class="form-group">
                        <label for="example-nf-email">Nilai</label>
                        <input type="hidden" value="{{$nilai_sementara->id_user}}" name="id_user">
                        <input type="hidden" value="{{$nilai_sementara->exam_id}}" name="exam_id">
                        <input type="hidden" value="{{$nilai_sementara->total_nilai}}" name="total_nilai">
                        <input type="value" class="form-control" id="nilai_akhir" value="{{$nilai_sementara->nilai}}" name="nilai" placeholder="Masukkan Nilai.." required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-alt-success">
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