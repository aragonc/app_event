<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-sidebar sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin') }}">

        {{--<div class="sidebar-logo-large">
            <img width="150px" src="{{ asset('img/logo.svg') }}">
        </div>
        <div class="sidebar-logo-mini">
            <img width="55px" src="{{ asset('img/logo_mini.svg') }}">
        </div>--}}
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">App Event</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Opciones
    </div>
    <!-- START MENU NAV -->
    {{--<li class="nav-item active">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Eventos</span>
        </a>
        <div id="collapsePages" class="collapse show" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Módulos:</h6>
                <a class="collapse-item" href="#">Usuarios</a>
                <a class="collapse-item" href="#">Anuncios</a>
                <a class="collapse-item" href="#">Categorias</a>
                <a class="collapse-item" href="#">Permisos</a>
            </div>
        </div>
    </li>--}}
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Escuela</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-table"></i>
            <span>Clientes</span></a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <!-- BOTTOM TOGGLER SIDEBAR -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>

<!-- END SIDEBAR -->
