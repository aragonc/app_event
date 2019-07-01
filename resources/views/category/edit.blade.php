@extends('layouts.admin')
@section('page_title')
    Editar categoria
@endsection
@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    {!! Form::model($category,['route' => ['category.update', $category->id],
    'method' => 'PUT', 'files' => true]) !!}
    @include('category.partials.form')
    {!! Form::close() !!}

@endsection

@section('scripts_footer')
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
@endsection