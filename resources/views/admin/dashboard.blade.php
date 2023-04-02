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

        <!-- Fonts and Codebase framework -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700&display=swap">
        <link rel="stylesheet" id="css-main" href="/codebase/css/codebase.min.css">

        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="/codebase/css/themes/flat.min.css"> -->
        <!-- END Stylesheets -->
    </head>
    <body>

        <!-- Page Container -->
        <!--
            Available classes for #page-container:

        GENERIC

            'enable-cookies'                            Remembers active color theme between pages (when set through color theme helper Template._uiHandleTheme())

        SIDEBAR & SIDE OVERLAY

            'sidebar-r'                                 Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
            'sidebar-mini'                              Mini hoverable Sidebar (screen width > 991px)
            'sidebar-o'                                 Visible Sidebar by default (screen width > 991px)
            'sidebar-o-xs'                              Visible Sidebar by default (screen width < 992px)
            'sidebar-inverse'                           Dark themed sidebar

            'side-overlay-hover'                        Hoverable Side Overlay (screen width > 991px)
            'side-overlay-o'                            Visible Side Overlay by default

            'enable-page-overlay'                       Enables a visible clickable Page Overlay (closes Side Overlay on click) when Side Overlay opens

            'side-scroll'                               Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)

        HEADER

            ''                                          Static Header if no class is added
            'page-header-fixed'                         Fixed Header

        HEADER STYLE

            ''                                          Classic Header style if no class is added
            'page-header-modern'                        Modern Header style
            'page-header-inverse'                       Dark themed Header (works only with classic Header style)
            'page-header-glass'                         Light themed Header with transparency by default
                                                        (absolute position, perfect for light images underneath - solid light background on scroll if the Header is also set as fixed)
            'page-header-glass page-header-inverse'     Dark themed Header with transparency by default
                                                        (absolute position, perfect for dark images underneath - solid dark background on scroll if the Header is also set as fixed)

        MAIN CONTENT LAYOUT

            ''                                          Full width Main Content if no class is added
            'main-content-boxed'                        Full width Main Content with a specific maximum width (screen width > 1200px)
            'main-content-narrow'                       Full width Main Content with a percentage width (screen width > 1200px)
        -->
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

            <!-- Sidebar -->
            <!--
                Helper classes

                Adding .sidebar-mini-hide to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
                Adding .sidebar-mini-show to an element will make it visible (opacity: 1) when the sidebar is in mini mode
                    If you would like to disable the transition, just add the .sidebar-mini-notrans along with one of the previous 2 classes

                Adding .sidebar-mini-hidden to an element will hide it when the sidebar is in mini mode
                Adding .sidebar-mini-visible to an element will show it only when the sidebar is in mini mode
                    - use .sidebar-mini-visible-b if you would like to be a block when visible (display: block)
            -->
            <nav id="sidebar">
                @include('include.masterAdmin')
            </nav>

            <!-- Main Container -->
            <main id="main-container">

                <!-- Page Content -->
                <div class="content">
                    <div class="row invisible" data-toggle="appear">
                        <!-- Row #1 -->
                        <div class="col-6 col-xl-3">
                            <a class="block block-rounded block-bordered block-link-shadow" href="javascript:void(0)">
                                <div class="block-content block-content-full clearfix">
                                    <div class="float-right mt-15 d-none d-sm-block">
                                        <i class="si si-bag fa-2x text-primary-light"></i>
                                    </div>
                                    <div class="font-size-h3 font-w600 text-primary" data-toggle="countTo" data-speed="1000" data-to="1500">0</div>
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Sales</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-xl-3">
                            <a class="block block-rounded block-bordered block-link-shadow" href="javascript:void(0)">
                                <div class="block-content block-content-full clearfix">
                                    <div class="float-right mt-15 d-none d-sm-block">
                                        <i class="si si-wallet fa-2x text-earth-light"></i>
                                    </div>
                                    <div class="font-size-h3 font-w600 text-earth">$<span data-toggle="countTo" data-speed="1000" data-to="780">0</span></div>
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Earnings</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-xl-3">
                            <a class="block block-rounded block-bordered block-link-shadow" href="javascript:void(0)">
                                <div class="block-content block-content-full clearfix">
                                    <div class="float-right mt-15 d-none d-sm-block">
                                        <i class="si si-envelope-open fa-2x text-elegance-light"></i>
                                    </div>
                                    <div class="font-size-h3 font-w600 text-elegance" data-toggle="countTo" data-speed="1000" data-to="15">0</div>
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Messages</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-xl-3">
                            <a class="block block-rounded block-bordered block-link-shadow" href="javascript:void(0)">
                                <div class="block-content block-content-full clearfix">
                                    <div class="float-right mt-15 d-none d-sm-block">
                                        <i class="si si-users fa-2x text-pulse"></i>
                                    </div>
                                    <div class="font-size-h3 font-w600 text-pulse" data-toggle="countTo" data-speed="1000" data-to="4252">0</div>
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Online</div>
                                </div>
                            </a>
                        </div>
                        <!-- END Row #1 -->
                    </div>
                    <div class="row invisible" data-toggle="appear">
                        <!-- Row #2 -->
                        <div class="col-md-6">
                            <div class="block block-rounded block-bordered">
                                <div class="block-header block-header-default border-b">
                                    <h3 class="block-title">
                                        Sales <small>This week</small>
                                    </h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                            <i class="si si-refresh"></i>
                                        </button>
                                        <button type="button" class="btn-block-option">
                                            <i class="si si-wrench"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="block-content block-content-full">
                                    <div class="pull-all pt-50">
                                        <!-- Lines Chart Container functionality is initialized in js/pages/be_pages_dashboard.min.js which was auto compiled from _es6/pages/be_pages_dashboard.js -->
                                        <!-- For more info and examples you can check out http://www.chartjs.org/docs/ -->
                                        <canvas class="js-chartjs-dashboard-lines"></canvas>
                                    </div>
                                </div>
                                <div class="block-content">
                                    <div class="row items-push text-center">
                                        <div class="col-6 col-sm-4">
                                            <div class="font-w600 text-success">
                                                <i class="fa fa-caret-up"></i> +16%
                                            </div>
                                            <div class="font-size-h4 font-w600">720</div>
                                            <div class="font-size-sm font-w600 text-uppercase text-muted">This Month</div>
                                        </div>
                                        <div class="col-6 col-sm-4">
                                            <div class="font-w600 text-danger">
                                                <i class="fa fa-caret-down"></i> -3%
                                            </div>
                                            <div class="font-size-h4 font-w600">160</div>
                                            <div class="font-size-sm font-w600 text-uppercase text-muted">This Week</div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="font-w600 text-success">
                                                <i class="fa fa-caret-up"></i> +9%
                                            </div>
                                            <div class="font-size-h4 font-w600">24.3</div>
                                            <div class="font-size-sm font-w600 text-uppercase text-muted">Average</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="block block-rounded block-bordered">
                                <div class="block-header block-header-default border-b">
                                    <h3 class="block-title">
                                        Earnings <small>This week</small>
                                    </h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                            <i class="si si-refresh"></i>
                                        </button>
                                        <button type="button" class="btn-block-option">
                                            <i class="si si-wrench"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="block-content block-content-full">
                                    <div class="pull-all pt-50">
                                        <!-- Lines Chart Container functionality is initialized in js/pages/be_pages_dashboard.min.js which was auto compiled from _es6/pages/be_pages_dashboard.js -->
                                        <!-- For more info and examples you can check out http://www.chartjs.org/docs/ -->
                                        <canvas class="js-chartjs-dashboard-lines2"></canvas>
                                    </div>
                                </div>
                                <div class="block-content bg-white">
                                    <div class="row items-push text-center">
                                        <div class="col-6 col-sm-4">
                                            <div class="font-w600 text-success">
                                                <i class="fa fa-caret-up"></i> +4%
                                            </div>
                                            <div class="font-size-h4 font-w600">$ 6,540</div>
                                            <div class="font-size-sm font-w600 text-uppercase text-muted">This Month</div>
                                        </div>
                                        <div class="col-6 col-sm-4">
                                            <div class="font-w600 text-danger">
                                                <i class="fa fa-caret-down"></i> -7%
                                            </div>
                                            <div class="font-size-h4 font-w600">$ 1,525</div>
                                            <div class="font-size-sm font-w600 text-uppercase text-muted">This Week</div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="font-w600 text-success">
                                                <i class="fa fa-caret-up"></i> +35%
                                            </div>
                                            <div class="font-size-h4 font-w600">$ 9,352</div>
                                            <div class="font-size-sm font-w600 text-uppercase text-muted">Balance</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Row #2 -->
                    </div>
                    <div class="row invisible" data-toggle="appear">
                        <!-- Row #3 -->
                        <div class="col-md-6">
                            <div class="block block-rounded block-bordered">
                                <div class="block-header block-header-default border-b">
                                    <h3 class="block-title">Latest Orders</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                            <i class="si si-refresh"></i>
                                        </button>
                                        <button type="button" class="btn-block-option">
                                            <i class="si si-wrench"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="block-content">
                                    <table class="table table-borderless table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 100px;">ID</th>
                                                <th>Status</th>
                                                <th class="d-none d-sm-table-cell">Customer</th>
                                                <th class="text-right">Value</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <a class="font-w600" href="be_pages_ecom_order.html">ORD.1851</a>
                                                </td>
                                                <td>
                                                    <span class="badge badge-info">Processing</span>
                                                </td>
                                                <td class="d-none d-sm-table-cell">
                                                    <a href="be_pages_ecom_customer.html">Carol Ray</a>
                                                </td>
                                                <td class="text-right">
                                                    <span class="text-black">$584</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a class="font-w600" href="be_pages_ecom_order.html">ORD.1850</a>
                                                </td>
                                                <td>
                                                    <span class="badge badge-danger">Canceled</span>
                                                </td>
                                                <td class="d-none d-sm-table-cell">
                                                    <a href="be_pages_ecom_customer.html">Marie Duncan</a>
                                                </td>
                                                <td class="text-right">
                                                    <span class="text-black">$383</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a class="font-w600" href="be_pages_ecom_order.html">ORD.1849</a>
                                                </td>
                                                <td>
                                                    <span class="badge badge-danger">Canceled</span>
                                                </td>
                                                <td class="d-none d-sm-table-cell">
                                                    <a href="be_pages_ecom_customer.html">Scott Young</a>
                                                </td>
                                                <td class="text-right">
                                                    <span class="text-black">$335</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a class="font-w600" href="be_pages_ecom_order.html">ORD.1848</a>
                                                </td>
                                                <td>
                                                    <span class="badge badge-info">Processing</span>
                                                </td>
                                                <td class="d-none d-sm-table-cell">
                                                    <a href="be_pages_ecom_customer.html">Justin Hunt</a>
                                                </td>
                                                <td class="text-right">
                                                    <span class="text-black">$840</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a class="font-w600" href="be_pages_ecom_order.html">ORD.1847</a>
                                                </td>
                                                <td>
                                                    <span class="badge badge-success">Completed</span>
                                                </td>
                                                <td class="d-none d-sm-table-cell">
                                                    <a href="be_pages_ecom_customer.html">Thomas Riley</a>
                                                </td>
                                                <td class="text-right">
                                                    <span class="text-black">$434</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a class="font-w600" href="be_pages_ecom_order.html">ORD.1846</a>
                                                </td>
                                                <td>
                                                    <span class="badge badge-info">Processing</span>
                                                </td>
                                                <td class="d-none d-sm-table-cell">
                                                    <a href="be_pages_ecom_customer.html">Carol White</a>
                                                </td>
                                                <td class="text-right">
                                                    <span class="text-black">$142</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a class="font-w600" href="be_pages_ecom_order.html">ORD.1845</a>
                                                </td>
                                                <td>
                                                    <span class="badge badge-danger">Canceled</span>
                                                </td>
                                                <td class="d-none d-sm-table-cell">
                                                    <a href="be_pages_ecom_customer.html">Melissa Rice</a>
                                                </td>
                                                <td class="text-right">
                                                    <span class="text-black">$116</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a class="font-w600" href="be_pages_ecom_order.html">ORD.1844</a>
                                                </td>
                                                <td>
                                                    <span class="badge badge-warning">Pending</span>
                                                </td>
                                                <td class="d-none d-sm-table-cell">
                                                    <a href="be_pages_ecom_customer.html">Wayne Garcia</a>
                                                </td>
                                                <td class="text-right">
                                                    <span class="text-black">$317</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a class="font-w600" href="be_pages_ecom_order.html">ORD.1843</a>
                                                </td>
                                                <td>
                                                    <span class="badge badge-info">Processing</span>
                                                </td>
                                                <td class="d-none d-sm-table-cell">
                                                    <a href="be_pages_ecom_customer.html">Barbara Scott</a>
                                                </td>
                                                <td class="text-right">
                                                    <span class="text-black">$256</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a class="font-w600" href="be_pages_ecom_order.html">ORD.1842</a>
                                                </td>
                                                <td>
                                                    <span class="badge badge-warning">Pending</span>
                                                </td>
                                                <td class="d-none d-sm-table-cell">
                                                    <a href="be_pages_ecom_customer.html">Brian Cruz</a>
                                                </td>
                                                <td class="text-right">
                                                    <span class="text-black">$568</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="block block-rounded block-bordered">
                                <div class="block-header block-header-default border-b">
                                    <h3 class="block-title">Top Products</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                            <i class="si si-refresh"></i>
                                        </button>
                                        <button type="button" class="btn-block-option">
                                            <i class="si si-wrench"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="block-content">
                                    <table class="table table-borderless table-striped">
                                        <thead>
                                            <tr>
                                                <th class="d-none d-sm-table-cell" style="width: 100px;">ID</th>
                                                <th>Product</th>
                                                <th class="text-center">Orders</th>
                                                <th class="d-none d-sm-table-cell text-center">Rating</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="d-none d-sm-table-cell">
                                                    <a class="font-w600" href="be_pages_ecom_product_edit.html">PID.258</a>
                                                </td>
                                                <td>
                                                    <a href="be_pages_ecom_product_edit.html">Dark Souls III</a>
                                                </td>
                                                <td class="text-center">
                                                    <a class="text-gray-dark" href="be_pages_ecom_orders.html">912</a>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-center">
                                                    <div class="text-warning">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="d-none d-sm-table-cell">
                                                    <a class="font-w600" href="be_pages_ecom_product_edit.html">PID.198</a>
                                                </td>
                                                <td>
                                                    <a href="be_pages_ecom_product_edit.html">Bioshock Collection</a>
                                                </td>
                                                <td class="text-center">
                                                    <a class="text-gray-dark" href="be_pages_ecom_orders.html">895</a>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-center">
                                                    <div class="text-warning">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="d-none d-sm-table-cell">
                                                    <a class="font-w600" href="be_pages_ecom_product_edit.html">PID.852</a>
                                                </td>
                                                <td>
                                                    <a href="be_pages_ecom_product_edit.html">Alien Isolation</a>
                                                </td>
                                                <td class="text-center">
                                                    <a class="text-gray-dark" href="be_pages_ecom_orders.html">820</a>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-center">
                                                    <div class="text-warning">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="d-none d-sm-table-cell">
                                                    <a class="font-w600" href="be_pages_ecom_product_edit.html">PID.741</a>
                                                </td>
                                                <td>
                                                    <a href="be_pages_ecom_product_edit.html">Bloodborne</a>
                                                </td>
                                                <td class="text-center">
                                                    <a class="text-gray-dark" href="be_pages_ecom_orders.html">793</a>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-center">
                                                    <div class="text-warning">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="d-none d-sm-table-cell">
                                                    <a class="font-w600" href="be_pages_ecom_product_edit.html">PID.985</a>
                                                </td>
                                                <td>
                                                    <a href="be_pages_ecom_product_edit.html">Forza Motorsport 7</a>
                                                </td>
                                                <td class="text-center">
                                                    <a class="text-gray-dark" href="be_pages_ecom_orders.html">782</a>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-center">
                                                    <div class="text-warning">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="d-none d-sm-table-cell">
                                                    <a class="font-w600" href="be_pages_ecom_product_edit.html">PID.056</a>
                                                </td>
                                                <td>
                                                    <a href="be_pages_ecom_product_edit.html">Fifa 18</a>
                                                </td>
                                                <td class="text-center">
                                                    <a class="text-gray-dark" href="be_pages_ecom_orders.html">776</a>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-center">
                                                    <div class="text-warning">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="d-none d-sm-table-cell">
                                                    <a class="font-w600" href="be_pages_ecom_product_edit.html">PID.036</a>
                                                </td>
                                                <td>
                                                    <a href="be_pages_ecom_product_edit.html">Gears of War 4</a>
                                                </td>
                                                <td class="text-center">
                                                    <a class="text-gray-dark" href="be_pages_ecom_orders.html">680</a>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-center">
                                                    <div class="text-warning">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="d-none d-sm-table-cell">
                                                    <a class="font-w600" href="be_pages_ecom_product_edit.html">PID.682</a>
                                                </td>
                                                <td>
                                                    <a href="be_pages_ecom_product_edit.html">Minecraft</a>
                                                </td>
                                                <td class="text-center">
                                                    <a class="text-gray-dark" href="be_pages_ecom_orders.html">670</a>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-center">
                                                    <div class="text-warning">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="d-none d-sm-table-cell">
                                                    <a class="font-w600" href="be_pages_ecom_product_edit.html">PID.478</a>
                                                </td>
                                                <td>
                                                    <a href="be_pages_ecom_product_edit.html">Dishonored 2</a>
                                                </td>
                                                <td class="text-center">
                                                    <a class="text-gray-dark" href="be_pages_ecom_orders.html">640</a>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-center">
                                                    <div class="text-warning">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="d-none d-sm-table-cell">
                                                    <a class="font-w600" href="be_pages_ecom_product_edit.html">PID.952</a>
                                                </td>
                                                <td>
                                                    <a href="be_pages_ecom_product_edit.html">Gran Turismo Sport</a>
                                                </td>
                                                <td class="text-center">
                                                    <a class="text-gray-dark" href="be_pages_ecom_orders.html">630</a>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-center">
                                                    <div class="text-warning">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- END Row #3 -->
                    </div>
                </div>
                <!-- END Page Content -->

            </main>
            <!-- END Main Container -->

            <!-- Footer -->
            <footer id="page-footer" class="opacity-0">
                <div class="content py-20 font-size-sm clearfix">
                    <div class="float-right">
                        Crafted with <i class="fa fa-heart text-pulse"></i> by <a class="font-w600" href="https://1.envato.market/ydb" target="_blank">pixelcave</a>
                    </div>
                    <div class="float-left">
                        <a class="font-w600" href="https://1.envato.market/95j" target="_blank">Codebase 3.3</a> &copy; <span class="js-year-copy"></span>
                    </div>
                </div>
            </footer>
            <!-- END Footer -->
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
    </body>
</html>