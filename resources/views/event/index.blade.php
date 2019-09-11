@extends('layouts.admin')
@section('page_title')
    Lista de eventos
@endsection
@section('actions')
    <a href="{{ route('event.create') }}" class="btn btn-success btn-sm">
        <i class="fas fa-plus"></i> Agregar
    </a>
@endsection
@section('content')
    <div class="alert alert-warning" role="alert">
        Si desea ocultar un evento, es recomendable colocarlo a "No publicado", no es recomendable borrar un evento al menos que este seguro.
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col" width="30%">Nombre</th>
                <th scope="col">Fecha</th>
                <th scope="col">Categoria</th>
                <th scope="col">Estado</th>
                <th scope="col">Fecha creación</th>
                <th scope="col" width="12%">Acciones</th>
            </tr>
            </thead>
            <tbody>

            @foreach($events as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->subtitle }} {{ $item->title }}</td>
                    <td>{{ $item->date }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('event', $item->slug) }}" class="btn btn-success btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('event.edit', $item->id) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            {!! Form::open(['route' => ['event.destroy', $item->id], 'id' => 'form-deleted-'.$item->id, 'method' => 'DELETE']) !!}
                            <button onclick="javascript:if(!confirm('Si borras el evento, los usuarios registrados también serán borrados')) return false;" data-form="form-deleted-{{$item->id}}" class="btn btn-danger deleted-btn btn-sm">
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
@endsection