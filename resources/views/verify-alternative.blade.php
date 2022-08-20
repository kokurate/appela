@component('mail::message')
Selamat Datang Di APL Pusat Komputer

{{ $data['content'] }}

@component('mail::button', ['url' => $data['url']])
Buat Pengaduan
@endcomponent

Terima Kasih,<br>
{{ config('app.name') }}
@endcomponent
