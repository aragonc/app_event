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

    @if($brochure)
    <table style="border: none; width: 100%; padding: 2rem;">
        <tr>
            <td style="text-align: center">
                <p>Por favor haga clic en el siguiente botón:</p>
                <a target="_blank" href="{{ $brochure }}">
                    <img src="{{ asset('img/btn_pdf.png') }}" width="200px">
                </a>
                <p style="font-style: italic">Por1 favor no responder a este correo, en breve nos estaremos comunicando contigo</p>
            </td>
        </tr>
    </table>
    @endif

    <table style="padding:0; width: 100%">
        <tr>
            <td style="text-align: center;">
                <img src="{{ url(Storage::url($school)) }}"/>
            </td>
        </tr>
    </table>

    <!-- FIN DE CONTENIDO -->
@endsection