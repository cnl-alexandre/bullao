<nav class="navbar navbar-expand-lg navbar-light pt-3 pb-3 header-style fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ url('/medias/img/logo.svg') }}" class="header-logo" alt="Logo agence immobilière mf-immo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link">Accueil</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/annonces/vente') }}" class="nav-link">Acheter</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/agence/estimation') }}" class="nav-link">Estimer</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/annonces/location') }}" class="nav-link">Louer</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/agence/contact') }}" class="nav-link">Contacter</a>
                </li>
                <li>
                    <div class="opinion-system-widget-company-rating" data-os-company-id="10538" style="margin-left: 20px ;width: max-content;"></div>
                </li>
            </ul>
        </div>
    </div>
</nav>
