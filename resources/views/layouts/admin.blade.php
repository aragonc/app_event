<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/admin/admin.css') }}" rel="stylesheet">
    @yield('css')
    @yield('scripts_header')
</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">
    <!-- SIDEBAR -->
@include('admin.sidebar')
<!-- END SIDEBAR -->

    <!-- CONTENT WRAPPER -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- MAIN CONTENT -->
        <div id="content">
            <!-- HEADER -->
        @include('admin.header')
        <!-- END HEADER -->

            <!-- CONTENT PAGE -->
            <div class="container-fluid">
                <h1 class="h3 mb-4 text-gray-800">
                    @yield('page_title')
                </h1>

                @if(session('info'))
                    <div class="alert alert-success">
                        {{ session('info') }}
                    </div>
                @endif

                @if(count($errors))
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card shadow mb-4">
                    @hasSection('actions')
                        <div class="card-header py-3">
                            <div class="toolbar-actions">
                                @yield('actions')
                            </div>
                        </div>
                    @endif
                    <div class="card-body">
                        @yield('content')
                    </div>
                </div>

            </div>
            <!-- END CONTENT PAGE -->

            <!-- FOOTER -->
        @include('admin.footer')
        <!-- END FOOTER -->

        </div>
        <!-- END MAIN CONTENT -->
    </div>
    <!-- END CONTENT WRAPPER -->
</div>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
<!-- Scripts -->
<!-- Scripts -->
<script src="{{ asset('js/admin.js') }}"></script>
<script src="{{ asset('vendor/sweetalert2/dist/sweetalert2.js') }}"></script>
<script src="{{ asset('js/script.js') }}" defer></script>
<script type="text/javascript">
    //Dialog for deleted item row table

    $(document).ready(function() {
        $('.deleted-btn').click(function(e) {
            e.preventDefault();

            var formURL = $(this).attr("data-form");
            warnBeforeRedirect(formURL);
        });
        function warnBeforeRedirect(formURL) {
            Swal.fire({
                title: "{{ __('Warning') }}",
                text: "{{ __('You want to delete the selection') }}",
                type: "warning",
                showCancelButton: true,
                cancelButtonText: "{{ __('Cancel') }}"
            }).then(function(isConfirm) {
                if (isConfirm.value === true) {
                    $('#'+formURL).submit();
                }
            });
        }
    });
</script>

@yield('scripts_footer')
</body>
</html>