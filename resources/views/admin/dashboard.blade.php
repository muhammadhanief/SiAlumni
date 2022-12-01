@extends('layouts.admin')

@section('main-content')


<!-- Main Content -->
<link href="{{ asset('css/card.css') }}" rel="stylesheet">

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

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
    <div class="row">
        <div class="col-md-6 col-xl-6">
            <div class="card h-75 bg-c-navy order-card">
                <div class="card-block">
                    <h6 class="m-b-20 mb-4">Data Alumni</h6>
                    <h2 class="text-right"><i class="fas fa-user-tie f-left"></i><span>{{$jumlahalumni}}</span></h2>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card h-75 bg-secondary order-card">
                <div class="card-block">
                    <h6 class="m-b-20 mb-4">Ijazah Asli</h6>
                    <h2 class="text-right"><i class="fas fa-archive f-left"></i><span>{{$jumlahijazah}}</span></h2>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card h-75 bg-c-pink order-card">
                <div class="card-block">
                    <h6 class="m-b-20 mb-4">Transkrip Nilai Asli</h6>
                    <h2 class="text-right"><i class="fas fa-file-alt f-left"></i><span>{{$jumlahtranskrip}}</span>
                    </h2>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card h-75 bg-c-blue order-card">
                <div class="card-block">
                    <h6 class="m-b-20 mb-3">Permohonan Baru</h6>
                    <h2 class="text-right"><i class="fa fa-refresh fa-spin f-left"></i><span>{{$permohonanbaru}}</span>
                    </h2>
                    <p class="m-b-0">Total Permohonan<span class="f-right">{{$jumlahpermohonan}}</span></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card h-75 bg-c-yellow order-card">
                <div class="card-block">
                    <h6 class="m-b-20 mb-3">Permohonan Lolos Syarat</h6>
                    <h2 class="text-right"><i class="fa fa-check-circle f-left"></i><span>{{$lolossyarat}}</span>
                    </h2>
                    <p class="m-b-0">Total Permohonan<span class="f-right">{{$jumlahpermohonan}}</span></p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card h-75 bg-info order-card">
                <div class="card-block">
                    <h6 class="m-b-20 mb-3">Permohonan disetujui BAAK</h6>
                    <h2 class="text-right"><i class="fas fa-user-check f-left"></i><span>{{$disetujuikepalabaak}}</span>
                    </h2>
                    <p class="m-b-0">Total permohonan<span class="f-right">{{$jumlahpermohonan}}</span></p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card h-75 bg-c-green order-card">
                <div class="card-block">
                    <h6 class="m-b-20 mb-3">Permohonan Selesai</h6>
                    <h2 class="text-right"><i class="fas fa-paper-plane f-left"></i><span>{{$selesai}}</span></h2>
                    <p class="m-b-0">Total Permohonan<span class="f-right">{{$jumlahpermohonan}}</span></p>
                </div>
            </div>
        </div>


    </div>
</div>

<!-- Content Row -->

<!-- End of Main Content -->

@endsection