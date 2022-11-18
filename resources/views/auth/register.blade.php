@extends('layouts.auth')

@section('main-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-12">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body px-6 py-6">
                    <div class="row">

                        <div class="col-lg-8">
                            <div class="text-center pt-5">
                                <h1 class="h1 text-gray-900 mb-4">{{ __('Registrasi Akun') }}</h1>
                            </div>

                            @if ($errors->any())
                            <div class="row p-2">

                                <div class="alert alert-danger border-left-danger" role="alert">
                                    <ul class="pl-4 my-2">
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>
                            @endif


                            <form method="POST" action="{{ route('register') }}" class="user" enctype="multipart/form-data">

                                <div class="row px-4 justify-content-center">
                                    <div class="btn-group btn-group-toggle btn-block" data-toggle="buttons">
                                        <label class="btn btn-light w-50 btn-user active">
                                            <input type="radio" name="options" id="option1" autocomplete="off" value="bps" checked> BPS
                                        </label>
                                        <label class="btn btn-light w-50 btn-user">
                                            <input type="radio" name="options" id="option2" autocomplete="off" value="nonbps"> Non-BPS
                                        </label>
                                    </div>
                                </div>

                                <div class="row p-2 mt-3">
                                    <div class="col-md-6">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <p class="font-weight-bold">Informasi Pengguna</p>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="name" placeholder="{{ __('Nama') }}" value="{{ old('name') }}" required autofocus>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password" placeholder="{{ __('Password') }}" required>
                                        </div>
                                        <!-- <hr> -->
                                        <p class="font-weight-bold">Detail Pengguna</p>

                                        <!-- BPS -->
                                        <!-- Non-BPS -->
                                        <div class="form-group" id="nip">
                                            <input id="nip-inp" type="text" class="form-control form-control-user" name="nip" placeholder="{{ __('NIP') }}" value="{{ old('nip') }}" required autofocus>
                                        </div>
                                        <!-- End of  -->

                                        <!-- Non-BPS -->
                                        <div class="form-group" id="instansi">
                                            <input id="instansi-inp" type="tel" class="form-control form-control-user" name="Instansi" placeholder="{{ __('Instansi') }}" value="{{ old('Instansi') }}" required>
                                        </div>
                                        <!-- End of -->

                                        <!-- <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="perusahaan" placeholder="{{ __('Nama Perusahaan') }}" value="{{ old('perusahaan') }}" required autofocus>
                                        </div> -->

                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="tempatLahir" placeholder="{{ __('Tempat Lahir') }}" value="{{ old('tempatLahir') }}" required autofocus>
                                        </div>

                                        <!-- <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="tahunLulus"
                                                placeholder="{{ __('Tahun Lulus') }}" value="{{ old('tahunLulus') }}"
                                                required autofocus>
                                        </div> -->

                                        <div class="form-group">
                                            <select id="jurusan" name="jurusan" aria-placeholder="{{ __('Jurusan') }}" class="form-control form-control-user py-0" style="height: 50.21px;">
                                                <option hidden selected disabled value="opt1">Jurusan</option>
                                                <option value="D-IV Komputasi Statistik">D-IV Komputasi Statistik
                                                </option>
                                                <option value="D-IV Statistika">D-IV Statistika</option>
                                                <option value="D-III Statistika">D-III Statistika</option>
                                            </select>
                                        </div>

                                        <!-- <hr> -->
                                    </div>
                                    <div class="col-md-6">
                                        <br>
                                        <p></p>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password_confirmation" placeholder="{{ __('Ulangi Password') }}" required>
                                        </div>
                                        <!-- <hr>  -->
                                        <br>
                                        <p></p>
                                        <!-- <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="nim"
                                                placeholder="{{ __('NIM') }}" value="{{ old('nim') }}" required
                                                autofocus>
                                        </div> -->

                                        <div class="form-group">
                                            <input type="tel" class="form-control form-control-user" name="nomorPonsel" placeholder="{{ __('Nomor Ponsel') }}" value="{{ old('nomorPonsel') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="date" class="form-control form-control-user" name="tanggalLahir" placeholder="{{ __('Tanggal Lahir') }}" value="{{ old('tanggalLahir') }}" required autofocus>
                                        </div>

                                        <!-- <div class="form-group">
                                            <select id="jenisKelamin" name="jenisKelamin"
                                                aria-placeholder="{{ __('Jenis Kelamin') }}"
                                                class="form-select form-control-user w-100 py-3">
                                                <option value="Laki-Laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div> -->
                                        <!-- <hr> -->

                                        <!-- <br>
                                        <br>
                                        <br> -->

                                    </div>
                                </div>
                                <div class="row p-2">
                                    <div class="col-md-6">
                                        <!-- BPS -->
                                        <div class="form-group" id="skbps">
                                            <label class="font-weight-bold">SK Atasan BPS</label>
                                            <input id="skbps-inp" type="file" class="form-control form-control-user py-2" name="skatasanbps" placeholder=" {{ __('SK Atasan BPS') }}" value="{{ old('skatasanbps') }}" required>
                                        </div>
                                        <!-- End of -->

                                        <!-- Non-BPS -->
                                        <div class="form-group" id="skatasan">
                                            <label class="font-weight-bold">SK Atasan Langsung</label>
                                            <input id="skatasan-inp" type="file" class="form-control form-control-user py-2" name="skatasanlangsung" placeholder=" {{ __('SK Atasan Langsung') }}" value="{{ old('skatasanlangsung') }}" required>
                                        </div>
                                        <!-- End of -->
                                    </div>

                                    <div class="col-md-6">
                                        <!-- BPS -->
                                        <div class="form-group" id="sktmpt">
                                            <label class="font-weight-bold text-center">SK Penempatan 1 BPS</label>
                                            <input id="sktmpt-inp" type="file" class="form-control form-control-user pt-2" name="skpenempatan1bps" placeholder=" {{ __('SK Penempatan 1 BPS') }}" value="{{ old('skpenempatan1bps') }}" required>
                                        </div>
                                        <!-- End of -->

                                        <!-- Non-BPS -->
                                        <div class="form-group" id="sklunas">
                                            <label class="font-weight-bold text-center">SK Lunas TGR (Tuntutan Ganti
                                                Rugi)</label>
                                            <input id="sklunas-inp" type="file" class="form-control form-control-user pt-2" name="sklunastgr" placeholder=" {{ __('SK Lunas TGR ') }}" value="{{ old('sklunastgr') }}" required>
                                        </div>
                                        <!-- End of -->
                                    </div>
                                </div>
                                <br>
                                <div class="justify-content-md-center">
                                    <div class="form-group col-md-auto">
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            {{ __('Register') }}
                                        </button>
                                    </div>

                                </div>
                            </form>
                            <div class="text-center pb-2">
                                <a class="small" href="{{ route('login') }}">
                                    {{ __('Sudah punya akun? Login!') }}
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 d-flex px-1">
                            <img src="{{ asset('img/stis.png') }}" class="img-fluid m-auto justify-content-center pl-6 w-75 h-16" style="background-position:center;background-size:cover">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>


<!-- Registrasi Mode -->
<script src="{{ asset('js/registrasi.js') }}"></script>
@endsection