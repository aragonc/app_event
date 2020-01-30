@extends('layouts.admin')
@section('page_title')
    Lista de clientes
@endsection
@section('actions')
    <a href="{{ route('excel') }}" class="btn btn-success btn-sm">
        <i class="fas fa-plus"></i> Exportar a Excel
    </a>
@endsection
@section('content')

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col" >Email / Télefono</th>
                <th scope="col">País</th>
                <th scope="col">Evento</th>
                <th scope="col">Autorización</th>
                <th scope="col">Fecha de registro</th>
                <th scope="col" width="10%">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($peoples as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>
                        <strong>{{ $item->name }}</strong><br>
                        {{ $item->dni }}
                    </td>
                    <td>
                        {{ $item->email }}<br>
                        {{ $item->phone }}
                    </td>
                    <td>{{ $item->country }}</td>
                    <td>{{ $item->event->title }}</td>
                    <td>{{ $item->authorize }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <div class="actions">
                            {{--<a href="{{ route('people.edit', $item->id) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-pencil-alt"></i>
                            </a>--}}
                            {!! Form::open(['route' => ['people.destroy', $item->id], 'id' => 'form-deleted-'.$item->id, 'method' => 'DELETE']) !!}
                            <button onclick="javascript:if(!confirm('¿Estas seguro que deseas borra el registro?')) return false;" data-form="form-deleted-{{$item->id}}" class="btn btn-danger deleted-btn btn-sm">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            {!! Form::close() !!}
                        </div>

                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    {{ $peoples->links() }}
@endsection