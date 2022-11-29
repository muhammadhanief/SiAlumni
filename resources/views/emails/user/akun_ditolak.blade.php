@component('mail::message')
# Halo {{ $data['name'] }}, <br>
Akun SiAlumni Anda belum dapat diverifikasi. <br>
Sekarang Anda belum dapat mengajukan permohonan untuk legalisir ijazah dan transkrip nilai. <br><br>
Klik tombol di bawah ini untuk melanjutkan ke aplikasi SiAlumni untuk melakukan registrasi ulang <br>
@component('mail::button', ['url' => 'http://localhost:8000/login'])
SiAlumni
@endcomponent
<br>
Terima Kasih,<br>
{{ config('app.name') }}
@endcomponent