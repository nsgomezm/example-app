@component('mail::message')
# ¡Hola, {{ $name  }}!

Gracias por terminar el registro, Bienvenido a nuestro sistema.

{{--@component('mail::button', ['url' => ''])--}}
{{--Botón de Acción--}}
{{--@endcomponent--}}

Gracias,
{{ config('app.name') }}
@endcomponent
