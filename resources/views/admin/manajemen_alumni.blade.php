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
        <hr>
        <div class="row justify-content-between">

            <form action="{{ route('users.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-info">Import Data Alumni</button>
            </form>
            <div>
                <br>
                <br>
                <br>
                <a href="{{ route('users.export') }}">
                    <button class="btn btn-info">
                        Export Data Alumni
                    </button>
                </a>
            </div>


        </div>
        <!-- <hr> -->
        <div class="row justify-content-start">
            <!-- <a href="{{ route('users.export') }}">
                <button class="btn btn-success">
                    Export Data Alumni
                </button>
            </a> -->
        </div>
    </div>
    <div class=" card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <!-- <table id="datatable-buttons" class="table table-bordered dt-responsive w-100">-->
                <!-- <table class="table table-bordered yajra-datatable"> -->
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>NIM</th>
                        <!-- <th>Nomor Ijazah</th> -->
                        <th>File Ijazah</th>
                        <th>File Transkrip Nilai</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alumni as $data)
                    <tr>
                        <td>{{ $data->name  }}</td>
                        <td>{{ $data->nim }}</td>
                        <!-- <td>{{ "gada" }}</td> -->
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
                        <td><a class="btn btn-primary btn-sm" onclick="openModalInput(`{{ $data->id }}`);">
                                Aksi
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