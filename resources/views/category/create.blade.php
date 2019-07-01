@extends('layouts.admin')

@section('scripts_header')
@endsection

@section('page_title')
    Crear escuela académica
@endsection
@section('content')

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    {!! Form::open(['route' => 'category.store', 'files' => true]) !!}
    @include('category.partials.form')
    {!! Form::close() !!}

@endsection

@section('scripts_footer')
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
@endsection