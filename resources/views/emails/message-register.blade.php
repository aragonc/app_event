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

    <h2>Bienvenido!</h2>
    <p>Sea bienvenido(a): <strong>{{ $name }}</strong> </p>

    {!! $content !!}

    <table style="border: none; width: 100%; padding: 2rem;">
        <tr>
            <td style="text-align: center">
                <a target="_blank" href="{{ $brochure }}">
                    <img src="{{ asset('img/btn_pdf.png') }}" width="200px">
                </a>
            </td>
        </tr>
    </table>

    <p>Nuestra misión es ayudarle a fortalecer tu desarrollo personal y profesional.</p>

    <p><i>Grupo Excellentia</i></p>
    <!-- FIN DE CONTENIDO -->
@endsection