@component('mail::message')

# Permohonan Legalisir {{ $data['jenis']}} Baru<br>
Terdapat permohonan legalisir ijazah/transkrip nilai baru oleh {{ $data['name'] }}. <br>
Harap segera memeriksa kelengkapan dokumen yang dibutuhkan untuk melanjutkan ke proses berikutnya. <br>
Klik tombol di bawah ini untuk melanjutkan ke aplikasi SiAlumni <br>
@component('mail::button', ['url' => 'http://localhost:8000/login'])
SiAlumni
@endcomponent
<br>
Terima Kasih,<br>
{{ config('app.name') }}
@endcomponent