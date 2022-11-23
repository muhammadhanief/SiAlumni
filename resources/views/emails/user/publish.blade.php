@component('mail::message')
# Halo {{ $data['name'] }},
<h2>Legalisir {{ $data['jenis']}} yang Anda ajukan sudah selesai</h2><br>
Anda dapat mendownload hasil legalisir melalui aplikasi SiAlumni. <br>
Klik tombol di bawah ini untuk melanjutkan ke aplikasi SiAlumni <br>
@component('mail::button', ['url' => 'http://localhost:8000/login'])
SiAlumni
@endcomponent
<br>
Terima Kasih,<br>
{{ config('app.name') }}
@endcomponent