@extends('layouts.admin')

@section('main-content')

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Dashboard') }}</h1>

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

        <!-- Page Heading -->
        <!-- <h1 class="h3 mb-4 text-gray-800">Home</h1> -->

        <div class="row">

            <div class="col-lg-6">

                <!-- Circle Buttons -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Diri</h6>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Nama</th>
                                <th>{{ Auth::user()->name }}</th>
                            </tr>
                            <tr>
                                <th>NIM</th>
                                <th>{{ Auth::user()->nim }}</th>
                            </tr>
                            <tr>
                                <th>NIP</th>
                                <th>{{ Auth::user()->nip }}</th>
                            </tr>
                            <tr>
                                <th>Nomor Ponsel</th>
                                <th>{{ Auth::user()->nomorPonsel }}</th>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <th>{{ Auth::user()->email }}</th>
                            </tr>
                            <tr>
                                <th>TTL</th>
                                <th>{{ Auth::user()->tempatLahir }} {{ Auth::user()->tanggalLahir }}</th>
                            </tr>
                            <tr>
                                <th>Jurusan</th>
                                <th>{{ Auth::user()->jurusan }}</th>
                            </tr>
                            <tr>
                                <th>Tahun Lulus</th>
                                <th>{{ Auth::user()->tahunLulus }}</th>
                            </tr>
                        </table>



                        <!-- Circle Buttons (Default) -->
                        <!-- <div class="mb-2">
                                        <code>.btn-circle</code>
                                    </div>
                                    <a href="#" class="btn btn-primary btn-circle">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="#" class="btn btn-success btn-circle">
                                        <i class="fas fa-check"></i>
                                    </a>
                                    <a href="#" class="btn btn-info btn-circle">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                    <a href="#" class="btn btn-warning btn-circle">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger btn-circle">
                                        <i class="fas fa-trash"></i>
                                    </a> -->
                        <!-- Circle Buttons (Small) -->
                        <!-- <div class="mt-4 mb-2">
                                        <code>.btn-circle .btn-sm</code>
                                    </div>
                                    <a href="#" class="btn btn-primary btn-circle btn-sm">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="#" class="btn btn-success btn-circle btn-sm">
                                        <i class="fas fa-check"></i>
                                    </a>
                                    <a href="#" class="btn btn-info btn-circle btn-sm">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                    <a href="#" class="btn btn-warning btn-circle btn-sm">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger btn-circle btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </a> -->
                        <!-- Circle Buttons (Large) -->
                        <!-- <div class="mt-4 mb-2">
                                        <code>.btn-circle .btn-lg</code>
                                    </div>
                                    <a href="#" class="btn btn-primary btn-circle btn-lg">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="#" class="btn btn-success btn-circle btn-lg">
                                        <i class="fas fa-check"></i>
                                    </a>
                                    <a href="#" class="btn btn-info btn-circle btn-lg">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                    <a href="#" class="btn btn-warning btn-circle btn-lg">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger btn-circle btn-lg">
                                        <i class="fas fa-trash"></i>
                                    </a> -->
                    </div>
                </div>

                <!-- Brand Buttons -->

            </div>
            @if (isset(\Auth::user()->nim) == FALSE)
            <div class="col-lg-6">
                <div class="alert alert-danger alert-dismissible fade show card-shadow mb-4">
                    <h4 class="alert-heading"><i class="fas fa-exclamation-triangle"></i> Akun anda belum terverifikasi
                    </h4>
                    <p>Silahkan selesaikan pendaftaran akun.</p>
                    <hr>
                    <a href="{{ route('profile') }}" class="btn btn-secondary btn-icon-split"
                        style="background-color:#2285ba">
                        <span class="icon text-white-50">
                            <i class='fas fa-external-link-alt'></i>
                        </span>
                        <span class="text">Verifikasi Sekarang</span>
                    </a>
                </div>
            </div>
            @else
            <div class="col-lg-6">
                <div class="alert alert-success alert-dismissible fade show card-shadow mb-4">
                    <h4 class="info-heading"><i class="fas fa-check"></i> Akun anda sudah terverifikasi
                    </h4>
                    <p>Anda bisa lanjut ke menu permohonan</p>

                    <!-- <hr> -->
                    <a href="{{ route('profile') }}" class="btn btn-secondary btn-icon-split"
                        style="background-color:#2285ba">
                        <span class="icon text-white-50">
                            <i class='fas fa-external-link-alt'></i>
                        </span>
                        <span class="text">Verifikasi Sekarang</span>
                    </a>
                </div>
            </div>
            @endif
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Progress</h6>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid py-5">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="horizontal-timeline">
                                        <ul class="list-inline items">
                                            <li class="list-inline-item items-list">
                                                <div class="px-4">
                                                    <div class="event-date badge bg-info">2 June</div>
                                                    <h5 class="pt-2">Event One</h5>
                                                    <p class="text-muted">It will be as simple as occidental in fact it
                                                        will be Occidental Cambridge
                                                        friend</p>
                                                    <div>
                                                        <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-inline-item items-list">
                                                <div class="px-4">
                                                    <div class="event-date badge bg-success">5 June</div>
                                                    <h5 class="pt-2">Event Two</h5>
                                                    <p class="text-muted">Everyone realizes why a new common language
                                                        one could refuse translators.
                                                    </p>
                                                    <div>
                                                        <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-inline-item items-list">
                                                <div class="px-4">
                                                    <div class="event-date badge bg-danger">7 June</div>
                                                    <h5 class="pt-2">Event Three</h5>
                                                    <p class="text-muted">If several languages coalesce the grammar of
                                                        the resulting simple and
                                                        regular</p>
                                                    <div>
                                                        <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-inline-item items-list">
                                                <div class="px-4">
                                                    <div class="event-date badge bg-warning">8 June</div>
                                                    <h5 class="pt-2">Event Four</h5>
                                                    <p class="text-muted">Languages only differ in their pronunciation
                                                        and their most common words.
                                                    </p>
                                                    <div>
                                                        <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->


        </html>
        @endsection