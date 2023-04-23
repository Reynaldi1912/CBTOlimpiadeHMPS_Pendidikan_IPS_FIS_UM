@extends('layouts.app')

@section('content')
<!-- Main Container -->
<main id="main-container">

    <!-- Page Content -->
    <div class="content">
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">List Ujian <small>Peserta</small></h3>
            </div>
            <div class="block-content">
                <table class="table table-vcenter">
                    <thead>
                        <tr>
                            <th>Ujian</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Tanggal Mulai</th>
                            <th class="text-center" style="width: 100px;">Durasi</th>
                            <th class="text-center" style="width: 100px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($listUjian as $key)
                            <tr>
                                <td>{{$key->title}}</td>
                                <td class="d-none d-sm-table-cell">
                                    {{$key->start_at}}
                                </td>
                                <th class="text-center" style="width: 100px;">{{$key->duration}} menit</th>
                                <td class="text-center">
                                    <div class="btn-group">
                                    <?php
                                        date_default_timezone_set('Asia/Jakarta');
                                    ?>
                                        @if($key->finish == 1)
                                            <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                                Menyelesaikan
                                            </button>
                                        @elseif(date('Y-m-d H:i:s') >= $key->start_at  &&  date('Y-m-d H:i:s') <= date('Y-m-d H:i:s',strtotime($key->duration.' minutes',strtotime($key->start_at))))
                                            <a href="{{route('pengerjaan.show',$key->id)}}">
                                                <button type="button" class="btn btn-sm btn-primary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                                    Kerjakan
                                                </button>
                                            </a>
                                        @elseif($key->start_at > date('Y-m-d H:i:s'))
                                            <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                                Belum Mulai
                                            </button>
                                        @else
                                            <button type="button" class="btn btn-sm btn-secondary btn-disabled js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                                Expired
                                            </button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Bootstrap Forms Validation -->
            </div>
        </div>
    </div>
    <!-- END Page Content -->

</main>
<!-- END Main Container -->
@endsection