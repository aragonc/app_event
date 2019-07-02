@extends('layouts.admin')
@section('page_title')
    Lista de categorias
@endsection
@section('actions')
    <a href="{{ route('category.create') }}" class="btn btn-success btn-sm">
        <i class="fas fa-plus"></i> Agregar
    </a>
@endsection
@section('content')

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th width="40%" scope="col">Descripción</th>
                <th scope="col">Imagen</th>
                <th scope="col">Fecha creación</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->name }}</td>
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
                            <a href="{{ route('category.edit', $item->id) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            {!! Form::open(['route' => ['category.destroy', $item->id], 'id' => 'form-deleted-'.$item->id, 'method' => 'DELETE']) !!}
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