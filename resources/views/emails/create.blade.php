@extends('layouts.admin')

@section('scripts_header')
@endsection

@section('page_title')
    Crear mensaje
@endsection
@section('content')

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    {!! Form::open(['route' => 'email.store', 'files' => true]) !!}
    @include('emails.partials.form')
    {!! Form::close() !!}

@endsection
