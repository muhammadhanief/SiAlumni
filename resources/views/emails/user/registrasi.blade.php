@component('mail::message')
# Halo {{ $data['name'] }} ,
Akun anda sedang dalam proses verifikasi petugas <br>

Tunggu notifikasi selanjutnya agar Anda dapat menggunakan layanan aplikasi SiAlumni
<br><br>
Klik tombol di bawah ini untuk melanjutkan ke aplikasi SiAlumni <br>
@component('mail::button', ['url' => 'http://localhost:8000/login'])
SiAlumni
@endcomponent
<br>
Terima Kasih,<br>
{{ config('app.name') }}
@endcomponent