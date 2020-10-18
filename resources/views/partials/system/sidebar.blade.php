<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/administration/dashboard') }}">
        <div class="sidebar-brand-icon">
        <i class="fas fa-home"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ env('APP_NAME') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/administration/dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Tableau de bord</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Réservations
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/administration/reservations/list') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Récapitulatif</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Produits
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/administration/produits/spas/list') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Spas</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/administration/produits/packs/list') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Packs</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('administration/produits/accessoires/list') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Accessoires</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Utilisateurs
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/administration/administrateurs/list') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Administrateurs</span>
        </a>
    </li>

    <!--<hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>-->

</ul>
