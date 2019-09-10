@extends('layouts.admin')

@section('scripts_header')
@endsection

@section('page_title')
    Crear usuario
@endsection
@section('content')

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    {!! Form::open(['route' => 'user.store', 'files' => true]) !!}
    @include('user.partials.form')
    {!! Form::close() !!}

@endsection
