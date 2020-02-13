@extends('emails.email')
@section('title')
@endsection
@section('content')
    <!-- CONTENIDO -->

    <h3>Notificación de inscripción.</h3>
    <p>El sr(a): <strong>{{ $name }}</strong> </p>
    <p>Esta solicitando informes para el evento: </p>

    <table style="padding:0; width: 100%">
        <tr>
            <td style="text-align: left; background-color: #cdcdcd;">
                Apellidos y nombres:
            </td>
            <td style="text-align: left;">
                {{ $name }}
            </td>
        </tr>
        <tr>
            <td style="text-align: left; background-color: #cdcdcd;">
                Evento:
            </td>
            <td style="text-align: left;">
                {{ $event_title }}
            </td>
        </tr>
        <tr>
            <td style="text-align: left; background-color: #cdcdcd;">
                N° de DNI:
            </td>
            <td style="text-align: left;">
                {{ $dni }}
            </td>
        </tr>
        <tr>
            <td style="text-align: left; background-color: #cdcdcd;">
                Email:
            </td>
            <td style="text-align: left;">
                {{ $email }}
            </td>
        </tr>
        <tr>
            <td style="text-align: left; background-color: #cdcdcd;">
                Pais:
            </td>
            <td style="text-align: left;">
                {{ $country }}
            </td>
        </tr>
        <tr>
            <td style="text-align: left; background-color: #cdcdcd;">
                Celular:
            </td>
            <td style="text-align: left;">
                {{ $phone }}
            </td>
        </tr>
    </table>

    <!-- FIN DE CONTENIDO -->
@endsection