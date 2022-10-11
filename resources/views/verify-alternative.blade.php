@component('mail::message')
Selamat Datang Di APL Pusat Komputer

<strong> {{ $data['important'] }}</strong>
<br><br>
{{ $data['note'] }}
<br><br>
{{ $data['content'] }}
<br><br>
@component('mail::button', ['url' => $data['url']])
Buat Pengaduan
@endcomponent


Terima Kasih,<br>
{{ config('app.name') }}
@endcomponent
