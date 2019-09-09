@extends('layouts.admin')
@section('page_title')
    Editar usuario
@endsection
@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    {!! Form::model($user,['route' => ['user.update', $user->id],
    'method' => 'PUT', 'files' => true]) !!}
    @include('user.partials.form')
    {!! Form::close() !!}

@endsection
