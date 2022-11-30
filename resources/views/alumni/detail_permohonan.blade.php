@extends('layouts.admin')

@section('main-content')



<!-- Main Content -->

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Detail Permohonan Saya') }}</h1>

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

<!-- Tabel untuk approved Permohonan legalisir -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Permohonan</h6>
    </div>
    <div class="card-body">
        <p><b>Tanggal Permohonan</b></p>
        <p>{{ \Carbon\Carbon::parse($data->created_at)->format('d F Y') }}</p>
        <p><b>Jenis Permohonan</b></p>
        <p>
            @if ($data->jenis == 'ijazah')
            Ijazah
            @elseif ($data->jenis == 'transkrip')
            Transkrip Nilai
            @endif
        </p>
        <hr>
        <p><b>Progress Permohonan</b></p>
        <!-- Section: Monitoring Progress -->
        <!-- Ada CSS tambahan -->
        <div class="p-3">
            <ul class="timeline-with-icons p-0">

                @if ($data->status == 'Menunggu' ||
                $data->status == 'Disetujui Petugas BAAK' ||
                $data->status == 'Disetujui Kepala BAAK' ||
                $data->status == 'Disetujui Wakil Direktur 1' ||
                $data->status == 'Selesai' ||
                $data->status == 'Ditolak Petugas BAAK' ||
                $data->status == 'Ditolak Kepala BAAK' ||
                $data->status == 'Ditolak Wakil Direktur 1')
                <li class="timeline-item mb-0 px-4 pb-1">
                    <span class="timeline-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                        </svg>
                    </span>

                    <h5 class="fw-bold">Permohonan Diajukan</h5>
                    <p class="text-muted mb-2 fw-bold">{{ \Carbon\Carbon::parse($data->created_at)->format('d F Y H:i') }} WIB </p>
                    </p>
                    <p class="text-muted">
                        Formulir permohonan dan kelengkapannya sudah diajukan dan akan diperiksa oleh
                        petugas.
                    </p>
                </li>
                @endif

                @if ($data->status == 'Disetujui Petugas BAAK' ||
                $data->status == 'Disetujui Kepala BAAK' ||
                $data->status == 'Disetujui Wakil Direktur 1' ||
                $data->status == 'Selesai' ||
                $data->status == 'Ditolak Kepala BAAK' ||
                $data->status == 'Ditolak Wakil Direktur 1')
                <li class="timeline-item mb-0 px-4 pb-1">
                    <span class="timeline-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                        </svg>
                    </span>
                    <h5 class="fw-bold">Permohonan Lolos Syarat</h5>
                    <p class="text-muted mb-2 fw-bold">{{ \Carbon\Carbon::parse($data->time_petugas_baak)->format('d F Y H:i') }} WIB </p>
                    </p>
                    <p class="text-muted">
                        Permohonan dan kelengkapan dokumen telah diperiksa oleh petugas.
                    </p>
                </li>
                @endif

                @if ($data->status == 'Disetujui Kepala BAAK' ||
                $data->status == 'Disetujui Wakil Direktur 1' ||
                $data->status == 'Selesai' ||
                $data->status == 'Ditolak Wakil Direktur 1')
                <li class="timeline-item mb-0 px-4 pb-1">
                    <span class="timeline-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                        </svg>
                    </span>
                    <h5 class="fw-bold">Permohonan Disetujui Kepala BAAK</h5>
                    <p class="text-muted mb-2 fw-bold">{{ \Carbon\Carbon::parse($data->time_kepala_baak)->format('d F Y H:i') }} WIB </p>
                    </p>
                    <p class="text-muted">
                        Permohonan telah disetujui oleh Kepala BAAK.
                    </p>
                </li>
                @endif

                @if ($data->status == 'Disetujui Wakil Direktur 1' ||
                $data->status == 'Selesai')
                <li class="timeline-item mb-0 px-4 pb-1">
                    <span class="timeline-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                        </svg>
                    </span>
                    <h5 class="fw-bold">Permohonan Disetujui Wakil Direktur 1</h5>
                    <p class="text-muted mb-2 fw-bold">{{ \Carbon\Carbon::parse($data->time_wadir_1)->format('d F Y H:i') }} WIB </p>
                    </p>
                    <p class="text-muted">
                        Permohonan telah disetujui oleh Wakil Direktur 1.
                    </p>
                </li>
                @endif

                @if ($data->status == 'Selesai')
                <li class="timeline-item mb-0 px-4 pb-1">
                    <span class="timeline-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                        </svg>
                    </span>
                    <h5 class="fw-bold">Legalisir Siap</h5>
                    <p class="text-muted mb-2 fw-bold">{{ \Carbon\Carbon::parse($data->time_selesai)->format('d F Y H:i') }} WIB </p>
                    </p>
                    <p class="text-muted">
                        Permohonan legalisir telah selesai diproses.
                    </p>
                    <a href="{{ route('download', $data->id) }}" class="btn btn-success btn-icon-split">
                        <span class="text">Unduh Dokumen</span>
                        <span class="icon text-light">
                            <i class="fas fa-download"></i>
                        </span>
                    </a>
                    @if ($data->resi != null)
                    <!-- resi with copy button -->
                    <div class="form-group row mx-0 my-2">
                        <div class="col-xs-3 mr-2 mt-2">
                            <input type="text" class="form-control" id="resi" value="{{ $data->resi }}" style="height: 35px;" readonly>
                            <span class="help-block">Resi Pengiriman</span>
                        </div>
                        <div class="col-xs-2 mr-2 mt-2">
                            <button class="btn btn-secondary btn-icon-split" onclick="copyResi()">
                                <span class="text">Salin</span>
                                <span class="icon text-light">
                                    <i class="fas fa-copy"></i>
                                </span>
                            </button>
                        </div>
                    </div>
                    @endif
                </li>
                @endif

                @if ($data->status == 'Ditolak Petugas BAAK' ||
                $data->status == 'Ditolak Kepala BAAK' ||
                $data->status == 'Ditolak Wakil Direktur 1')
                <li class="timeline-item mb-0 px-4 pb-1">
                    <span class="timeline-icon icon-denied">
                        <svg width="16px" height="16px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-x-circle-fill">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                        </svg>
                    </span>
                    <h5 class="fw-bold text-danger">Permohonan Ditolak</h5>
                    <p class="text-muted mb-2 fw-bold">{{ \Carbon\Carbon::parse($data->time_tolak)->format('d F Y H:i') }} WIB </p>
                    <p class="text-muted">
                        Permohonan {{ $data->status }}.
                    </p>
                </li>
                @endif
            </ul>
        </div>
        <!-- End Section: Monitoring Progress -->
    </div>
</div>

<!-- End of Main Content -->
<!-- End of Content Wrapper -->

<script>
    function copyResi() {
        var copyText = document.getElementById("resi");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        document.execCommand("copy");
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            html: 'Resi <b>' + copyText.value + '</b> berhasil disalin',
            confirmButtonColor: '#3085d6',
        })
    }
</script>
@endsection