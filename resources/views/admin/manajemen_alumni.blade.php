@extends('layouts.admin')
@section('main-content')


<!-- Main Content -->

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Manajemen Data Alumni') }}</h1>

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

@if (session('error'))
<div class="alert alert-danger border-left-danger" role="alert">
    {{ session('error') }}
</div>
@endif

<!-- Tabel untuk approved pengajuan legalisir -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row justify-content-end">
            <h4 class="m-0 font-weight-bold text-primary col">Data Alumni</h4>
            <!-- <a href="/addalumni" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg"
                    viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                </svg>
                Tambah Data Alumni
            </a> -->
        </div>


        <!-- <hr> -->
        <!-- <div class="row justify-content-start">
            <a href="{{ route('users.export') }}">
                <button class="btn btn-success">
                    Export Data Alumni
                </button>
            </a>
        </div> -->
    </div>
    <div class=" card-body">

        <div class="row justify-content-between">
            <div class="col-md-6">
                <form action="{{ route('users.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" class="form-control" required>
                    <br>
                    <button class="btn btn-info">
                        <i class="fas fa-file-import"></i> Import Data Alumni
                    </button>
                </form>
            </div>
            <div class="col-md-6">
                <br>
                <br>
                <br>
                <a href="{{ route('users.export') }}">
                    <button class="btn btn-info float-right">
                        <i class="fas fa-file-export"></i> Export Data Alumni
                    </button>
                </a>
            </div>
        </div>

        <hr>

        <div class="table-responsive">
            <table class="table table-bordered" id="table-alumni" width="100%" cellspacing="0">
                <!-- <table id="datatable-buttons" class="table table-bordered dt-responsive w-100">-->
                <!-- <table class="table table-bordered yajra-datatable"> -->
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>NIK</th>
                        <th>Tahun Masuk</th>
                        <th>Nomor Ijazah Nasional</th>
                        <th>Agama</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Prodi</th>
                        <th>Peminatan</th>
                        <th>Kelas</th>
                        <th>Status</th>
                        <th>Ipk</th>
                        <th>Peringkat</th>
                        <th>NoHp</th>
                        <th>Kab Domisili PMB</th>
                        <th>Prov Domisili PMB</th>
                        <th>Prov Daftar PMB</th>
                        <th>Ijazah Asli</th>
                        <th>Transkrip Nilai Asli</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alumni as $data)
                    <tr>
                        <td>{{ $data->name  }}</td>
                        <td>{{ $data->nim }}</td>
                        <td>{{ $data->nik}}</td>
                        <td>{{ $data->tahunMasuk}}</td>
                        <td>{{ $data->noIjazahNasional}}</td>
                        <td>{{ $data->agama}}</td>
                        <td>{{ $data->tempatLahir}}</td>
                        <td>{{ $data->tanggalLahir}}</td>
                        <td>{{ $data->prodi}}</td>
                        <td>{{ $data->peminatan}}</td>
                        <td>{{ $data->kelas}}</td>
                        <td>{{ $data->status}}</td>
                        <td>{{ $data->ipk}}</td>
                        <td>{{ $data->peringkat}}</td>
                        <td>{{ $data->noHp}}</td>
                        <td>{{ $data->kabDomisiliPmb}}</td>
                        <td>{{ $data->provDomisiliPmb}}</td>
                        <td>{{ $data->provDaftarPmb}}</td>
                        <td>
                            @if ($data->ijazahasli != null)
                            <a class="btn btn-primary btn-sm"
                                onclick="openModalPDF(`{{ asset('storage/'.$data->ijazahasli) }}`);">
                                Klik Untuk Melihat
                            </a>
                            @else
                            <a class="btn btn-secondary btn-sm" disabled>Belum Upload</a>
                            @endif
                        </td>
                        <td>
                            @if ($data->transkripnilaiasli != null)
                            <a class="btn btn-primary btn-sm"
                                onclick="openModalPDF(`{{ asset('storage/'.$data->transkripnilaiasli) }}`);">
                                Klik Untuk Melihat
                            </a>
                            @else
                            <a class="btn btn-secondary btn-sm" disabled>Belum Upload</a>
                            @endif
                        </td>
                        <td class="text-center">
                            <a class="btn btn-info btn-circle btn-sm" onclick="openModalInput(`{{ $data->id }}`);">
                                <i class="fas fa-external-link-alt"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="modal-input" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Dokumen</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="storealumni" autocomplete="off" enctype="multipart/form-data">
                    @csrf {{ csrf_field() }}
                    <div class="pl-lg-6 data">

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- End of Modal content -->
    </div>
</div>
<!-- End of Modal -->

<script>
function openModalInput(id) {
    $.ajax({
        url: '/admin/manajemenalumni/' + id,
        type: 'GET',
        success: function(data) {
            $('#modal-input').modal('show');
            $('#modal-input .data').html(data);
        }
    })
}
</script>

<!-- End of Main Content -->
<!-- End of Content Wrapper -->
<!-- </html> -->

@endsection