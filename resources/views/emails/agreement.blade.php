@component('mail::message')
Perjanjian Awal Kerjasama

Hai {{ Auth::user()->name }}, balas email ini untuk mengkonfirmasi kerjasama awal,<br>
adapaun bentuk kerjasama adalah sebagai berikut:<br><br>

1. <br>
2.<br>
3.<br>

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
