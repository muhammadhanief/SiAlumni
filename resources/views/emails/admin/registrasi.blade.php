@component('mail::message')
# Terdapat akun baru yang register kedalam aplikasi SiAlumni<br>
Harap selalu waspada dan berhati-hati dalam mengonfirmasi akun baru yang mendaftar. <br>
Pastikan akun tersebut benar-benar mengisi seluruh field dengan benar! termasuk surat-surat yang dibutuhkan untuk
mengonfirmasi akun. <br>
Klik tombol di bawah ini untuk melanjutkan ke aplikasi SiAlumni <br>
@component('mail::button', ['url' => 'http://localhost:8000/login'])
SiAlumni
@endcomponent
<br>
Terima Kasih,<br>
{{ config('app.name') }}
@endcomponent