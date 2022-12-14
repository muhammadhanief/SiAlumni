@extends('layouts.admin')

@section('main-content')

<!-- import model user -->
@php use App\Models\User; @endphp



<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Histori Permohonan Anda') }}</h1>

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
    <!-- <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Permohonan Baru</h6>
        </div> -->
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <!-- <th>Nama</th> -->
                        <!-- <th>Tahun Lulus</th> -->
                        <!-- <th>Jurusan/ Peminatan</th> -->
                        <th>Tanggal Permohonan</th>
                        <th>Jenis Permohonan</th>
                        <th>Status</th>
                        <th>Detail</th>
                        <th>Lampiran</th>
                        <th>Download Hasil</th>
                        <!-- <th>Aksi</th> -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>

                        <!-- <td>{{ User::find($item->user_id)->name }}</td>
                            <td>{{ User::find($item->user_id)->tahunLulus }}</td>
                            <td>{{ User::find($item->user_id)->jurusan }}</td> -->
                        <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</td>
                        <td>
                            @if ($item->jenis == 'ijazah')
                            Ijazah
                            @elseif ($item->jenis == 'transkrip')
                            Transkrip Nilai
                            @endif
                        </td>
                        <!-- Warnanya berbeda sesuai status pengajuan legalisir -->
                        <td>@if($item->status == 'Menunggu' )
                            <div class="p-2 mb-2 bg-secondary text-light rounded btn-sm">{{ $item->status }}</div>
                            @elseif($item->status == 'Disetujui Kepala BAAK')
                            <div class="p-2 mb-2 bg-info text-light rounded btn-sm">{{ $item->status }}</div>
                            @elseif($item->status == 'Disetujui Petugas BAAK')
                            <div class="p-2 mb-2 text-light bg-warning rounded btn-sm" >
                                {{ $item->status }}</div>
                            @elseif($item->status == 'Disetujui Wakil Direktur 1')
                            <div class="p-2 mb-2 text-light bg-primary rounded btn-sm">
                                {{ $item->status }}</div>
                            @elseif($item->status == 'Selesai')
                            <div class="p-2 mb-2 bg-success text-light rounded btn-sm">{{ $item->status }}</div>
                            @elseif($item->status == 'Ditolak Petugas BAAK')
                            <div class="p-2 mb-2 bg-danger text-light rounded btn-sm">{{ $item->status }}</div>
                            @elseif($item->status == 'Ditolak Kepala BAAK')
                            <div class="p-2 mb-2 bg-danger text-light rounded btn-sm">{{ $item->status }}</div>
                            @elseif($item->status == 'Ditolak Wakil Direktur 1')
                            <div class="p-2 mb-2  bg-danger text-light rounded btn-sm">{{ $item->status }}</div>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="historialumni/detail/{{ $item->id }}" class="btn btn-info btn-circle btn-sm "><i
                                    class="fas fa-info-circle"></i> </a>
                        </td>
                        <td>
                            @if ($item->file_permohonan != NULL)
                            <a class="btn mb-2 btn-primary btn-sm"
                                onclick="openModalPDF(`{{ asset('storage/'.$item->file_permohonan) }}`);">Permohonan</a>
                            @endif
                            @if ($item->file_eselon != NULL)
                            <a class="btn mb-2 btn-primary btn-sm"
                                onclick="openModalPDF(`{{ asset('storage/'.$item->file_eselon) }}`);">Eselon</a>
                            @endif
                            @if ($item->file_pusdiklat != NULL)
                            <a class="btn mb-2 btn-primary btn-sm"
                                onclick="openModalPDF(`{{ asset('storage/'.$item->file_pusdiklat) }}`);">Pusdiklat</a>
                            @endif
                            @if ($item->file_kampusln != NULL)
                            <a class="btn  mb-2 btn-primary btn-sm"
                                onclick="openModalPDF(`{{ asset('storage/'.$item->file_kampusln) }}`);">KampusLN</a>
                            @endif
                            @if ($item->file_kuasa != NULL)
                            <a class="btn mb-2 btn-primary btn-sm"
                                onclick="openModalPDF(`{{ asset('storage/'.$item->file_kuasa) }}`);">Kuasa</a>
                            @endif
                        </td>
                        <td>
                            @if ($item->file_legalisir != NULL)
                            <button class="btn btn-success btn-sm"
                                onclick=" openModalPDF(`{{ asset('storage/'.$item->file_legalisir) }}`);">
                                Download</button>
                            @else
                            <button class="btn btn-dark btn-sm">
                                Belum ada</button>
                            @endif
                        </td>
                        <!-- <td>
                                <a href=" /admin/daftar_permohonan/{{ $item->id }}" class="btn btn-primary">Aksi</a>
                        </td> -->



                    </tr>
                    @endforeach

                    <!-- <tr>
                            <td>Dwy Bagus</td>
                            <td>2010</td>
                            <td>Komputasi Statistik</td>
                            <td>15 September 2022</td>
                            <td>Ijazah</td>
                            <td>

                                <div class="p-2 bg-secondary text-light rounded">Pengajuan</div>
                            </td>
                            <td>
                                <a href="#" class="btn btn-primary btn-icon-split">
                                    <span class="text">Aksi</span>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Arumia Mustika</td>
                            <td>2020</td>
                            <td>Sistem Informasi</td>
                            <td>15 September 2022</td>
                            <td>Transkrip Nilai</td>
                            <td>
                                <div class="p-2 bg-warning text-light rounded">Lolos Syarat</div>
                            </td>
                            <td>
                                <a href="#" class="btn btn-primary btn-icon-split">
                                    <span class="text">Aksi</span>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Desy Ahyu</td>
                            <td>2020</td>
                            <td>Sistem Informasi</td>
                            <td>10 September 2022</td>
                            <td>Transkrip Nilai</td>
                            <td>
                                <div class="p-2 bg-info text-light rounded">Disetujui BAAK</div>
                            </td>
                            <td>
                                <a href="#" class="btn btn-primary btn-icon-split">
                                    <span class="text">Aksi</span>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Novianto Budi</td>
                            <td>2003</td>
                            <td>Komputasi Statistik</td>
                            <td>6 September 2022</td>
                            <td>Ijazah</td>
                            <td>
                                <div class="p-2 bg-success text-light rounded">Legalisir Siap</div>
                            </td>
                            <td>
                                <a href="#" class="btn btn-primary btn-icon-split">
                                    <span class="text">Aksi</span>
                                </a>
                            </td>
                        </tr> -->
                </tbody>

            </table>

            <!-- @foreach ($data as $item) -->
            <!-- Trigger the modal with a button -->
            <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->

            <!-- @endforeach -->



        </div>
    </div>
</div>



<!-- script udah dipindahin ke layout.admin -->

@endsection