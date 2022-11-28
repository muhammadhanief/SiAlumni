@extends('layouts.admin')

@section('main-content')

<!-- import model user -->
@php use App\Models\User; @endphp

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
                        <th>NIM</th>
                        <th>Jurusan/ Peminatan</th>
                        <th>Tanggal Permohonan</th>
                        <th>Jenis Permohonan</th>
                        <th>Status</th>
                        <th>Catatan</th>
                        <th>Lampiran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $users[$item->user_id]->name }}</td>
                        <td>{{ $users[$item->user_id]->nim }}</td>
                        <td>{{ $users[$item->user_id]->jurusan }}</td>
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
                            <div class="p-2 bg-secondary text-light rounded">{{ $item->status }}</div>
                            @elseif($item->status == 'Disetujui Kepala BAAK')
                            <div class="p-2 bg-primary text-light rounded">{{ $item->status }}</div>
                            @elseif($item->status == 'Disetujui Petugas BAAK')
                            <div class="p-2 bg-primary text-light rounded">{{ $item->status }}</div>
                            @elseif($item->status == 'Disetujui Wakil Direktur 1')
                            <div class="p-2 bg-primary text-light rounded">{{ $item->status }}</div>
                            @elseif($item->status == 'Selesai')
                            <div class="p-2 bg-success text-light rounded">{{ $item->status }}</div>
                            @elseif($item->status == 'Ditolak Petugas BAAK')
                            <div class="p-2 bg-danger text-light rounded">{{ $item->status }}</div>
                            @elseif($item->status == 'Ditolak Kepala BAAK')
                            <div class="p-2 bg-danger text-light rounded">{{ $item->status }}</div>
                            @elseif($item->status == 'Ditolak Wakil Direktur 1')
                            <div class="p-2 bg-danger text-light rounded">{{ $item->status }}</div>
                            @endif
                        </td>
                        <td class="text-justify">
                            {{ $item->catatan }}
                        </td>
                        <td>
                            @if ($item->file_permohonan != NULL)
                            <a class="btn btn-primary btn-sm mb-1" onclick="openModalPDF(`{{ asset('storage/'.$item->file_permohonan) }}`);">Permohonan</a>
                            @endif
                            @if ($item->file_eselon != NULL)
                            <a class="btn btn-primary btn-sm mb-1" onclick="openModalPDF(`{{ asset('storage/'.$item->file_eselon) }}`);">Eselon</a>
                            @endif
                            @if ($item->file_pusdiklat != NULL)
                            <a class="btn btn-primary btn-sm mb-1" onclick="openModalPDF(`{{ asset('storage/'.$item->file_pusdiklat) }}`);">Pusdiklat</a>
                            @endif
                            @if ($item->file_kampusln != NULL)
                            <a class="btn btn-primary btn-sm mb-1" onclick="openModalPDF(`{{ asset('storage/'.$item->file_kampusln) }}`);">KampusLN</a>
                            @endif
                            @if ($item->file_kuasa != NULL)
                            <a class="btn btn-primary btn-sm mb-1" onclick="openModalPDF(`{{ asset('storage/'.$item->file_kuasa) }}`);">Kuasa</a>
                            @endif
                        </td>
                        <td>
                            @if ($ispetugasbaak)
                            <!-- Jika user adalah petugas BAAK -->
                            @if ($item->status == "Menunggu")
                            <a onclick="konfirmasi('{{ $item->id }}')" class="btn btn-primary btn-sm">Aksi</a>
                            @elseif ($item->status == 'Disetujui Wakil Direktur 1' && !isset($legalisir[$item->id]))
                            <a onclick="openModalInput('{{ $item->id }}')" class="btn btn-primary btn-sm">Upload</a>
                            @elseif (isset($legalisir[$item->id]) && $item->status != 'Selesai')
                            <a onclick="openModalPDFpublish(`{{ asset('storage/'.$legalisir[$item->id]->file_legalisir) }}`, `{{ $item->id }}`);" class="btn btn-warning btn-sm">Publish</a>
                            @elseif ($item->status == 'Selesai' && isset($item->file_legalisir))
                            <a onclick="openModalPDF(`{{ asset('storage/'.$legalisir[$item->id]->file_legalisir) }}`);" class="btn btn-success btn-sm">Hasil</a>
                            @endif
                            @else
                            @if ($item->status != "Disetujui Wakil Direktur 1" && $item->status != "Selesai")
                            <a onclick="konfirmasi('{{ $item->id }}')" class="btn btn-primary btn-sm">Aksi</a>
                            @elseif ($item->status == 'Disetujui Wakil Direktur 1' && !isset($legalisir[$item->id]))
                            <a onclick="openModalInput('{{ $item->id }}')" class="btn btn-primary btn-sm">Upload</a>
                            @elseif (isset($legalisir[$item->id]) && $item->status != 'Selesai')
                            <a onclick="openModalPDFpublish(`{{ asset('storage/'.$legalisir[$item->id]->file_legalisir) }}`, `{{ $item->id }}`);" class="btn btn-warning btn-sm">Publish</a>
                            @elseif ($item->status == 'Selesai' && isset($item->file_legalisir))
                            <a onclick="openModalPDF(`{{ asset('storage/'.$legalisir[$item->id]->file_legalisir) }}`);" class="btn btn-success btn-sm">Hasil</a>
                            @endif
                            @endif

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

            <!-- @endforeach -->

        </div>
    </div>
</div>


<!-- Modal publish -->
<div id="myModalPublish" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xl">
        <!-- Modal content-->
        <div class="modal-content" style="height: 90vh;">
            <div class="modal-header">
                <h4 class="modal-title">Preview Dokumen</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

                <embed id="modalpublish" src="" frameborder="0" width="100%" height="100%">

            </div>
            <div class="modal-footer">
                <form id="form-publish" action="" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Publish</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal" id="btn-reupload">Reupload</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
        <!-- End of Modal content -->
    </div>
</div>
<!-- End of Modal -->

<!-- Modal upload -->
<div id="modal-input" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Unggah Dokumen</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="permohonan/upload" autocomplete="off" enctype="multipart/form-data">
                    @csrf {{ csrf_field() }}
                    <div class="pl-lg-6 data">


                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
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
            url: '/permohonan/preupload/' + id,
            type: 'GET',
            success: function(data) {
                $('#modal-input').modal('show');
                $('#modal-input .data').html(data);
            }
        })
    }

    //modal untuk nampilin pdf sebelum publish
    function openModalPDFpublish(source, id) {
        // wait after src changed then show modal
        $('#modalpublish').attr('src', source);
        $('#form-publish').attr('action', '/permohonan/publish/' + id);
        $('#btn-reupload').attr('onclick', 'openModalInput(' + id + ')');
        // await sleep(1 * 1000);
        $('#myModalPublish').modal('show');
    }
</script>







<script>
    function konfirmasi(id) {
        Swal.fire({
            title: 'Apakah anda menyetujui permohonan ini?',
            icon: 'warning',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Setuju',
            denyButtonText: `Tolak`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                Swal.fire('Permohonan disetujui', '', 'success').then((result) => {
                    window.location = "/permohonan/setuju/" + id;
                })

            } else if (result.isDenied) {
                Swal.fire('Permohonan ditolak', '', 'error').then((result) => {
                    window.location = "/permohonan/tolak/" + id;
                })

            }
        })
    }
</script>
<!-- script udah dipindahin ke layout.admin -->

@endsection