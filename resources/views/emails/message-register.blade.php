@extends('emails.email')
@section('title')
@endsection
@section('content')
    <!-- CONTENIDO -->
    <h2>Bienvenido!</h2>
    <p>Hola, <strong>{{ $name }}</strong> gracias por registrarte para pedir información sobre nuestro evento
        <strong>Congreso de Secretarias 2019</strong>, en breve le estaremos enviado información sobre el evento
        y un representante se comunicara con usted</p>
    <p>Atentamente</p>
    <p><i>Grupo Excellentia</i></p>
    <!-- FIN DE CONTENIDO -->
@endsection