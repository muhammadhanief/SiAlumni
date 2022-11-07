@extends('layouts.admin')

@section('main-content')


<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar User Baru</h1>

    <!-- Tabel untuk approved pengajuan legalisir -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>NIP</th>
                            <th>SK Atasan BPS</th>
                            <th>SK Penempatan 1 BPS</th>
                            <th>Konfirmasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Dwy Bagus</td>
                            <td>123456789</td>
                            <td>1234567890</td>
                            <td>file</td>
                            <td>file</td>
                            <td>
                                <a href="#" class="btn btn-success btn-circle btn-sm">
                                    <i class="fas fa-check"></i>
                                </a>
                                <a href="#" class="btn btn-danger btn-circle btn-sm">
                                    <i class="fas fa-times"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection