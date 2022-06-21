@component('mail::message')
<h3>{{ $data['header'] }}</h3>

<p>{{ $data['content'] }}</p>

<p>{{ $data['status'] }}</p>


Terima Kasih,<br>
{{ config('app.name') }}
@endcomponent
