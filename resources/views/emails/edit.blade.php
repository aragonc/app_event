@extends('layouts.admin')
@section('page_title')
    Editar mensaje
@endsection
@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    {!! Form::model($email,['route' => ['category.update', $email->id],
    'method' => 'PUT', 'files' => true]) !!}
    @include('emails.partials.form')
    {!! Form::close() !!}

@endsection

@section('scripts_footer')
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
@endsection