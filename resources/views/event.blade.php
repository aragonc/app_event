@extends('layouts.view')

@section('css')
    <style type="text/css">
        .form-register{
            background-color: {{ $event->primary_color }};
        }
        .event .date{
            background-color: {{ $event->primary_color }};
        }
        .card-accordion .card .card-header{
            background: {{ $event->primary_color }}70;
        }
        footer{
            background: {{ $event->primary_color }};
        }
        .event .direction{
            background-color: {{ $event->secondary_color }};
        }
        .btn-primary{
            background-color: {{ $event->secondary_color }};
            border-color: {{ $event->secondary_color }};
        }
        .bottom-benefits{
            background-color: {{ $event->secondary_color }};
        }
        .bottom-benefits::after{
            border-top-color: {{ $event->secondary_color }};
        }
        .card-accordion .card .card-header .btn-link .fa{
            color: {{ $event->secondary_color }};
        }
        .terms a{
            color: {{ $event->secondary_color }};
        }
    </style>
@endsection

@section('page_title')
    {{ $event->title }}
@endsection

@section('content')

<section class="banner" id="section-1" style="background-image: url('{{ Storage::url($event->image_top) }}')">
    <div class="mask"></div>
    <div class="content-flex container">
        <div class="column-a">
            <div class="event text-center">
                {{--<h3 class="subtitle">VI Congreso Nacional</h3>--}}
                <h1 class="title">{{ $event->title }}</h1>
                <div class="date"><i class="fa fa-calendar" aria-hidden="true"></i> {{ $event->date }}</div>
                <div class="direction"><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $event->place }}</div>
                <div class="contact">
                    @if($event->contact_email)
                    <span class="space">
                        <i class="fa fa-envelope" aria-hidden="true"></i> {{ $event->contact_email }}
                    </span>
                    @endif
                    @if($event->contact_email)
                    <span class="space">
                        <i class="fa fa-whatsapp" aria-hidden="true"></i>
                        {{ $event->contact_phone }}
                    </span>
                    @endif
                </div>
                <a id="scroll_bottom">
                    <div class="bottom-benefits">
                        MIRA LOS BENEFICIOS <span>AQUÍ</span>
                    </div>
                </a>

            </div>
        </div>
        <div class="column-b">
            <div class="form-static">
                @if($event->category->image)
                <div class="logo-category">
                    <img src="{{ url(Storage::url($event->category->image)) }}" alt="" class="logo_des">
                </div>

                @endif
                <div class="form-register form-top">
                    <div class="card card-register">
                        <div class="card-body">

                            @if($errors->any())
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger" role="alert">
                                        {{ $error }}
                                    </div>
                                @endforeach
                            @endif
                            @if(session('info'))
                                <div class="alert alert-success">
                                    {{ session('info') }}
                                </div>
                            @endif
                                @if($event->category->description)
                                <div class="text-description">
                                    {!! $event->category->description !!}
                                </div>
                                @endif

                            {!! Form::open(['route' => 'people.store']) !!}
                                <input type="hidden" name="event_id" value="{{ $event->id }}">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" placeholder="Nombres y Apellidos (*)" id="name_form" value="{{ old('name') }}">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="dni" placeholder="N° de documento de identidad (*)" id="dni_form" value="{{ old('dni') }}">
                                </div>

                                <div class="form-group">
                                    <select class="form-control country_select" name="country" id="country_form">
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" id="email_form" placeholder="Correo electronico (*)" value="{{ old('email') }}">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="phone" placeholder="Celular (*)" id="phone_form" value="{{ old('phone') }}">
                                </div>

                                <div class="form-group form-check">
                                    <input type="checkbox" value="yes" class="form-check-input" name="authorize" id="authorize_form">
                                    <label class="form-check-label" for="authorize_form">
                                        Autorizo a utilizar datos para los fines
                                        mencionados.
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-block btn-primary">Solicitar información</button>

                            {!! Form::close() !!}



                            <div class="terms">
                                @if($event->terms)
                                <a class="modal-terms" href="#" id="terms-modal" data-toggle="modal" data-target="#modal-terms">Ver términos y condiciones</a>
                                @endif
                                <p>(*) Campos obligatorios</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<section class="banner" id="section-2" style="background-image: url('{{ Storage::url($event->image_bottom) }}')">
    <div class="mask movil-grid"></div>
    <div class="content-flex container">
        <div class="column-a">
            <div class="event">
                <div class="accordion card-accordion" id="accordionExample">
                    @if($event->features)
                        @foreach($event->features as $feature)
                        <div class="card">
                            <div class="card-header" id="heading_{{ $feature->id }}">
                                <h2 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_{{ $feature->id }}" aria-expanded="true" aria-controls="collapse_{{ $feature->id }}">
                                        <i class="fa {{ $feature->feature_icon }} fa-2x fa-fw" aria-hidden="true"></i>
                                        {{ $feature->feature_title }}
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse_{{ $feature->id }}" class="collapse" aria-labelledby="heading_{{ $feature->id }}" data-parent="#accordionExample">
                                <div class="card-body">
                                    {!! $feature->feature_content !!}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                    
                </div>
            </div>
        </div>
        <div class="column-b">
            <div id="people-form" class="form-static">
                @if($event->category->image)
                    <div class="logo-category">
                        <img src="{{ url(Storage::url($event->category->image)) }}" alt="" class="logo_des">
                    </div>
                @endif
                <div class="form-register form-bottom">
                    <div class="card card-register">
                        <div class="card-body">
                            @if($errors->any())
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger" role="alert">
                                        {{ $error }}
                                    </div>
                                @endforeach
                            @endif
                            @if(session('info'))
                                <div class="alert alert-success">
                                    {{ session('info') }}
                                </div>
                            @endif
                            @if($event->category->description)
                                <div class="text-description">
                                    {!! $event->category->description !!}
                                </div>
                            @endif
                            {!! Form::open(['route' => 'people.store']) !!}
                            <input type="hidden" name="event_id" value="{{ $event->id }}">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Escriba su nombres y apellidos (*)" name="name" id="name" value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="N° de documento de identidad (*)" name="dni" id="dni" value="{{ old('dni') }}">
                            </div>

                            <div class="form-group">
                                <select class="form-control country_select" name="country" id="country">
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Escriba su correo electronico (*)" id="email" value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Escriba su celular (*)" name="phone" id="phone" value="{{ old('phone') }}">
                            </div>

                            <div class="form-group form-check">
                                <input type="checkbox" value="yes" class="form-check-input" name="authorize" id="authorize">
                                <label class="form-check-label" for="authorize">
                                    Autorizo a utilizar datos para los fines
                                    mencionados.
                                </label>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary">Solicitar información</button>

                            {!! Form::close() !!}

                            <div class="terms">
                                @if($event->terms)
                                    <a class="modal-terms" href="#" id="terms-modal" data-toggle="modal" data-target="#modal-terms">Ver términos y condiciones</a>
                                @endif
                                <p>(*) Campos obligatorios</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('terms')
    {!! $event->terms !!}
@endsection

@section('scripts_footer')
    <script>
        $(document).ready(function(){
            $.getJSON('{{ asset('js/countrys.json') }}', function(data){
                var out = '<option>--- SELECCIONA UN PAIS ---<option>';
               for(var i = 0; i < data.length; i++) {
                    out += '<option value="'+data[i]+'">' +
                        data[i]
                        + '</option>';
                }
                $('.country_select').html(out);
            });
        });
    </script>
@endsection