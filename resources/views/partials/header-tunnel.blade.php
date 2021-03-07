<div class="site-wrap"  id="home-section">

    <div class="site-mobile-menu site-navbar-target" style="z-index: 9999999999;">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <header class="site-navbar site-navbar-target py-4 py-lg-0" role="banner" style="position: fixed;background-color: white;box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.10);z-index:999999999;">
        <div class="container my-2 my-lg-0">
            <div class="row align-items-center position-relative">
                <div class="toggle-button d-inline-block d-lg-none pl-1" style="max-width:0%;left:0;margin-top: 6px;">
                    <a href="{{ url()->previous() }}" class=" text-black mr-3">
                        <span class="icon-menu h3"></span>
                    </a>
                </div>
                <div class="site-logo"  style="margin: auto;">
                  <a href="{{ url('/') }}" class="text-black"><span class="text-primary">Bullao</a>
                </div>
                <div class="col-0 col-md-12">
                    <nav class="site-navigation text-right ml-auto " role="navigation">
                        <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                            <li><a href="{{ url('/') }}" class="nav-link">Notre concept</a></li>
                            <li><a href="{{ url('/reservation/dates') }}" class="nav-link">Réserver un spa</a></li>
                            <li><a href="{{ url('/cartecadeau') }}" class="nav-link">Carte cadeau</a></li>
                            <li><a href="{{ url('/contact') }}" class="nav-link">Nous contacter</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="toggle-button d-inline-block d-lg-none pr-1" style="margin-top: 5px;">
                    <a href="#" class="site-menu-toggle js-menu-toggle text-black">
                        <span class="icon-menu h3"></span>
                    </a>
                </div>
            </div>
        </div>
    </header>
