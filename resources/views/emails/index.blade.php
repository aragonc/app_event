@extends('layouts.admin')
@section('page_title')
    Lista de mensajes
@endsection
@section('actions')
    <a href="{{ route('email.create') }}" class="btn btn-success btn-sm">
        <i class="fas fa-plus"></i> Agregar
    </a>
@endsection
@section('content')

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titulo</th>
                <th width="40%" scope="col">Evento</th>
                <th scope="col">Banner</th>
                <th scope="col">Fecha creación</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($emails as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->title }}</td>
                    <td>
                        @if($item->description)
                            {!! $item->description !!}
                        @else
                            Sin descripción
                        @endif
                    </td>
                    <td>
                        @if($item->image)
                            <img width="250px" src="{{ Storage::url($item->image) }}"  class="img-fluid"/>
                        @else
                            No asignado
                        @endif
                    </td>

                    <td>{{ $item->created_at }}</td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('email.edit', $item->id) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            {!! Form::open(['route' => ['email.destroy', $item->id], 'id' => 'form-deleted-'.$item->id, 'method' => 'DELETE']) !!}
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