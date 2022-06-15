@component('mail::message')
Selamat Datang Di APPELA PUSKOM

{{ $data['content'] }}

@component('mail::button', ['url' => $data['url']])
Buat Pengaduan
@endcomponent

Terima Kasih,<br>
{{ config('app.name') }}
@endcomponent
