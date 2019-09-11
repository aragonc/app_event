@extends('emails.email')
@section('title')
@endsection
@section('content')
    <!-- CONTENIDO -->

    <table style="padding:0; width: 100%">
        <tr>
            <td>
                <img src="{{ url(Storage::url($banner)) }}"/>
            </td>
        </tr>
    </table>

    <h3>Gracias por solicitar información.</h3>
    <p>Sea bienvenido(a): <strong>{{ $name }}</strong> </p>

    {!! $content !!}

    <p style="font-style: italic">Por favor no responder a este correo, en breve nos estaremos comunicando contigo</p>

    <table style="padding:0; width: 100%">
        <tr>
            <td style="text-align: center;">
                <img src="{{ url(Storage::url($school)) }}"/>
            </td>
        </tr>
    </table>

    <!-- FIN DE CONTENIDO -->
@endsection