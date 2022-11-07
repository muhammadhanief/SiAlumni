@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Tambah Data Alumni') }}</h1>

@if (session('success'))
<div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger border-left-danger" role="alert">
    <ul class="pl-4 my-2">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="row">

    <div class="col-lg-4 order-lg-2">

    </div>

    <div class="col-lg-12 order-lg-1">

        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <!-- <h6 class="m-0 font-weight-bold text-primary">My Account</h6> -->
            </div>

            <div class="card-body">

                <form method="POST" action="{{ route('storeaddalumni') }}" autocomplete="off"
                    enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <!-- <input type="hidden" name="_method" value="PUT"> -->

                    <div class="pl-lg-6">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="name">Name<span
                                            class="small text-danger">*</span></label>
                                    <input type="text" id="name" class="form-control" name="name" placeholder="Name"
                                        value="{{ old('name', Auth::user()->name) }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="email">Email address<span
                                            class="small text-danger">*</span></label>
                                    <input type="email" id="email" class="form-control" name="email"
                                        placeholder="example@example.com"
                                        value="{{ old('email', Auth::user()->email) }}">
                                </div>
                            </div>
                            <!-- <div class="col-lg-6"> -->
                            <!-- <div class="form-group focused">
                                        <label class="form-control-label" for="last_name">Last name</label>
                                        <input type="text" id="last_name" class="form-control" name="last_name" placeholder="Last name" value="{{ old('last_name', Auth::user()->last_name) }}">
                                    </div> -->
                            <!-- </div> -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="nip">NIP<span
                                            class="small text-danger">*</span></label>
                                    <input type="text" id="nip" class="form-control" name="nip" placeholder=""
                                        value="{{ old('nip', Auth::user()->nip) }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="nim">NIM<span
                                            class="small text-danger">*</span></label>
                                    <input type="text" id="nim" class="form-control" name="nim" placeholder=""
                                        value="{{ old('nim', Auth::user()->nim) }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="tahunLulus">Tahun Lulus<span
                                            class="small text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-user" name="tahunLulus"
                                        value="{{ old('tahunLulus', Auth::user()->tahunLulus) }}" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="tempatLahir">Tempat Lahir<span
                                            class="small text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-user" name="tempatLahir"
                                        value="{{ old('tempatLahir', Auth::user()->tempatLahir) }}" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="tanggalLahir">Tanggal Lahir<span
                                            class="small text-danger">*</span></label>
                                    <input type="date" class="form-control form-control-user" name="tanggalLahir"
                                        value="{{ old('tanggalLahir', Auth::user()->tanggalLahir) }}" required
                                        autofocus>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="nomorPonsel">Nomor Ponsel<span
                                            class="small text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-user" name="nomorPonsel"
                                        value="{{ old('nomorPonsel', Auth::user()->nomorPonsel) }}" required>
                                </div>
                            </div>
                            <div class="col-lg-4 mx-auto">
                                <div class="form-group">
                                    <label class="form-control-label" for="jurusan">Jurusan<span
                                            class="small text-danger">*</span></label>
                                    <!-- <input type="text" id="jurusan" class="form-control" name="jurusan" placeholder=""
                                        value="{{ old('jurusan', Auth::user()->jurusan) }}"> -->
                                    <br>
                                    <select id="jurusan" name="jurusan" class="form-select form-control p-2 "
                                        value="{{ old('jurusan', Auth::user()->jurusan) }}">
                                        <option value="D-IV Komputasi Statistik">DIV Komputasi Statistik</option>
                                        <option value="D-IV Statistika">DIV Statistika</option>
                                        <option value="D-III Statistika">DIII Statistika</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="">Dokumen Ijazah<span
                                            class="small text-danger">*</span></label>
                                    <!-- <input class="form-control form-control-user" type="file" name="ijazahasli"
                                        id="ijazahasli"> -->
                                    <input type="file" class="form-control form-control-user pt-2" name="ijazahasli"
                                        placeholder=" {{ __('SK Penempatan 1 BPS') }}"
                                        value="{{ old('skpenempatan1bps') }}" required>
                                    <br>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="">Dokumen Transkrip Nilai<span
                                            class="small text-danger">*</span></label>
                                    <!-- <input class="form-control form-control-user" type="file" name="transkripnilaiasli"
                                        id="transkripnilaiasli"> <br> -->

                                    <input type="file" class="form-control form-control-user pt-2"
                                        name="transkripnilaiasli" placeholder=" {{ __('SK Penempatan 1 BPS') }}"
                                        value="{{ old('skpenempatan1bps') }}" required>
                                </div>
                            </div>
                            <div class="col-lg-2 mx-auto pt-4 mt-2">
                                <div class="row">
                                    <div class="col text-center">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="current_password">Current password</label>
                                    <input type="password" id="current_password" class="form-control"
                                        name="current_password" placeholder="Current password">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="new_password">New password</label>
                                    <input type="password" id="new_password" class="form-control" name="new_password"
                                        placeholder="New password">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="confirm_password">Confirm password</label>
                                    <input type="password" id="confirm_password" class="form-control"
                                        name="password_confirmation" placeholder="Confirm password">
                                </div>
                            </div>
                        </div> -->
                    </div>

                    <!-- Button -->
                </form>

            </div>

        </div>

    </div>

</div>

@endsection