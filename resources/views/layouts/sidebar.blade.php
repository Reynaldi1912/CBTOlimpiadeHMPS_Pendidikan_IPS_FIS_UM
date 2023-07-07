<nav id="sidebar">
    <!-- Sidebar Content -->
    <div class="sidebar-content">
        <!-- Side Header -->
        <div class="content-header content-header-fullrow px-15">
            <!-- Mini Mode -->
            <div class="content-header-section sidebar-mini-visible-b">
                <!-- Logo -->
                <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                    <span class="text-dual-primary-dark">c</span><span class="text-primary">b</span>
                </span>
                <!-- END Logo -->
            </div>
            <!-- END Mini Mode -->

            <!-- Normal Mode -->
            <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                <!-- Close Sidebar, Visible only on mobile screens -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                    <i class="fa fa-times text-danger"></i>
                </button>
                <!-- END Close Sidebar -->

                <!-- Side User -->
                @if(Auth::user()->role=='admin')
                <div class="content-header-item">
                    <span class="font-size-xl text-dual-primary-dark">HMPS</span>
                    <a class="link-effect font-w700" style="cursor: context-menu;">
                        <span class="font-size-xl text-primary"> PIPS</span>
                    </a>
                </div>
                @elseif(Auth::user()->role=='peserta')
                <div class="content-header-item">
                    <!-- <img class="sidebarIconPeserta" src="/img/Logo-HMP-300x300.png" alt=""> -->
                    <span class="font-size-xl text-dual-primary-dark">Hai...</span>
                    <a href="{{ url('/profilPeserta') }}" class="link-effect font-w700" style="cursor: context-menu;">
                        <span class="font-size-xl text-primary"> {{ Auth::user()->username }}</span>
                    </a>
                </div>
                @endif
                <!-- END Side User -->
            </div>
            <!-- END Normal Mode -->
        </div>
        <!-- END Side Header -->

        <!-- Logo -->
        <div class="content-side content-side-full content-side-user px-10 align-parent">
            @if(Auth::user()->role=='admin')
            <!-- Visible only in mini mode -->
            <div class="sidebar-mini-visible-b align-v animated fadeIn">
                <img class="img-avatar img-avatar32" src="/img/Logo-HMP-300x300.png" alt="">
            </div>
            <!-- END Visible only in mini mode -->

            <!-- Visible only in normal mode -->
            <div class="sidebar-mini-hidden-b text-center">
                <a class="img-link">
                    <img class="" src="/img/Logo-HMP-300x300.png" alt="" style="width: height; height: 75px;">
                </a>
                <ul class="list-inline mt-10">
                    <li class="list-inline-item">
                        <a class="link-effect text-dual-primary-dark font-size-sm font-w600 text-uppercase" style="cursor: context-menu;">{{ Auth::user()->username }}</a>
                    </li>
                </ul>
            </div>
            <!-- END Visible only in normal mode -->
            
            @elseif(Auth::user()->role=='peserta')
            <!-- Visible only in mini mode -->
            <div class="sidebar-mini-visible-b align-v animated fadeIn">
                <img class="img-avatar img-avatar32" src="/img/Logo-HMP-300x300.png" alt="">
            </div>
            <!-- END Visible only in mini mode -->

            <!-- Visible only in normal mode -->
            <div class="sidebar-mini-hidden-b text-center">
                <a class="img-link">
                    <img class="img-avatar" src="/img/Logo-HMP-300x300.png" alt="">
                </a>
                <ul class="list-inline mt-10">
                    <li class="list-inline-item">
                        <span class="font-size-xl text-dual-primary-dark">CBT</span>
                        <a href="http://hmpips.fis.um.ac.id/" target="_blank" class="link-effect font-w700" style="cursor: context-menu;">
                            <span class="font-size-xl text-primary"> HMPS PIPS</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- END Visible only in normal mode -->
            @endif
        </div>
        <!-- END Logo -->

        <!-- Side Navigation -->
        @if(Auth::user()->role=='admin')
        <div class="content-side content-side-full">
            <ul class="nav-main">
                <li>
                    <a href="{{route('dashboard_admin')}}" style="cursor: pointer;"><i class="si si-cup"></i><span class="sidebar-mini-hide">Dashboard</span></a>
                </li>
                <li>
                    <a href="{{route('ujianAdmin.index')}}" style="cursor: pointer;"><i class="si si-notebook"></i><span class="sidebar-mini-hide">Kelola Ujian</span></a>
                </li>
                <li>
                    <a href="{{route('question-admin.index')}}" style="cursor: pointer;"><i class="si si-lock"></i><span class="sidebar-mini-hide">Soal</span></a>
                </li>
                <li>
                    <a href="{{route('hasil-ujian.index')}}" style="cursor: pointer;"><i class="si si-badge"></i><span class="sidebar-mini-hide">Hasil Ujian</span></a>
                </li>
                <li>
                    <a class="nav-submenu" data-toggle="nav-submenu" style="cursor: pointer;"><i class="si si-user"></i><span class="sidebar-mini-hide">Kelola User</span></a>
                    <ul>
                        <li>
                            <a href="{{route('user.index')}}">Admin</a>
                        </li>
                        <li>
                            <a href="{{route('user.create')}}">Peserta</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- END Side Navigation -->
        <!-- Side Navigation -->
        @elseif(Auth::user()->role=='peserta')
        <div class="content-side content-side-full">
            <ul class="nav-main">
                <li>
                    <a href="{{route('dashboard_user')}}" style="cursor: pointer;"><i class="si si-cup"></i><span class="sidebar-mini-hide">Dashboard</span></a>
                </li>
                <li>
                    <a href="{{route('pengerjaan.index')}}"><i class="si si-lock" style="cursor: pointer;"></i><span class="sidebar-mini-hide">Ujian Peserta</span></a>
                </li>
                <li>
                    <a href="{{route('profilPeserta')}}" style="cursor: pointer;"><i class="si si-badge"></i><span class="sidebar-mini-hide">Profile</span></a>
                </li>
            </ul>
        </div>
        <!-- END Side Navigation -->
        @endif
    </div>
    <!-- Sidebar Content -->
</nav>
<!-- END Sidebar -->