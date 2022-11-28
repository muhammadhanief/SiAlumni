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
                <br>
                <p class="card-title-desc">
                    <i class="btn btn-success btn-circle btn-sm" data-feather="check"><i class="fas fa-check"></i></i>
                    Setujui &emsp;
                    <i class="btn btn-info btn-circle btn-sm" data-feather="check"><i class="fas fa-pause"></i></i>
                    Pending &emsp;
                    <i class="btn btn-danger btn-circle btn-sm" data-feather="check"><i class="fas fa-hand"></i></i>
                    Tolak
                </p>
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
                                <th>Lampiran</th>
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
                                <td>
                                    @if ($user->tipe_alumni == 'BPS')
                                    <a class="btn btn-primary btn-sm mb-1"
                                        onclick="openModalPDF(`{{ asset('storage/'.$user->skatasanbps) }}`);">
                                        Surat Pernyataan Atasan Langsung
                                    </a>
                                    <a class="btn btn-primary btn-sm mb-1"
                                        onclick="openModalPDF(`{{ asset('storage/'.$user->skpenempatan1bps) }}`);">
                                        SK Penempatan Terakhir BPS
                                    </a>

                                    @elseif ($user->tipe_alumni == 'Non-BPS')
                                    <a class="btn btn-primary btn-sm mb-1"
                                        onclick="openModalPDF(`{{ asset('storage/'.$user->skatasanlangsung) }}`);">
                                        Surat Pernyataan Atasan Langsung
                                    </a>
                                    <a class="btn btn-primary btn-sm mb-1"
                                        onclick="openModalPDF(`{{ asset('storage/'.$user->sklunastgr) }}`);">
                                        SK Lunas TGR
                                    </a>
                                    @endif
                                </td>
                                <td>
                                    @if ($user->statusAkun == 'Lolos')
                                    <span class="btn btn-success btn-sm">Lolos</span>
                                    @elseif ($user->statusAkun == 'Pending')
                                    <span class="btn btn-warning btn-sm">Pending</span>
                                    @else
                                    <span class="btn btn-danger btn-sm">Tidak Lolos</span>
                                    @endif
                                <td class="text-center">
                                    <form action="/pendingakun/{{ $user->id }}" method="post" class="d-inline"
                                        id="form-pending-{{ $user->id }}">
                                        @csrf
                                        @method('post')

                                    </form>
                                    <button type="submit" class="btn btn-info btn-circle btn-sm mb-1"
                                        onclick="pending('{{ $user->id }}')"><span data-feather="check"><i
                                                class="fas fa-pause"></i></span></button>
                                    <form action="/tolakakun/{{ $user->id }}" method="post" class="d-inline"
                                        id="form-tolak-{{ $user->id }}">
                                        @csrf
                                        @method('post')

                                    </form>
                                    <button type="submit" class="btn btn-danger btn-circle btn-sm mb-1"
                                        onclick="tolak('{{ $user->id }}')"><span data-feather="check"><i
                                                class="fa-regular fa-hand"></i></span></button>
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
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4 class="font-weight-bold text-primary">Database Alumni</h4>
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

                                <td> <a class="btn btn-primary btn-sm"
                                        onclick="openModalPDF(`{{ asset('storage/'.$data->ijazahasli) }}`);">
                                        Klik Untuk Melihat
                                    </a> </td>
                                <td>
                                    <a class="btn btn-primary btn-sm"
                                        onclick="openModalPDF(`{{ asset('storage/'.$data->transkripnilaiasli) }}`);">
                                        Klik Untuk Melihat
                                    </a>
                                </td>
                                <!-- <td>{{ $data->statusAkun }}</td> -->
                                <td class="text-center">
                                    <form action="/setujuiakun/{{ $data->id }}" method="post" class="d-inline"
                                        id="form-{{ $data->id }}">
                                        @csrf
                                        @method('post')
                                        <input type="hidden" name="id_user" value="{{ $user->id }}">
                                    </form>
                                    <button type="submit" class="btn btn-success btn-circle btn-sm"
                                        onclick="setuju('{{ $data->id }}')"><span data-feather="check"><i
                                                class="fas fa-check"></i></span></button>
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



<script>
function setuju(id) {
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Apakah Anda yakin untuk menyetujui aktivasi akun?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Setujui!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            // submit form using jquery
            $('#form-' + id).submit();
            Swal.fire(
                'Disetujui!',
                'Akun telah diverifikasi.',
                'success'
            )
        }
    })
}

function pending(id) {
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Apakah Anda yakin untuk pending aktivasi akun?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Pending!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            // submit form using jquery
            $('#form-pending-' + id).submit();
            Swal.fire(
                'Pending!',
                'Aktivasi akun telah pending.',
                'success'
            )
        }
    })
}

function tolak(id) {
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Apakah Anda yakin untuk menolak aktivasi akun?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Tolak!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            // submit form using jquery
            $('#form-tolak-' + id).submit();
            Swal.fire(
                'Ditolak!',
                'Aktivasi akun telah ditolak.',
                'success'
            )
        }
    })
}
</script>
@endsection