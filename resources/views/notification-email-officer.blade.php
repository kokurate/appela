@component('mail::message')
<h2>Pemberitahuan kepada petugas</h2>

{{ $data['content'] }}

@component('mail::button', ['url' => $data['url']])
Cek Pengaduan
@endcomponent

Terima Kasih,<br>
{{ config('app.name') }}
@endcomponent