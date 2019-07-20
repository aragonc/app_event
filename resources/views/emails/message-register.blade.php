@extends('emails.email')
@section('title')
@endsection
@section('content')
    <!-- CONTENIDO -->
    <h2>Bienvenido!</h2>
    <p>Sea bienvenido(a): <strong>{{ $name }}</strong> </p>

    {{ $content }}

    <table style="border: none;">
        <tr>
            <td style="text-align: center">
                <a target="_blank" href="{{ $brochure }}">
                    <img src="{{ asset('img/btn_pdf.png') }}" width="300px">
                </a>
            </td>
        </tr>
    </table>

    <p>Nuestra misión es ayudarle a fortalecer tu desarrollo personal y profesional.</p>
    <p><i>Grupo Excellentia</i></p>
    <!-- FIN DE CONTENIDO -->
@endsection