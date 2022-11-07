@extends('layouts.alumni')

@section('main-content')

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Daftar Permohonan Alumni') }}</h1>

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
                <h6 class="m-0 font-weight-bold text-primary">Daftar Permohonan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Tanggal Pengajuan</th>
                                <th>Jenis Pengajuan</th>
                                <th>Status</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>15 September 2022</td>
                                <td>Ijazah</td>
                                <td>
                                    <!-- Warnanya berbeda sesuai status pengajuan legalisir -->
                                    <div class="p-2 bg-secondary text-light rounded">Pengajuan</div>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-circle btn-sm">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>15 September 2022</td>
                                <td>Transkrip Nilai</td>
                                <td>
                                    <div class="p-2 bg-warning text-light rounded">Lolos Syarat</div>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-circle btn-sm">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>10 September 2015</td>
                                <td>Transkrip Nilai</td>
                                <td>
                                    <div class="p-2 bg-info text-light rounded">Disetujui BAAK</div>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-circle btn-sm">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>6 September 2015</td>
                                <td>Ijazah</td>
                                <td>
                                    <div class="p-2 bg-success text-light rounded">Legalisir Siap</div>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-circle btn-sm">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



</html>
@endsection