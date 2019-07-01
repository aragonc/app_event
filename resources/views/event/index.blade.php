@extends('layouts.admin')
@section('page_title')
    Lista de eventos
@endsection
@section('actions')
    <a href="{{ route('event.create') }}" class="btn btn-success btn-sm">
        <i class="fas fa-plus"></i> Agregar Evento
    </a>
@endsection
@section('content')

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Fecha</th>
                <th scope="col">Lugar</th>
                <th scope="col">Categoria</th>
                <th scope="col">Estado</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($events as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->subtitle }} {{ $item->title }}</td>
                    <td>{{ $item->date }}</td>
                    <td>{{ $item->place }}</td>
                    <td>{{ $item->category_id }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('event', $item->slug) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-eye"></i>
                                Publicado
                            </a>
                            <a href="{{ route('event.edit', $item->id) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            {!! Form::open(['route' => ['event.destroy', $item->id], 'id' => 'form-deleted-'.$item->id, 'method' => 'DELETE']) !!}
                            <button data-form="form-deleted-{{$item->id}}" class="btn btn-danger deleted-btn btn-sm">
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