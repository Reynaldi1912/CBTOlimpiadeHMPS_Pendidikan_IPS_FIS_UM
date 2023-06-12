@extends('layouts.app')

@section('content')
<!-- Main Container -->
<main id="main-container">
    <form action="{{route('ujianAdmin.tambahPeserta' , $exam)}}" method="post">
        @csrf
    <!-- Page Content -->
    <div class="content">
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">List Peserta</h3>
                <button type="submit" class="btn btn-success">Simpan</button>
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
                            <input type="checkbox" name="id_peserta[]" value="{{$data->id}}" class="form-control" @if($existing_peserta->contains('id_user', $data->id)) checked="checked" @endif>
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
    </form>
</main>


@endsection
