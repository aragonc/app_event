@extends('layouts.admin')
@section('page_title')
    Ajustes de sistemas
@endsection
@section('actions')

@endsection
@section('content')
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Configuración</th>
                <th scope="col">Valor</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($settings as $item)
                <tr>
                    <th scope="row">{{ $item->display_text }}</th>
                    <td>{{ $item->value }}</td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('setting.edit', $item->id) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            {!! Form::close() !!}
                        </div>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection