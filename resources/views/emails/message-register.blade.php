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

    <p>Hola: <strong>{{ $name }}</strong> </p>

    {!! $content !!}

    @if($school)
    <table style="padding:0; width: 100%">
        <tr>
            <td style="text-align: center;">
                <img src="{{ url(Storage::url($school)) }}"/>
            </td>
        </tr>
    </table>
    @endif

    <!-- FIN DE CONTENIDO -->
@endsection