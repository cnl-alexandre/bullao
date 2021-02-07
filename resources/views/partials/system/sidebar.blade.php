<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/system/dashboard') }}">
        <div class="sidebar-brand-icon">
        <img src="{{ url('medias/img/logos/compact-blanc.svg') }}" width="40px" alt="">
        </div>
        <div class="sidebar-brand-text mx-1" style="font-size: 1.5rem;">{{ env('APP_NAME') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/system/dashboard') }}">
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
        <a class="nav-link" href="{{ url('/system/reservations/list') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Récapitulatif</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/system/cartescadeaux/list') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Cartes cadeaux</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Clientèle
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('system/clients/list') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Clients</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Produits
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/system/produits/spas/list') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Spas</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/system/produits/packs/list') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Packs</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('system/produits/accessoires/list') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Accessoires</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Paramètres
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/system/parametres/codespromo/list') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Codes Promo</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/system/parametres/indisponibilite/list') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Indisponibilité</span>
        </a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Divider -->
    <!-- <hr class="sidebar-divider"> -->
    <!-- Heading -->
    <!-- <div class="sidebar-heading">
        Utilisateurs
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/system/administrateurs/list') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Administrateurs</span>
        </a>
    </li> -->

    <!--<hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>-->

</ul>
