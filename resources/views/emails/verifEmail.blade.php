@component('mail::message')
# Halo {{ $data['name'] }},
Akun SiAlumni Anda telah Terverifikasi. <br>
Sekarang Anda dapat mengajukan permohonan untuk legalisir ijazah dan transkrip nilai. <br>
Klik tombol di bawah ini untuk melanjutkan ke aplikasi SiAlumni <br>
@component('mail::button', ['url' => 'http://localhost:8000/login'])
SiAlumni
@endcomponent
<br>
Terima Kasih,<br>
{{ config('app.name') }}
@endcomponent