@extends('layouts.admin')
@section('main-content')

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Verifikasi Akun yang Mendaftar') }}</h1>

@if (session('success'))
<div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session('status'))
<div class="alert alert-success border-left-success" role="alert">
    {{ session('status') }}
</div>
@endif
<!-- Main Content -->
<div id="content">

    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- Tabel untuk approved pengajuan legalisir -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row justify-content-end">
                    <h4 class="m-0 font-weight-bold text-primary col">Data Akun</h4>
                </div>
                <!-- <div class="row justify-content-first"> -->
                <!-- <br> -->
                <p class="card-title-desc">Klik tombol <span class="btn btn-success btn-circle btn-sm fas fa-check"
                        data-feather="check"></span>
                    untuk menyetujui dan <span class="btn btn-info btn-circle btn-sm fas fa-pause"
                        data-feather="check"></span> untuk Pending dan <span
                        class="btn btn-danger btn-circle btn-sm fas fa-hand" data-feather="check"></span>
                    untuk menolak aktivasi akun</p>
                <!-- </div> -->
            </div>
            <!-- tabel user -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                        <!-- <table id="datatable-buttons" class="table table-bordered dt-responsive w-100">-->
                        <!-- <table class="table table-bordered yajra-datatable"> -->
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>NIM</th>
                                <th>NIP</th>
                                <th>Tanggal Lahir</th>
                                <!-- <th>Tahun Lulus</th> -->
                                <!-- <th>Email</th> -->
                                <th>File SK Penempatan 1 BPS</th>
                                <th>File SK Atasan BPS</th>
                                <th>Status Akun</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($user as $user)

                            <tr>
                                @once
                                <td>{{ $user->name  }}</td>
                                <td>{{ $user->nim }}</td>
                                <td>{{ $user->nip }}</td>
                                <td>{{ $user->tanggalLahir }}</td>
                                <!-- <td>{{ $user->tahunLulus }}</td> -->
                                <!-- <td>{{ $user->email }}</td> -->
                                <!-- <td>{{ $user->jurusan }}</td> -->
                                <td> <a href="{{ asset('storage/'). '/' . $user->skatasanbps}}" target="blank">Klik
                                        disini</a> </td>
                                <td> <a href="{{ asset('storage/'). '/' . $user->skpenempatan1bps}}" target="blank">Klik
                                        disini</a> </td>
                                <td>{{ $user->statusAkun }}</td>
                                <td>
                                    <form action="/pendingakun/{{ $user->id }}" method="post" class="d-inline">
                                        @csrf
                                        @method('post')

                                        <button type="submit" class="btn btn-info btn-circle btn-sm"
                                            onclick="return confirm('Apakah kamu yakin pending akun?')"><span
                                                data-feather="check"><i class="fas fa-pause"></i></span></button>
                                    </form>
                                    <form action="/tolakakun/{{ $user->id }}" method="post" class="d-inline">
                                        @csrf
                                        @method('post')

                                        <button type="submit" class="btn btn-danger btn-circle btn-sm"
                                            onclick="return confirm('Apakah kamu yakin menolak akun?')"><span
                                                data-feather="check"><i class="fa-regular fa-hand"></i></span></button>
                                    </form>
                                    <!-- <form action="/verifakun/{{ $user->id }}" method="post" class="d-inline">
                                        @csrf
                                        @method('post')

                                        <button type="submit" class="btn btn-info btn-circle btn-sm"
                                            onclick="return confirm('Apakah kamu yakin menyetujui akun?')"><span
                                                data-feather="check"><i class="fas fa-link"></i></span>
                                        </button>
                                    </form> -->
                                    <!-- </td> -->
                            </tr>
                            @endonce
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-header py-0">
                <h4 class="font-weight-bold text-primary">Database Mahasiswa</h4>
            </div>
            <!-- tabel database -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <!-- <table id="datatable-buttons" class="table table-bordered dt-responsive w-100">-->
                        <!-- <table class="table table-bordered yajra-datatable"> -->
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>NIM</th>
                                <th>Tanggal Lahir</th>
                                <!-- <th>NIP</th> -->
                                <!-- <th>Tahun Lulus</th> -->
                                <!-- <th>Email</th> -->
                                <th>Ijazah Asli</th>
                                <th>Transkrip Nilai Asli</th>
                                <!-- <th>Status Akun</th> -->
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($alumni as $data)
                            <tr>
                                <td>{{ $data->name  }}</td>
                                <td>{{ $data->nim }}</td>
                                <td>{{ $data->tanggalLahir }}</td>
                                <!-- <td>{{ $data->nip }}</td> -->
                                <!-- <td>{{ $data->tahunLulus }}</td> -->
                                <!-- <td>{{ $data->email }}</td> -->
                                <!-- <td>{{ $data->jurusan }}</td> -->
                                <td> <a href="{{ asset('storage/'). '/' . $data->ijazahasli}}" target="blank">Klik
                                        disini</a> </td>
                                <td> <a href="{{ asset('storage/'). '/' . $data->transkripnilaiasli}}"
                                        target="blank">Klik
                                        disini</a> </td>
                                <!-- <td>{{ $data->statusAkun }}</td> -->
                                <td>
                                    <form action="/setujuiakun/{{ $data->id }}" method="post" class="d-inline">
                                        @csrf
                                        @method('post')
                                        <input type="hidden" name="id_user" value="{{ $user->id }}">
                                        <button type="submit" class="btn btn-success btn-circle btn-sm"
                                            onclick="return confirm('Apakah kamu yakin menyetujui akun?')"><span
                                                data-feather="check"><i class="fas fa-check"></i></span></button>
                                    </form>
                                </td>
                                <!-- <td> -->
                                <!-- <form action="/setujuiakun/{{ $data->id }}" method="post" class="d-inline">
                                        @csrf
                                        @method('post')

                                        <button type="submit" class="btn btn-success btn-circle btn-sm"
                                            onclick="return confirm('Apakah kamu yakin menyetujui akun?')"><span
                                                data-feather="check"><i class="fas fa-check"></i></span></button>
                                    </form>
                                    <form action="/tolakakun/{{ $data->id }}" method="post" class="d-inline">
                                        @csrf
                                        @method('post')

                                        <button type="submit" class="btn btn-danger btn-circle btn-sm"
                                            onclick="return confirm('Apakah kamu yakin menolak akun?')"><span
                                                data-feather="check"><i class="fas fa-ban"></i></span></button>
                                    </form>
                                    <form action="/pendingakun/{{ $data->id }}" method="post" class="d-inline">
                                        @csrf
                                        @method('post')

                                        <button type="submit" class="btn btn-info btn-circle btn-sm"
                                            onclick="return confirm('Apakah kamu yakin pending akun?')"><span
                                                data-feather="check"><i class="fas fa-pause"></i></span></button>
                                    </form> -->
                                <!-- <form action="/verifakun/{{ $data->id }}" method="post" class="d-inline">
                                        @csrf
                                        @method('post')

                                        <button type="submit" class="btn btn-info btn-circle btn-sm"
                                            onclick="return confirm('Apakah kamu yakin menyetujui akun?')"><span
                                                data-feather="check"><i class="fas fa-link"></i></span>
                                        </button>
                                    </form> -->
                                <!-- </td> -->
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- End of Content Wrapper -->
<!-- </html> -->
@endsection