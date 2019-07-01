@extends('layouts.admin')

@section('scripts_header')
@endsection

@section('page_title')
    Crear evento
@endsection
@section('content')

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    {!! Form::open(['route' => 'event.store', 'files' => true]) !!}
    @include('event.partials.form')
    {!! Form::close() !!}

@endsection

@section('scripts_footer')
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
@endsection