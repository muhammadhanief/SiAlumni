<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Laravel SB Admin 2">
    <meta name="author" content="Alejandro RH">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- DataTables -->
    <link href="libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />




    <!-- Fonts -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/timeline.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link href="{{ asset('img/stis.png') }}" rel="icon" type="image/png">

</head>

<body class=" min-vh-100 d-flex justify-content-center align-items-center"
    style="background: linear-gradient(to top, #2eaafa, #1F2F98);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 col-xl-6">
                <div class="card o-hidden border-0 shadow-lg text-center">
                    <div class="card-body alert-info">
                        <div class="row m-5">
                            <div class="col-6 d-flex d-lg-block my-4 mx-auto">
                                <img src="{{ asset('img/mail.svg') }}" class="img-fluid justify-content-center p-3">
                            </div>
                            <div class="row-8">
                                <h4 class="card-title font-weight-bold ">Status Akun</h4>
                                <h6 class="card-subtitle mb-2 text-muted">Status Aktivasi akun anda :
                                    {{ Auth::user()->statusAkun }}
                                </h6>
                                <p class="card-text">Saat ini anda tidak bisa melakukan apapun. <br> Silakan tunggu
                                    notifikasi bahwa akun anda telah aktif melalui email</p>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('logout') }}" class="btn btn-danger mx-2"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Kembali
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                    <br>
                                    <a href="https://mail.google.com/mail/u/0/#inbox" class="card-link btn btn-info"
                                        target="blank">Buka
                                        Email</a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>


    </div>
</body>

</html>