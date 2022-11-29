@component('mail::message')
# Halo {{ $data['user'] }},
<h2>Legalisir {{ $data['jenis']}} Terkonfirmasi Oleh WADIR I</h2><br>
Wadir I telah mengonfirmasi permohonan legalisir ijazah/transkrip nilai oleh alumni {{ $data['name'] }}. <br>
Proses legalisir telah selesai, petugas BAAK dapat mengupload dan mempublish hasil legalisir
ijazah/transkrip nilai.<br><br>
Klik tombol di bawah ini untuk melanjutkan ke aplikasi SiAlumni <br>
@component('mail::button', ['url' => 'http://localhost:8000/login'])
SiAlumni
@endcomponent
<br>
Terima Kasih,<br>
{{ config('app.name') }}
@endcomponent