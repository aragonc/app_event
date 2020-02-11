@extends('layouts.admin')
@section('page_title')
    Editar evento
@endsection
@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif




    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Evento</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="feature-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Caracteristicas del evento</a>
        </li>
    </ul>
    <div class="tab-content" id="tabs_event">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

            {!! Form::model($event,['route' => ['event.update', $event->id],
    'method' => 'PUT', 'files' => true]) !!}
            @include('event.partials.form')
            {!! Form::close() !!}

        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="feature-tab">
            <div class="add-feature">
                <button type="button" id="btn_add" class="btn btn-block btn-success" >
                    <i class="fas fa-plus"></i> {{ __('Añadir característica') }}
                </button>
            </div>
            @if(isset($event))
                <table class="table table-hover ">
                    <thead>
                    <tr class="info">
                        <th>ID </th>
                        <th>Caracteristica</th>
                        <th>Icono</th>
                        <th>Fecha de Actualización</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody id="feature-list" name="products-list">
                    @foreach ($event->features as $feature)
                        <tr id="feature_{{$feature->id}}" class="active">
                            <td>{{$feature->id}}</td>
                            <td>{{$feature->feature_title}}</td>
                            <td><i class="fa {{$feature->feature_icon}} fa-lg" aria-hidden="true"></i></td>
                            <td>{{$feature->updated_at}}</td>
                            <td width="35%">
                                <button class="btn btn-warning btn-detail open_modal" value="{{$feature->id}}">
                                    <i class="fas fa-pen"></i>
                                </button>
                                <button class="btn btn-danger btn-delete delete-product" value="{{$feature->id}}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                @include('feature.create')

            @endif

        </div>
    </div>



@endsection
@section('scripts_footer')
    <script src="{{asset('js/ajax_facture.js')}}"></script>
@endsection