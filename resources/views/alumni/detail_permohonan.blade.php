@extends('layouts.alumni')

@section('main-content')

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Detail Permohonan Alumni') }}</h1>

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
                <h6 class="m-0 font-weight-bold text-primary">Detail Permohonan</h6>
            </div>
            <div class="card-body">
                <p>Tanggal Pengajuan</p>
                <p>Jenis Pengajuan</p>
                <hr>
                <p>Progress Pengajuan</p>
                <!-- Section: Monitoring Progress -->
                <!-- Ada CSS tambahan -->
                <div class="p-3">
                    <ul class="timeline-with-icons">
                        <li class="timeline-item mb-5">
                            <span class="timeline-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                </svg>
                            </span>

                            <h5 class="fw-bold">Permohonan Diajukan</h5>
                            <p class="text-muted mb-2 fw-bold">10 September 2015</p>
                            <p class="text-muted">
                                Formulir permohonan dan kelengkapannya sudah diajukan dan akan diperiksa oleh
                                petugas.
                            </p>
                        </li>

                        <li class="timeline-item mb-5">
                            <span class="timeline-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                </svg>
                            </span>
                            <h5 class="fw-bold">Permohonan Lolos Syarat</h5>
                            <p class="text-muted mb-2 fw-bold">15 September 2015</p>
                            <p class="text-muted">
                                Permohonan dan kelengkapan dokumen telah diperiksa oleh petugas.
                            </p>
                        </li>

                        <li class="timeline-item mb-5">
                            <span class="timeline-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                </svg>
                            </span>
                            <h5 class="fw-bold">Permohonan Disetujui BAAK</h5>
                            <p class="text-muted mb-2 fw-bold">16 September 2015</p>
                            <p class="text-muted">
                                Permohonan telah disetujui oleh Kepala BAAK.
                            </p>
                        </li>

                        <li class="timeline-item mb-5">
                            <span class="timeline-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                </svg>
                            </span>
                            <h5 class="fw-bold">Legalisir Siap</h5>
                            <p class="text-muted mb-2 fw-bold">18 September 2015</p>
                            <p class="text-muted">
                                Permohonan legalisir telah selesai diproses.
                            </p>
                            <a href="#" class="btn btn-primary btn-icon-split">
                                <span class="text">Unduh Dokumen</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End Section: Monitoring Progress -->
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- End of Content Wrapper -->


</html>
@endsection