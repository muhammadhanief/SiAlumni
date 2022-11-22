@component('mail::message')
# Halo {{ $data['name'] }} ,
Akun anda sedang dalam proses verifikasi petugas <br>
Berikut Informasi Detail Akun Anda: <br>
Email : {{ $data['email'] }}
Password : {{ $data['password'] }} <br>

Tunggu notifikasi selanjutnya agar Anda dapat menggunakan layanan aplikasi SiAlumni
<br>
Terima Kasih,<br>
{{ config('app.name') }}
@endcomponent