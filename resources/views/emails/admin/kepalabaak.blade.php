@component('mail::message')
# Halo {{ $data['user'] }},
<h2>Konfirmasi Permohonan Legalisir {{ $data['jenis']}}</h2><br>
Petugas BAAK telah mengonfirmasi permohonan legalisir ijazah/transkrip nilai oleh alumni {{ $data['name'] }}.
Mohon lakukan konfirmasi lebih lanjut untuk meneruskan proses legalisir.<br>
Klik tombol di bawah ini untuk melanjutkan ke aplikasi SiAlumni <br>
@component('mail::button', ['url' => 'http://localhost:8000/login'])
SiAlumni
@endcomponent
<br>
Terima Kasih,<br>
{{ config('app.name') }}
@endcomponent