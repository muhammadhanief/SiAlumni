@extends('layouts.admin')

@section('main-content')




<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Formulir Pengajuan Legalisir Ijazah') }}</h1>

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

@if ($errors->any())
<div class="alert alert-danger border-left-danger" role="alert">
    <ul style="margin-bottom: 0px;">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="/formulir" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">

        <div class="col-lg-6">

            <!-- Detail Pengajuan -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Pengajuan</h6>
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

                </div>

            </div>


        </div>

        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Lampiran Dokumen</h6>
                </div>
                <div class="card-body">
                    <!-- Wajib -->

                    <b>Dokumen Wajib</b><br>
                    <br>
                    <p class="ms-auto">Surat Permohonan Legalisir
                        <a href="http://stis.ac.id/media/source/1.%20surat%20permohonan%20legalisir.pdf" target=”_blank” class="btn btn-sm btn-primary btn-icon-split" aria-hidden="true">
                            <span class="icon text-light">
                                <i class='fas fa-download'></i>
                            </span>
                            <span class="text">Unduh Contoh</span>
                        </a>
                    </p>
                    <input class="form-control" type="file" id="formFile" name="file_permohonan">
                    <br>

                    <!-- Hanya untuk legalisir Ijazah atau Transkrip > 4 tahun -->
                    @if ((date('Y') - Auth::user()->tahunLulus) > 4)
                    <b>Dokumen Bahasa Inggris</b> (Opsional)<br>
                    <p class="ms-auto">Bukti Pendaftaran Kampus Luar Negeri</p>
                    <input class="form-control" type="file" id="formFile" name="file_kampusln">
                    <br>
                    @endif

                    <!-- Hanya untuk Diambil langsung oleh Orang lain -->
                    <div id="surat_kuasa">
                        <p class="ms-auto">Surat Kuasa
                            <a href="http://stis.ac.id/media/source/4.%20surat%20kuasa%20legalisir.docx" target=”_blank” class="btn btn-sm btn-primary btn-icon-split" aria-hidden="true">
                                <span class="icon text-light">
                                    <i class='fas fa-download'></i>
                                </span>
                                <span class="text">Unduh Contoh</span>
                            </a>
                        </p>
                        <input class="form-control" type="file" id="formFile" name="file_kuasa">
                        <br>
                    </div>

                    <p>Metode Pengambilan</p>

                    <select id="metodePengambilan" name="pengambilan" class="form-select form-control bg-light border-0 small">
                        <option value="1">Diemail ke alamat pemohon dalam bentuk hasil scan</option>
                        <option value="2">Diambil di kampus Polstat STIS langsung oleh pemohon</option>
                        <option value="3">Diambil di kampus Polstat STIS oleh orang lain yang telah diberi kuasa
                        </option>
                        <option value="4">Dikirimkan via pos</option>

                    </select>
                    <!-- <input type="text" class="form-control form-control-user" name="jurusan"
                                            placeholder="{{ __('Jurusan') }}" value="{{ old('jurusan') }}" required
                                            autofocus> -->

                    <br>

                    <!-- Jika opsi yang dipilih nomer 4 -->
                    <div id="alamat-pengiriman">
                        <p>Alamat Pengiriman</p>
                        <div class="input-group">
                            <input id="alamat_pengambilan" name=" alamat_pengambilan" type="text" class="form-control bg-light border-0 small" placeholder="" aria-label="Search" aria-describedby="basic-addon2">
                        </div>
                    </div>

                    <!-- Jika opsi yang dipilih nomer 1 -->
                    <div id="email-pengiriman">
                        <p>Email</p>
                        <div class="input-group">
                            <input id="email_pengambilan" name="email_pengambilan" type="text" class="form-control bg-light border-0 small" placeholder="" aria-label="Search" aria-describedby="basic-addon2">
                        </div>
                    </div>
                    <br>

                    <!-- Hiden value jenis permohonan -->
                    <input type="hidden" name="jenis" value="ijazah">

                    <div>
                        <div class=" d-flex justify-content-end">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-check"></i>&nbsp;Kirim
                            </button> &nbsp;
                            <button type="reset" class="btn btn-danger">
                                <i class="fa fa-times"></i>&nbsp;Batal
                            </button>
                        </div>
                    </div>
                    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

                    <script>
                        $(document).ready(function() {
                            $("#alamat-pengiriman").hide();
                            $("#email_pengambilan").attr('required', true);
                            $("#surat_kuasa").hide();
                        });

                        $('#metodePengambilan').change(function() {
                            val = $(this).val();
                            // kirim ke email
                            if (val == 1) {
                                $("#alamat-pengiriman").hide();
                                $("#email-pengiriman").show();

                                $("#alamat_pengambilan").removeAttr("required");
                                $("#email_pengambilan").attr("required", true);

                                $("#surat_kuasa").hide();
                            }
                            // diambil di kampus
                            else if (val == 2) {
                                $("#alamat-pengiriman").hide();
                                $("#email-pengiriman").hide();

                                $("#alamat_pengambilan").removeAttr("required");
                                $("#email_pengambilan").removeAttr("required");

                                $("#surat_kuasa").hide();
                            }
                            // diambil di kampus oleh orang lain
                            else if (val == 3) {
                                $("#alamat-pengiriman").hide();
                                $("#email-pengiriman").hide();

                                $("#alamat_pengambilan").removeAttr("required");
                                $("#email_pengambilan").removeAttr("required");

                                $("#surat_kuasa").show();
                            }
                            // dikirimkan via pos
                            else if (val == 4) {
                                $("#alamat-pengiriman").show();
                                $("#email-pengiriman").hide();

                                $("#alamat_pengambilan").attr("required", true);
                                $("#email_pengambilan").removeAttr("required");

                                $("#surat_kuasa").hide();
                            }
                        });
                    </script>
                </div>
            </div>

        </div>
    </div>
</form>

@endsection