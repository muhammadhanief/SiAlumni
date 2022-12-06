<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiAlumni Politeknik Statistika STIS</title>

    <link rel="stylesheet" href="{{ asset('css/styles.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/timelinelanding.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
    <!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> -->
    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Poppins:400,500,600,700" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('img/stis.png') }}" rel="icon" type="image/png">
</head>

<body>

    <!-- Hero -->
    <section id="hero" class="min-vh-100 d-flex flex-row flex-wrap justify-content-center align-items-start">
        <!-- Header -->
        <header>
            <div class="container">
                <div id="navbar">
                    <img src="img/stis.png" class="logo" alt="logo">
                    <h1 class="kicktitle">SiAlumni</h1>
                    <nav>

                        <!-- <button class="navbar-toggle" aria-label="Toggle navigation">
                            <i class="fa-solid fa-bars"></i>
                        </button> -->

                        <ul class="navbar-links">
                            <li><a class="btn btn-secondary" href="/login">Login</a>
                            </li>
                            <!-- <li><a href="#">Company</a></li>
                            <li><a href="#">Features</a></li>
                            <li><a href="#">Team</a></li>
                            <li><a href="#">Contact</a></li> -->
                        </ul>
                    </nav>
                </div>
            </div>
        </header>

        <div class="container ">
            <div class="row align-items-center">
                <div class="col-sm-7 col-lg-7 col-7">
                    <h1 class="jumbo">Sistem Informasi <br> Legalisir & Manajemen Alumni</h1>

                    <p class="text-white">Merupakan Sistem Informasi Pengelolaan Data Alumni & Permohonan Legalisir
                        Ijazah dan Transkrip
                        Nilai Alumni Politeknik Statistika STIS </p>

                    <a href="#intro" class="btn btn-secondary mr-sm"><i class="fa-solid"></i>Prosedur</a>

                    <!-- <a href="https://github.com/jeffbredenkamp/remedy-template/archive/refs/heads/main.zip"
                        class="btn btn-primary mr-sm"><i class="fa-solid fa-download"></i> &nbsp;Download</a> <a
                        href="https://github.com/jeffbredenkamp/remedy-template" class="btn btn-secondary"><i
                            class="fa-brands fa-github"></i> &nbsp;View on GitHub</a> -->
                </div>

                <div class="col-sm-5 col-lg-5 col-5 ">
                    <img src="img/stis.png" class="hero-img" alt="">
                </div>
            </div>
        </div>
    </section>

    <main>
        <!-- Trusted -->

        <section id="intro">
            <div class="container py-3">

                <!-- For demo purpose -->
                <div class="row text-center text-white mb-5">
                    <div class="col-lg-8 mx-auto">
                        <h1 class="display-5 jumbo">Prosedur Legalisir <br> Ijazah & Transkrip Nilai</h1>

                    </div>
                </div><!-- End -->


                <div class="row">
                    <div class="col-lg-7 mx-auto">

                        <!-- Timeline -->
                        <ul class="timeline">
                            <li class="timeline-item bg-transparent rounded ml-3 p-4 shadow">
                                <div class="timeline-arrow"></div>
                                <p class="text-small mt-2 font-weight-light">Alumni melakukan registrasi akun SiAlumni
                                    dengan melampirkan dokumen : <br>

                                    a. Untuk alumni yang masih bekerja di BPS <br>
                                    &NonBreakingSpace; i. Surat Pernyataan Atasan Langsung <br>
                                    &NonBreakingSpace;ii. SK Penempatan BPS Terakhir <br>
                                    b. Untuk alumni yang sudah tidak bekerja di BPS <br>
                                    &NonBreakingSpace;i. Surat Pernyataan Atasan Langsung <br>
                                    &NonBreakingSpace;ii. SK Lunas TGR (Tuntutan Ganti Rugi) <br>
                                </p>
                            </li>
                            <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                                <div class="timeline-arrow"></div>
                                <p class="text-small mt-2 font-weight-light">Pengajuan permohonan hanya dapat dilakukan
                                    setelah akun diverifikasi oleh petugas. Pemberitahuan registrasi berhasil atau
                                    gagal, akan diinformasikan melalui email yang telah didaftarkan

                                </p>

                            </li>
                            <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                                <div class="timeline-arrow"></div>
                                <p class="text-small mt-2 font-weight-light">Terdapat 4 menu utama pada SiAlumni, yaitu
                                    dashboard, permohonan, histori permohonan, dan profil
                                </p>
                            </li>
                            <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                                <div class="timeline-arrow"></div>
                                <p class="text-small mt-2 font-weight-light">Halaman dashboard berisi informasi data
                                    diri alumni
                                </p>
                            </li>
                            <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                                <div class="timeline-arrow"></div>
                                <p class="text-small mt-2 font-weight-light">Pada menu permohonan, terdapat 2 jenis
                                    permohonan legalisir yang dapat diajukan, yaitu legalisir ijazah dan transkrip nilai
                                </p>
                            </li>
                            <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                                <div class="timeline-arrow"></div>
                                <p class="text-small mt-2 font-weight-light">Untuk alumni yang telah minimal 4 (empat)
                                    tahun ditempatkan di BPS, dapat mengajukan legalisir ijazah dan transkrip dalam
                                    Bahasa Indonesia maupun Bahasa Inggris. Apabila alumni memerlukan legalisir ijazah
                                    dan transkrip nilai dalam Bahasa Inggris, maka perlu melampirkan bukti pendaftaran
                                    kampus luar negeri. Hasil hard copy legalisir akan diberikan sebanyak maksimal 5
                                    lembar
                                </p>
                            </li>
                            <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                                <div class="timeline-arrow"></div>
                                <p class="text-small mt-2 font-weight-light">Untuk alumni yang belum 4 (empat) tahun
                                    ditempatkan di BPS, hard copy hasil legalisir Ijazah hanya akan diberikan sebanyak 2
                                    lembar sedangkan legalisir Transkrip Nilai hanya akan diproses untuk keperluan Izin
                                    Belajar. Harap dilampirkan surat permohonan izin belajar yang disetujui oleh eselon
                                    II (wajib) dan Kepala Pusdiklat BPS (opsional) (template terlampir).</p>
                            </li>
                            <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                                <div class="timeline-arrow"></div>
                                <p class="text-small mt-2 font-weight-light">Untuk alumni lulusan Tugas Belajar Polstat
                                    STIS, tahun penempatan dihitung dari tahun lulus Tugas Belajar Polstat STIS, bukan
                                    dari tahun pengangkatan CPNS.</p>
                            </li>
                            <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                                <div class="timeline-arrow"></div>
                                <p class="text-small mt-2 font-weight-light">Metode pengambilan legalisir
                                    ijazah dan
                                    transkrip nilai oleh
                                    alumni Polstat STIS dapat dilakukan
                                    dengan cara (pilih salah satu di bawah ini) : <br>
                                    1. Dikirimkan ke email pemohon dalam bentuk hasil scan
                                    <br>
                                    2. Diambil di kampus Polstat STIS langsung oleh pemohon
                                    <br>
                                    3. Diambil di kampus Polstat STIS oleh orang lain yang
                                    telah diberi kuasa <br>
                                    4. Dikirimkan via pos
                                </p>
                            </li>
                            <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                                <div class="timeline-arrow"></div>
                                <p class="text-small mt-2 font-weight-light">Bila hasil legalisir diambil di kampus
                                    Polstat STIS oleh orang lain yang telah diberi kuasa, alumni perlu melampirkan surat
                                    kuasa
                                </p>
                            </li>
                            <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                                <div class="timeline-arrow"></div>
                                <p class="text-small mt-2 font-weight-light">Untuk hasil legalisir yang dikirimkan via
                                    pos, ongkos kirim akan ditanggung oleh Polstat STIS. Nomor resi pengiriman akan
                                    dicantumkan saat proses permohonan legalisir telah selesai

                                </p>
                            </li>
                            <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                                <div class="timeline-arrow"></div>
                                <p class="text-small mt-2 font-weight-light">Pada formulir permohonan legalisir ijazah
                                    dan transkrip nilai disediakan bagian catatan tambahan untuk menampung catatan lain
                                    dari alumni apabila dibutuhkan

                                </p>
                            </li>
                            <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                                <div class="timeline-arrow"></div>
                                <p class="text-small mt-2 font-weight-light">Setelah mengirimkan permohonan, alumni akan
                                    menerima email apabila legalisir ijazah atau transkrip nilai telah selesai diproses

                                </p>
                            </li>
                            <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                                <div class="timeline-arrow"></div>
                                <p class="text-small mt-2 font-weight-light">Alumni dapat melihat list permohonan yang
                                    telah diajukan, status permohonan, dan mengunduh hasil legalisir pada menu histori
                                    permohonan

                                </p>
                            </li>
                        </ul><!-- End -->

                    </div>
                </div>
            </div>

        </section>

        <section>
            <!-- List group with icon -->
            <div class="container">
                <div class="row ">
                    <div class="col-lg-8 mx-auto text-center my-4">
                        <h1 class="display-1 jumbo">Template Lampiran Dokumen </h1>

                    </div>
                    <div class="col-12">
                        <ul class=" list-group list-group-light">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <i class="fa fa-file mr-3"></i>
                                <div class="col-sm mr-auto w-75">
                                    <div class="fw-bold">Surat Pernyataan Atasan Langsung</div>
                                    <div class="text-muted">Surat Pernyataan yang dibuat oleh Atasan (tempat bekerja)
                                    </div>
                                </div>
                                <a href="http://stis.ac.id/media/source/1.%20surat%20permohonan%20legalisir.pdf"
                                    target=”_blank” class="btn btn-sm btn-success btn-icon-split mb-2 mx-2"
                                    aria-hidden="true">
                                    <span class="icon text-light">
                                        <i class='fas fa-download'></i>
                                    </span>
                                    <span class="text">Unduh Template</span>
                                </a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <i class="fa fa-file mr-3"></i>
                                <div class="col-sm mr-auto w-75">
                                    <div class="fw-bold">SK Penempatan BPS</div>
                                    <div class="text-muted">Apabila masih bekerja di BPS</div>
                                </div>
                                <span class="badge rounded-pill badge-primary m-2 mr-3 p-2">Tidak ada template</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <i class="fa fa-file mr-3"></i>
                                <div class="col-sm mr-auto w-75">
                                    <div class="fw-bold">SK Tunjangan Ganti Rugi (TGR) </div>
                                    <div class="text-muted">Apabila sudah tidak bekerja di BPS (Non BPS)</div>
                                </div>
                                <span class="badge rounded-pill badge-primary m-2 mr-3 p-2">Tidak ada template</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <i class="fa fa-file mr-3"></i>
                                <div class="col-sm mr-auto">
                                    <div class="fw-bold">Dokumen Penerimaan Kampus Luar Negeri
                                    </div>
                                    <div class="text-muted">Apabila alumni telah minimal 4 (empat) tahun ditempatkan di
                                        BPS
                                        memerlukan legalisir</div>
                                </div>
                                <span class="badge rounded-pill badge-primary m-2 mr-3 p-2">Tidak ada template</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <i class="fa fa-file mr-3"></i>
                                <div class="col-sm mr-auto w-75 ">
                                    <div class="fw-bold">Surat Kuasa
                                    </div>
                                    <div class="text-muted">Apabila memilih metode pengambilan hasil legalisir diambil
                                        di kampus
                                        Polstat STIS oleh orang lain yang telah diberi kuasa</div>
                                </div>
                                <a href="http://stis.ac.id/media/source/4.%20surat%20kuasa%20legalisir.docx"
                                    target=”_blank” class="btn btn-sm btn-success btn-icon-split" aria-hidden="true">
                                    <span class="icon text-light">
                                        <i class='fas fa-download'></i>
                                    </span>
                                    <span class="text">Unduh Template</span>
                                </a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <i class="fa fa-file mr-3"></i>
                                <div class="col-sm mr-auto w-75">
                                    <div class="fw-bold">Surat permohonan izin belajar yang disetujui Eselon II
                                    </div>
                                    <div class="text-muted">Apabila alumni belum 4 (empat) tahun ditempatkan di BPS
                                        mengajukan
                                        permohonan legalisir transkrip nilai</div>
                                </div>
                                <a href="http://stis.ac.id/media/source/2.%20permohonan%20ijin%20belajar%20%20(eselon%202).pdf"
                                    target=”_blank” class="btn btn-sm btn-success btn-icon-split" aria-hidden="true">
                                    <span class="icon text-light">
                                        <i class='fas fa-download'></i>
                                    </span>
                                    <span class="text">Unduh Template</span>
                                </a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <i class="fa fa-file mr-3"></i>
                                <div class="col-sm mr-auto w-75">
                                    <div class="fw-bold">Surat permohonan izin belajar yang disetujui Kepala
                                        Pusdiklat BPS
                                    </div>
                                    <div class="text-muted">Apabila alumni belum 4 (empat) tahun ditempatkan di BPS
                                        mengajukan
                                        permohonan legalisir transkrip nilai</div>
                                </div>
                                <a href="http://stis.ac.id/media/source/3.%20surat%20ijin%20belajar%20dari%20pusdiklat.pdf"
                                    target=”_blank” class="btn btn-sm btn-success btn-icon-split" aria-hidden="true">
                                    <span class="icon text-light">
                                        <i class='fas fa-download'></i>
                                    </span>
                                    <span class="text">Unduh Template</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </section>


        <section>
            <div class="container min-vh-100 d-flex justify-content-center align-items-center">
                <div class="row bg-white d-flex justify-content-center align-items-center">


                    <div class="col-sm-8">
                        <img src="img/stis.jpg" class="img-left" width="100%" alt="">
                    </div>

                    <div class="col-sm-4 ">
                        <p class="kicker">SiAlumni</p>
                        <h2>Politeknik Statistika STIS.</h2>

                        <p>Alamat: Jl. Otto Iskandardinata No.64C, RT.1/RW.4, Bidara Cina, Kecamatan Jatinegara, Kota
                            Jakarta Timur, Daerah Khusus Ibukota Jakarta 13330 <br>
                            Jam Operasional: 7:30AM - 04.00PM <br>
                            No Telepon: (021) 8191437 <br>
                            Provinsi: DKI Jakarta</p>
                        Berdiri sejak, 11 Agustus 1958 <br>

                    </div>
                </div>
            </div>
        </section>


    </main>

    <!-- Footer -->

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>