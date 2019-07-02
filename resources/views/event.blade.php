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
            background: {{ $event->primary_color }};
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
    </style>
@endsection

@section('page_title')
    Dashboard
@endsection

@section('content')

<section class="banner" id="section-1" style="background-image: url('{{ Storage::url($event->image_top) }}')">
    <div class="mask"></div>
    <div class="content-flex container">
        <div class="column-a">
            <div class="event text-center">
                {{--<h3 class="subtitle">VI Congreso Nacional</h3>--}}
                <h1 class="title">{{ $event->title }}</h1>
                <div class="date">{{ $event->date }}</div>
                <div class="direction">{{ $event->place }}</div>
                <a href="#section-2">
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
                    <img src="{{ Storage::url($event->category->image) }}" alt="" class="logo_des">
                </div>
                @endif
                <div class="form-register">
                    <div class="card card-register">
                        <div class="card-body">
                            {!! Form::open(['route' => 'client.store']) !!}
                                <input type="hidden" name="event_id" value="{{ $event->id }}">
                                <div class="form-group">
                                    <label for="name">Nombres y Apellidos (*)</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="dni">DNI (*)</label>
                                    <input type="text" class="form-control" name="dni" id="dni" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="email">Correo electronico (*)</label>
                                    <input type="text" class="form-control" name="email" id="email" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Celular (*)</label>
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="">
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

                            @if(session('info'))
                                <div class="alert alert-success">
                                    {{ session('info') }}
                                </div>
                            @endif

                            <div class="terms">
                                <a class="modal-terms" href="#" id="terms-modal" data-toggle="modal" data-target="#modal-terms">Ver términos y condiciones</a>
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
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="fa fa-file-text-o fa-2x fa-fw" aria-hidden="true"></i>
                                    Tématica
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                {!! $event->thematic !!}
                            </div>
                        </div>
                    </div>
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

                                {{ $event->contact_email }}
                                {{ $event->contact_phone }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="column-b">

        </div>
    </div>
</section>
@endsection