
@extends('layouts.admin')

@section('page_title')
    Dashboard
@endsection

@section('content')

    <div class="row">
        <div class="col-md-2">
            <div class="tool">
                <a href="{{ route('category.index') }}">
                    <img width="64px" src="{{ asset('img/svg/folder.svg') }}" class="tool-icon">
                    <h6 class="tool-title">
                        Categoria
                    </h6>
                </a>
            </div>
        </div>
        <div class="col-md-2">
            <div class="tool">
                <a href="{{ route('event.index') }}">
                    <img width="64px" src="{{ asset('img/svg/events.svg') }}" class="tool-icon">
                    <h6 class="tool-title">
                        Eventos
                    </h6>
                </a>
            </div>
        </div>
        <div class="col-md-2">
            <div class="tool">
                <a href="{{ route('people.index') }}">
                    <img width="64px" src="{{ asset('img/svg/person.svg') }}" class="tool-icon">
                    <h6 class="tool-title">
                        Registros
                    </h6>
                </a>
            </div>
        </div>
        <div class="col-md-2">
            <div class="tool">
                <a href="{{ route('setting') }}">
                    <img width="64px" src="{{ asset('img/svg/setting.svg') }}" class="tool-icon">
                    <h6 class="tool-title">
                        Ajustes
                    </h6>
                </a>
            </div>
        </div>
        <div class="col-md-2">
            <div class="tool">
                <a href="{{ route('user.index') }}">
                    <img width="64px" src="{{ asset('img/svg/users.svg') }}" class="tool-icon">
                    <h6 class="tool-title">
                        Usuarios
                    </h6>
                </a>
            </div>
        </div>
    </div>

@endsection