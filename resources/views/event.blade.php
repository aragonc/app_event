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

                        <i class="fa fa-phone" aria-hidden="true"></i> {{ $event->contact_phone }}
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
                                    <input type="text" class="form-control" name="dni" placeholder="DNI (*)" id="dni_form" value="{{ old('dni') }}">
                                </div>

                                <div class="form-group">
                                    <select class="form-control country_select" name="country" id="country_form">
                                        <option>--- Selecciona tu pais ----</option>
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
                    @if($event->thematic)
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="fa fa-file-text-o fa-2x fa-fw" aria-hidden="true"></i>
                                    Presentación
                                </button>
                            </h2>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                {!! $event->thematic !!}
                            </div>
                        </div>
                    </div>
                    @endif
                    @if($event->schedule)
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <i class="fa fa-clock-o fa-2x fa-fw" aria-hidden="true"></i>
                                    Horario
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
                                {!! $event->schedule !!}
                            </div>
                        </div>
                    </div>
                    @endif

                    @if($event->contact)
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <i class="fa fa-envelope-o fa-2x fa-fw" aria-hidden="true"></i>
                                    Contacto
                                </button>
                            </h2>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div class="card-body">
                                {!! $event->contact !!}

                            </div>
                        </div>
                    </div>
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
                                <input type="text" class="form-control" placeholder="Escriba su DNI (*)" name="dni" id="dni" value="{{ old('dni') }}">
                            </div>

                            <div class="form-group">
                                <select class="form-control country_select" name="country" id="country">
                                    <option>--- Selecciona tu pais ----</option>
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
               var out = '<option>---- Selecciona un país ----<option>';
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