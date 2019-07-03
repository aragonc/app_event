@extends('layouts.admin')
@section('page_title')
    Editar configuración
@endsection
@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    {!! Form::model($setting,['route' => ['setting.update', $setting->id],
    'method' => 'PUT', 'files' => true]) !!}
    @include('setting.partials.form')
    {!! Form::close() !!}

@endsection

@section('scripts_footer')

@endsection