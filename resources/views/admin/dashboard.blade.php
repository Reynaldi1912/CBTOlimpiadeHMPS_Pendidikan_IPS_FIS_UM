@extends('layouts.app')

@section('content')
                <!-- Page Content -->
                <div class="content">
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
                    
                    

                </div>
                <!-- END Page Content -->
        </div>
        <!-- END Page Container -->
@endsection