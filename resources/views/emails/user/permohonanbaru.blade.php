@component('mail::message')
# Halo {{ $data['name']}}, <br>
<h2>Permohonan Legalisir {{ $data['jenis']}} sedang diproses oleh petugas BAAK.</h2><br>
Harap menunggu untuk notifikasi selanjutnya <br><br>
Klik tombol di bawah ini untuk melanjutkan ke aplikasi SiAlumni <br>
@component('mail::button', ['url' => 'http://localhost:8000/login'])
SiAlumni
@endcomponent
<br>
Terima Kasih,<br>
{{ config('app.name') }}
@endcomponent