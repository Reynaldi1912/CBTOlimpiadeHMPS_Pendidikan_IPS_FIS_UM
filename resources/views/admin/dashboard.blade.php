@extends('layouts.app')

@section('content')
                <!-- Page Content -->
                <div class="content">
                    <div class="text-center" data-toggle="appear">
                        <h1 class="font-w700 text-bg-dark mb-100">Halaman Admin Olimpiade Pendidikan IPS</h1>
                    </div>
                    <div class="row invisible" data-toggle="appear">
                        <!-- Row #1 -->
                        <div class="col-6 col-xl-6">
                            <a class="block block-rounded block-bordered block-link-shadow" href="javascript:void(0)">
                                <div class="block-content block-content-full clearfix">
                                    <div class="float-right mt-15 d-none d-sm-block">
                                        <i class="si si-user fa-2x text-primary-light"></i>
                                    </div>
                                    <div class="font-size-h3 font-w600 text-primary" data-toggle="countTo" data-speed="1000" data-to="{{sizeof($data->where('role','admin'))}}">0</div>
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Admin</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-xl-6">
                            <a class="block block-rounded block-bordered block-link-shadow" href="javascript:void(0)">
                                <div class="block-content block-content-full clearfix">
                                    <div class="float-right mt-15 d-none d-sm-block">
                                        <i class="fa fa-users fa-2x text-earth-light"></i>
                                    </div>
                                    <div class="font-size-h3 font-w600 text-earth"><span data-toggle="countTo" data-speed="1000" data-to="{{sizeof($data->where('role','peserta'))}}">0</span></div>
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Peserta</div>
                                </div>
                            </a>
                        </div>
                        <!-- END Row #1 -->
                    </div>
                    <div class="row invisible" data-toggle="appear">
                        <div class="col-4">
                            <a class="block block-link-shadow text-center" href="{{route('ujianAdmin.index')}}">
                                <div class="block-content">
                                    <p class="mt-5">
                                        <i class="si si-notebook fa-3x"></i>
                                    </p>
                                    <p class="font-w600">Kelola Ujian</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-4">
                            <a class="block block-link-shadow text-center" href="{{route('question-admin.index')}}">
                                <div class="block-content">
                                    <p class="mt-5">
                                        <i class="si si-lock fa-3x"></i>
                                    </p>
                                    <p class="font-w600">Soal</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-4">
                            <a class="block block-link-shadow text-center" href="{{route('hasil-ujian.index')}}">
                                <div class="block-content">
                                    <p class="mt-5">
                                        <i class="si si-badge fa-3x"></i>
                                    </p>
                                    <p class="font-w600">Hasil Ujian</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row invisible" data-toggle="appear">
                        <div class="col-6">
                            <a class="block block-link-shadow text-center" href="{{route('user.index')}}">
                                <div class="block-content">
                                    <p class="mt-5">
                                        <i class="si si-user fa-3x"></i>
                                    </p>
                                    <p class="font-w600">Kelola Admin</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-6">
                            <a class="block block-link-shadow text-center" href="{{route('user.create')}}">
                                <div class="block-content">
                                    <p class="mt-5">
                                        <i class="fa fa-users fa-3x"></i>
                                    </p>
                                    <p class="font-w600">Kelola Peserta</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- END Page Content -->
        </div>
        <!-- END Page Container -->
@endsection