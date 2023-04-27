<!doctype html>
<html lang="en" class="no-focus">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>Codebase - Bootstrap 4 Admin Template &amp; UI Framework</title>

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

        <!-- Page JS Plugins CSS -->
        <link rel="stylesheet" href="/codebase/js/plugins/summernote/summernote-bs4.css">
        <link rel="stylesheet" href="/codebase/js/plugins/simplemde/simplemde.min.css">

        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/index.global.min.js'></script>
        <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">

        <!-- Fonts and Codebase framework -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700&display=swap">
        <link rel="stylesheet" id="css-main" href="/codebase/css/codebase.min.css">

        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="/codebase/css/themes/flat.min.css"> -->
        <!-- END Stylesheets -->
    </head>
    <body>
        @include('flashmessage')
        <!-- Page Container -->
        <div id="page-container" class="sidebar-o sidebar-inverse enable-page-overlay side-scroll page-header-fixed page-header-modern main-content-boxed">
            <!-- Side Overlay-->
            <aside id="side-overlay">
                <!-- Side Header -->
                <div class="content-header content-header-fullrow">
                    <div class="content-header-section align-parent">
                        <!-- Close Side Overlay -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <button type="button" class="btn btn-circle btn-dual-secondary align-v-r" data-toggle="layout" data-action="side_overlay_close">
                            <i class="fa fa-times text-danger"></i>
                        </button>
                        <!-- END Close Side Overlay -->

                        <!-- User Info -->
                        <div class="content-header-item">
                            <a class="img-link mr-5" href="be_pages_generic_profile.html">
                                <img class="img-avatar img-avatar32" src="/codebase/media/avatars/avatar15.jpg" alt="">
                            </a>
                            <a class="align-middle link-effect text-primary-dark font-w600" href="be_pages_generic_profile.html">John Smith</a>
                        </div>
                        <!-- END User Info -->
                    </div>
                </div>
                <!-- END Side Header -->
            </aside>
            <!-- END Side Overlay -->
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            @include('layouts.sidebar')
            @include('layouts.header')
            @include('layouts.footer')
            @yield('content')

            

            
        </div>
        <!-- END Page Container -->

        <!--
            Codebase JS Core

            Vital libraries and plugins used in all pages. You can choose to not include this file if you would like
            to handle those dependencies through webpack. Please check out /codebase/_es6/main/bootstrap.js for more info.

            If you like, you could also include them separately directly from the /codebase/js/core folder in the following
            order. That can come in handy if you would like to include a few of them (eg jQuery) from a CDN.

            /codebase/js/core/jquery.min.js
            /codebase/js/core/bootstrap.bundle.min.js
            /codebase/js/core/simplebar.min.js
            /codebase/js/core/jquery-scrollLock.min.js
            /codebase/js/core/jquery.appear.min.js
            /codebase/js/core/jquery.countTo.min.js
            /codebase/js/core/js.cookie.min.js
        -->
        <script src="/codebase/js/codebase.core.min.js"></script>

        <!--
            Codebase JS

            Custom functionality including Blocks/Layout API as well as other vital and optional helpers
            webpack is putting everything together at /codebase/_es6/main/app.js
        -->
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

        <script src="/codebase/js/plugins/summernote/summernote-bs4.min.js"></script>
        <script src="/codebase/js/plugins/ckeditor/ckeditor.js"></script>
        <script src="/codebase/js/plugins/simplemde/simplemde.min.js"></script>
        
        <script src="/codebase/js/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="/codebase/js/plugins/moment/moment.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
        <script>jQuery(function(){ Codebase.helpers(['summernote', 'ckeditor', 'simplemde']); });</script>

        <script type="text/javascript">
 
            $('.show_confirm_delete').click(function(event) {
                var form =  $(this).closest("form");
                var name = $(this).data("name");
                event.preventDefault();
                swal({
                    title: `Apakah anda yakin ingin menghapus data ini ?`,
                    text: "Data yang sudah dihapus tidak bisa dikembalikan",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                    form.submit();
                    }
                });
            });

            $('.show_confirm_simpan').click(function(event) {
                var form =  $(this).closest("form");
                var name = $(this).data("name");
                event.preventDefault();
                swal({
                    title: `Apakah anda yakin ingin menyimpan data ini ?`,
                    text: "",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                    form.submit();
                    }
                });
            });
            $('.show_confirm_simpan_ujian').click(function(event) {
                var form =  $(this).closest("form");
                var name = $(this).data("name");
                event.preventDefault();
                swal({
                    title: `Apakah anda yakin ingin Menyelesaikan Ujian ini ?`,
                    text: "",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                    form.submit();
                    }
                });
            });

        </script>
        <script>jQuery(function(){ Codebase.helpers(['flatpickr', 'datepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider', 'tags-inputs']); });</script>

    </body>
</html>