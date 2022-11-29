@component('mail::message')
# Halo {{ $data['name'] }},
# Permohonan Legalisir {{$jenis}} Baru<br>
Terdapat permohonan legalisir {{$jenis}} baru
oleh {{ $data['user'] }}. <br>
Harap segera memeriksa kelengkapan dokumen yang dibutuhkan untuk melanjutkan ke proses berikutnya. <br>
Klik tombol di bawah ini untuk melanjutkan ke aplikasi SiAlumni <br>
@component('mail::button', ['url' => 'http://localhost:8000/login'])
SiAlumni
@endcomponent
<br>
Terima Kasih,<br>
{{ config('app.name') }}
@endcomponent