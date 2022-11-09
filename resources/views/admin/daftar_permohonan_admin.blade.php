@extends('layouts.admin')

@section('main-content')

<!-- import model user -->
@php use App\Models\User; @endphp

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Daftar Permohonan') }}</h1>

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
            <h6 class="m-0 font-weight-bold text-primary">Permohonan Baru</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Tahun Lulus</th>
                            <th>Jurusan/ Peminatan</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Jenis Pengajuan</th>
                            <th>Status</th>
                            <th>Lampiran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ User::find($item->user_id)->name }}</td>
                            <td>{{ User::find($item->user_id)->tahunLulus }}</td>
                            <td>{{ User::find($item->user_id)->jurusan }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</td>
                            <td>{{ $item->jenis }}</td>
                            <!-- Warnanya berbeda sesuai status pengajuan legalisir -->
                            <td>@if($item->status == 1)
                                <div class="p-2 bg-secondary text-light rounded">Pengajuan</div>
                                @elseif($item->status == 2)
                                <div class="p-2 bg-success text-light rounded">Disetujui</div>
                                @elseif($item->status == 3)
                                <div class="p-2 bg-danger text-light rounded">Ditolak</div>
                                @endif
                            </td>
                            <td>
                                @if ($item->file_permohonan != NULL)
                                <a class="btn btn-primary btn-sm"
                                    onclick="openModalPDF(`{{ asset('storage/'.$item->file_permohonan) }}`);">Permohonan</a>
                                @endif
                                @if ($item->file_eselon != NULL)
                                <a class="btn btn-primary btn-sm"
                                    onclick="openModalPDF(`{{ asset('storage/'.$item->file_eselon) }}`);">Eselon</a>
                                @endif
                                @if ($item->file_pusdiklat != NULL)
                                <a class="btn btn-primary btn-sm"
                                    onclick="openModalPDF(`{{ asset('storage/'.$item->file_pusdiklat) }}`);">Pusdiklat</a>
                                @endif
                                @if ($item->file_kampusln != NULL)
                                <a class="btn btn-primary btn-sm"
                                    onclick="openModalPDF(`{{ asset('storage/'.$item->file_kampusln) }}`);">KampusLN</a>
                                @endif
                                @if ($item->file_kuasa != NULL)
                                <a class="btn btn-primary btn-sm"
                                    onclick="openModalPDF(`{{ asset('storage/'.$item->file_kuasa) }}`);">Kuasa</a>
                                @endif
                            </td>
                            <td>
                                <a href="/admin/daftar_permohonan/{{ $item->id }}" class="btn btn-primary">Aksi</a>
                            </td>



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
                <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-xl">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Modal Header</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">

                                <embed id="modalpdf" src="" frameborder="0" width="100%" height="720px">

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- @endforeach -->



            </div>
        </div>
    </div>

</div>
<script>
// function sleep(ms) {
//     return new Promise(resolve => setTimeout(resolve, ms));
// }

async function openModalPDF(source) {
    // wait after src changed then show modal
    $('#modalpdf').attr('src', source);
    // await sleep(1 * 1000);
    $('#myModal').modal('show');
}
</script>
<!-- /.container-fluid -->

@endsection