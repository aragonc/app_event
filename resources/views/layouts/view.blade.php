<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @yield('css')
    @yield('scripts_header')

    <title>@yield('page_title')</title>
</head>
<body>

<header>
    <a href="{{ setting('app_url') }}">
        <img src="{{ Storage::url(setting('app_logo')) }}" class="img-fluid">
    </a>
</header>

<main>
    @yield('content')
</main>

<footer>
    © Todos los Derechos Reservados 2019
</footer>

<!-- Modal Terms -->
<div class="modal fade" id="modal-terms" tabindex="-1" role="dialog" aria-labelledby="modal-terms-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-terms-label">Terminos y condiciones</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @yield('terms')
            </div>
        </div>
    </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="{{ asset('js/popper.min.js') }}" defer></script>
<script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
<script>
    $(document).ready(function(){
        $('#scroll_bottom').click(function(){
            $("html, body").animate({
                scrollTop : $(window).height()
            },1200);
        });
    });
</script>
</body>
</html>