@extends('layouts.admin')
@section('page_title')
    Lista de usuarios del sistema
@endsection
@section('actions')
    <a href="{{ route('user.create') }}" class="btn btn-success btn-sm">
        Crear usuarios
    </a>
@endsection
@section('content')

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Fecha de registro</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('user.edit', $item->id) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            {!! Form::open(['route' => ['user.destroy', $item->id], 'id' => 'form-deleted-'.$item->id, 'method' => 'DELETE']) !!}
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
@endsection