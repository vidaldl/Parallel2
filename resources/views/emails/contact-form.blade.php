@component('mail::message')
<h1>{{ $data['name'] }} Ha mandado un mensaje desde Tu sitio web {{ config('app.name') }}</h1>

<strong>Nombre</strong>: {{$data['name']}} <br>
<strong>Email</strong>: {{$data['email']}}<br>
<strong>Número de Telefono</strong>: {{$data['number']}} <br>
<strong>Asunto</strong>: {{$data['subject']}} <br>
<strong>Servicio</strong>: {{$data['service']}} <br>
<strong>Mensaje</strong>: <br>
<p>{{$data['message']}}</p>


Gracias por usar Parallel,<br>
Siscop Systems
@endcomponent
