@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Profile') }}</h1>

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

        <div class="card shadow mb-4">
            <div class="card-profile-image mt-4">
                <figure class="rounded-circle avatar avatar font-weight-bold"
                    style="font-size: 60px; height: 180px; width: 180px;" data-initial="{{ Auth::user()->name[0] }}">
                </figure>
                <!-- <img class="" src="{{ Auth::user()->tanggalLahir }}" alt="..."> -->

            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <h5 class="font-weight-bold">{{ Auth::user()->name }}</h5>
                            <p>Administrator</p>
                        </div>
                    </div>

                </div>


                <div class="row">
                    <div class="col-md-4">
                        <div class="card-profile-stats">
                            <span class="heading">22</span>
                            <span class="description">Friends</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-profile-stats">
                            <span class="heading">10</span>
                            <span class="description">Photos</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-profile-stats">
                            <span class="heading">89</span>
                            <span class="description">Comments</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="col-lg-8 order-lg-1">

        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h6 class="heading-small m-0 font-weight-bold text-primary">Profil Saya</h6>
            </div>

            <div class="card-body">

                <form method="POST" action="{{ route('profile.update') }}" autocomplete="off">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <input type="hidden" name="_method" value="PUT">

                    <!-- <h6 class="heading-small text-muted mb-4">User information</h6> -->

                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="name">Name<span
                                            class="small text-danger">*</span></label>
                                    <input readonly type="text" id="name" class="form-control" name="name"
                                        placeholder="Name" value="{{ old('name', Auth::user()->name) }}">
                                </div>
                            </div>
                            <!-- <div class="col-lg-6"> -->
                            <!-- <div class="form-group focused">
                                        <label class="form-control-label" for="last_name">Last name</label>
                                        <input type="text" id="last_name" class="form-control" name="last_name" placeholder="Last name" value="{{ old('last_name', Auth::user()->last_name) }}">
                                    </div> -->
                            <!-- </div> -->


                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="email">Email address<span
                                            class="small text-danger">*</span></label>
                                    <input readonly type="email" id="email" name="email" class="form-control"
                                        placeholder="example@example.com"
                                        value="{{ old('email', Auth::user()->email) }}">
                                </div>
                            </div>



                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="nip">NIP<span
                                            class="small text-danger">*</span></label>
                                    <input type="text" readonly id="nip" class="form-control" name="nip" placeholder=""
                                        value="{{ old('nip', Auth::user()->nip) }}">
                                </div>
                            </div>



                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="nim">NIM<span
                                            class="small text-danger">*</span></label>
                                    <input readonly type="text" id="nim" class="form-control" name="nim" placeholder=""
                                        value="{{ old('nim', Auth::user()->nim) }}">
                                </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="jurusan">Jurusan<span
                                            class="small text-danger">*</span></label>
                                    <br>
                                    <select id="jurusan" name="jurusan" class="form-select form-control-user"
                                        value="{{ old('jurusan', Auth::user()->jurusan) }}">
                                        <option value="D-IV Komputasi Statistik">D-IV Komputasi Statistik</option>
                                        <option value="D-IV Statistika">D-IV Statistika</option>
                                        <option value="D-III Statistika">D-III Statistika</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="jeniskelamin">Jenis Kelamin<span
                                            class="small text-danger">*</span></label>
                                    <br>
                                    <select id="jeniskelamin" name="jeniskelamin" class="form-select form-control-user"
                                        value="{{ old('jeniskelamin', Auth::user()->jeniskelamin) }}">
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>



                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="tahunLulus">Tahun Lulus<span
                                            class="small text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-user" name="tahunLulus"
                                        value="{{ old('tahunLulus', Auth::user()->tahunLulus) }}" required>
                                </div>
                            </div>



                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="tempatLahir">Tempat Lahir<span
                                            class="small text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-user" name="tempatLahir"
                                        value="{{ old('tempatLahir', Auth::user()->tempatLahir) }}" required>
                                </div>
                            </div>



                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="tanggalLahir">Tanggal Lahir<span
                                            class="small text-danger">*</span></label>
                                    <input type="date" class="form-control form-control-user" name="tanggalLahir"
                                        value="{{ old('tanggalLahir', Auth::user()->tanggalLahir) }}" required
                                        autofocus>
                                </div>
                            </div>



                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="nomorPonsel">Nomor Ponsel<span
                                            class="small text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-user" name="nomorPonsel"
                                        value="{{ old('nomorPonsel', Auth::user()->nomorPonsel) }}" required>
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
                            <div class="col-12 py-2">
                                <div class="row text-center">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary">Save
                                            Changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Button -->
                </form>

            </div>

        </div>

    </div>

</div>

@endsection