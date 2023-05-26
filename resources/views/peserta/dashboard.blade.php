@extends('layouts.app')

@section('content')
                <!-- Page Content -->
                <div class="content">
                    <div class="col-md-12">
                        <a class="block block-transparent">
                            <div class="block-content block-content-full bg-danger text-center">
                                <div class="item item-2x item-circle bg-black-op-10 mx-auto mb-20">
                                    <i class="fa fa-close text-danger-light"></i>
                                </div>
                                <div class="font-size-h3 font-w600 text-white">MAAF</div>
                                <div class="font-size-sm font-w600 text-uppercase text-danger-light">Anda Belum Lolos</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-12">
                        <a class="block block-transparent">
                            <div class="block-content block-content-full bg-success text-center">
                                <div class="item item-2x item-circle bg-black-op-10 mx-auto mb-20">
                                    <i class="fa fa-check text-danger-light"></i>
                                </div>
                                <div class="font-size-h3 font-w600 text-white">SELAMAT</div>
                                <div class="font-size-sm font-w600 text-uppercase text-danger-light">Anda Lolos dengan Nilai {{80}}</div>
                            </div>
                        </a>
                    </div>
                    <div class="row invisible" data-toggle="appear">
                        <!-- Row #2 -->
                        <div class="col-md-12">
                            <div class="block block-rounded block-bordered">
                                <div class="block-header block-header-default border-b">
                                    <h3 class="block-title">
                                        Instruksi <small>Pengerjaan</small>
                                    </h3>
                                </div>
                                <div class="block-content block-content-full">
                                    <ul class="list-group">
                                        <li class="list-group-item">Cras justo odio</li>
                                        <li class="list-group-item">Dapibus ac facilisis in</li>
                                        <li class="list-group-item">Morbi leo risus</li>
                                        <li class="list-group-item">Porta ac consectetur ac</li>
                                        <li class="list-group-item">Vestibulum at eros</li>
                                    </ul>
                                </div>
                                
                            </div>
                        </div>
                        <!-- END Row #2 -->
                    </div>
                </div>
                <!-- END Page Content -->
        </div>
        <!-- END Page Container -->
@endsection