@extends('layouts.admin')
@section('page_title')
    Editar evento
@endsection
@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    {!! Form::model($event,['route' => ['event.update', $event->id],
    'method' => 'PUT', 'files' => true]) !!}
    @include('event.partials.form')
    {!! Form::close() !!}

@endsection

@section('scripts_footer')
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
@endsection