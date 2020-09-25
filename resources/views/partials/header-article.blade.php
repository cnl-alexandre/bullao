<div id="overlayer"></div>
<div class="loader">
    <div class="spinner-border text-primary" role="status">
        <span class="sr-only">Chargement...</span>
    </div>
</div>

<div class="site-wrap"  id="home-section">

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a href="mailto: {{ env('SUPPORT_EMAIL') }}" class="text-white">
                        <span class="mr-2 text-white icon-envelope-open-o"></span> <span class="d-none d-md-inline-block">{{ env('SUPPORT_EMAIL') }}</span>
                    </a>
                    <span class="mx-md-2 d-inline-block"></span>
                    <a href="tel: {{ env('SUPPORT_PHONE') }}" class="text-white">
                        <span class="mr-2 text-white icon-phone"></span> <span class="d-none d-md-inline-block">{{ env('SUPPORT_PHONE') }}</span>
                    </a>
                    <div class="float-right">
                        <a href="#" class="text-white"><span class="mr-2 text-white icon-facebook"></span> <span class="d-none d-md-inline-block">Facebook</span></a>
                        <span class="mx-md-2 d-inline-block"></span>
                        <a href="#" class="text-white"><span class="mr-2 text-white icon-instagram"></span> <span class="d-none d-md-inline-block">Instagram</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <header class="site-navbar js-sticky-header site-navbar-target" role="banner">
        <div class="container">
            <div class="row align-items-center position-relative">
                <div class="site-logo">
                  <a href="#" class="text-black"><span class="text-primary">Bullao</a>
                </div>
                <div class="col-12">
                    <nav class="site-navigation text-right ml-auto " role="navigation">
                        <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                            <li><a href="{{ url('/#home-section') }}" class="nav-link">Bonjour</a></li>
                            <li><a href="{{ url('/#services-section') }}" class="nav-link">Concept</a></li>
                            <li><a href="{{ url('/#pricing-section') }}" class="nav-link">Tarifs</a></li>
                            <li><a href="{{ url('/#faq-section') }}" class="nav-link">FAQ</a></li>

                            <li><a href="{{ url('/#contact-section') }}" class="nav-link">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="toggle-button d-inline-block d-lg-none">
                    <a href="#" class="site-menu-toggle py-5 js-menu-toggle text-black">
                        <span class="icon-menu h3"></span>
                    </a>
                </div>
            </div>
        </div>
    </header>
