@extends('layouts.admin')
@section('main-content')

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
<!-- Main Content -->
<div id="content">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Tabel untuk approved pengajuan legalisir -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row justify-content-end">
                    <h4 class="m-0 font-weight-bold text-primary col">Data Alumni</h4>
                    <a href="/addalumni" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-plus-lg" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                        </svg>
                        Tambah Data Alumni
                    </a>
                    <!-- <a href="#" class="btn btn-primary btn-icon-split btn-sm">
                                    <span class="icon text-white-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                                            </svg>
                                    </span>
                                    <span class="text">Tambah Alumni</span>
                                </a> -->
                </div>
            </div>
            <div class="card-body">
                <!-- <div class="table-responsive"> -->
                <!-- <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> -->
                <table id="datatable-buttons" class="table table-bordered dt-responsive w-100">
                    <thead>
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Tahun Lulus</th>
                            <th>Jurusan/ Peminatan</th>
                            <th>Nomor Ijazah</th>
                            <th>File Ijazah</th>
                            <th>File Transkrip Nilai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($alumni as $data)
                        <tr>
                            <td>{{ $data->nim }}</td>
                            <td>{{ $data->name  }}</td>
                            <td>{{ $data->tahunLulus }}</td>
                            <td>{{ $data->jurusan }}</td>
                            <td>{{ "gada" }}</td>
                            <td> <a href="{{ asset('storage/'). '/' . $data->ijazahasli}}" target="blank">Klik
                                    disini</a> </td>
                            <td> <a href="{{ asset('storage/'). '/' . $data->transkripnilaiasli}}" target="blank">Klik
                                    disini</a> </td>
                            <td>{{ "gada"}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- </div> -->
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- End of Content Wrapper -->
<!-- </html> -->
@endsection