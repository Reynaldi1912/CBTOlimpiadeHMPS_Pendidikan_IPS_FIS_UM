@extends('layouts.app')

@section('content')
<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">List Peserta</h3>
            </div>
            <div class="block-content">
                <table class="table table-vcenter">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th class="d-none d-sm-table-cell">Nama Peserta</th>
                            <th class="text-center">Asal Sekolah</th>
                            <th class="text-center" style="width: 100px;">Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($list_peserta as $data)
                    <tr>
                        <td>{{$data->username}}</td>
                        <td>{{$data->name}}</td>
                        <td>example</td>
                        <td>{{$existing_peserta->contains('id_user', $data->id) ? 'EXIST':'NOT EXISTS'}}</td>
                        <td>
                            @if($existing_peserta->contains('id_user', $data->id))
                                <button class="btn btn-secondary" title="tambah peserta"><i class="fa fa-plus"></i></button>
                            @else
                                <form action="{{route('ujianAdmin.tambahPeserta',$exam)}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id_user" value="{{$data->id}}">
                                    <input type="hidden" name="exam_id" value="{{$exam}}">
                                    <button type="submit" class="btn btn-success text-white" title="tambah peserta"><i class="fa fa-plus"></i></button>
                                </form>
                            @endif
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

@endsection