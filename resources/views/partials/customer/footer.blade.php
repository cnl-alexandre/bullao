<div class="pb-2" style="background: #fafafa;">
    <div class="container">

        <div class="my-5 pt-5 footer-head">
            <div class="mb-5 mb-sm-4 mb-md-0 mb-xl-0">
                <img src="{{ url('/medias/img/logo.svg') }}" alt="Logo agence immobilière mf-immo">
            </div>
            <div style="display: flex;">
                <a href="https://www.facebook.com/pages/category/Real-Estate-Company/MF-Immobilier-770510189976690/" target="_blank"><img src="{{ url('/medias/img/fb.svg') }}" alt="Lien Facebook M&F-Immobilier" style="width: 45px;margin-right: 25px;"></a>
                <a href="https://www.instagram.com/mf_immobilier/?hl=fr" target="_blank"><img src="{{ url('/medias/img/in.svg') }}" alt="Lien Instragram M&F-Immobilier" style="width: 45px;margin-right: 25px;"></a>
                <div class="opinion-system-widget-company-rating" data-os-company-id="10538" style="width: max-content;"></div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-md-6 col-sm-6 mb-3 mx-md-0 mx-5">
                <h5>A propos de l'agence</h5>
                <p>
                    À propos de l'Agence
                    <br>
                    22 avenue Jean Jaurès
                    <br>
                    Brou-sur-Chantereine 77
                    <br>
                    (à la limite de Vaires-sur-Marne)
                    <br>
                    <br>
                    Du mardi au samedi
                    <br>
                    De 9h30 à 12h30 et 14h00 à 19h00
                </p>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-6 mb-3 mx-md-0 mx-5">
                <h5>Nos annonces de vente</h5>
                <ul>
                    <li>
                        <a href="{{ url('/annonces/vente/maison/all') }}">- Vente de maison ({{ Session::get('nbVenteMaison') }})</a>
                    </li>
                    <li>
                        <a href="{{ url('/annonces/vente/appartement/all') }}">- Vente d'appartement ({{ Session::get('nbVenteAppartement') }})</a>
                    </li>
                    <li>
                        <a href="{{ url('/annonces/vente/all/vaires-sur-marne') }}">- Vente à Vaires-sur-Marne ({{ Session::get('nbVenteVaires') }})</a>
                    </li>
                    <li>
                        <a href="{{ url('/annonces/vente/all/thorigny-sur-marne') }}">- Vente à Thorigny-sur-Marne ({{ Session::get('nbVenteThorigny') }})</a>
                    </li>
                    <li>
                        <a href="{{ url('/annonces/vente/all/brou-sur-chantereine') }}">- Vente à Brou-sur-Chantereine ({{ Session::get('nbVenteBrou') }})</a>
                    </li>
                    <li>
                        <a href="{{ url('/annonces/vente/all/lagny-sur-marne') }}">- Vente à Lagny-sur-Marne ({{ Session::get('nbVenteLagny') }})</a>
                    </li>
                </ul>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-6 mb-3 mx-md-0 mx-5">
                <h5>Découvrez notre agence</h5>
                <ul>
                    <li>
                        <a href="{{ url('/agence/presentation') }}">- Présentation</a>
                    </li>
                    <li>
                        <a href="{{ url('/agence/estimation') }}">- Estimation</a>
                    </li>
                    <li>
                        <a href="{{ url('/agence/contact') }}">- Nous contacter</a>
                    </li>
                    <li>
                        <a href="{{ url('/agence/tarification') }}">- Tarification appliquée</a>
                    </li>
                    <li>
                        <a href="{{ url('/agence/rgpd') }}">- RGPD</a>
                    </li>
                    <li>
                        <a href="{{ url('/agence/mentions') }}">- Mentions légales</a>
                    </li>
                </ul>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-6 mb-3 mx-md-0 mx-5">
                <h5>Liens externes et parutions</h5>
                <ul>
                    <li>
                        <a target="_blank" href="https://www.google.com/search?client=opera&q=m%26f+immobilier&sourceid=opera&ie=UTF-8&oe=UTF-8">- Avis Google</a>
                    </li>
                    <li>
                        <a target="_blank" href="https://www.societe.com/societe/m-f-immobilier-844678375.html">- Société.com</a>
                    </li>
                    <li>
                        <a target="_blank" href="https://www.brousurchantereine.info/wp-content/uploads/Brou-info-n%C2%B027-bd-1.pdf">- Journal de Brou-sur-Chantereine</a>
                    </li>
                    <li>
                        <a target="_blank" href="https://www.brousurchantereine.info/decouvrir-la-ville/commerces-artisans-entreprises/">- Commercant de Brou</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div>
    <div class="container">
        <p class="mt-3 mb-3 px-3 px-sm-3">
            M&F Immobilier : des annonces immobilières autour de Brou-sur-Chantereine, Vaires-sur-Marne et secteur de Lagny-sur-Marne. le site www.mf-immo.com propose des annonces de location et de vente immobilières sur Marne la Vallée. Vous trouverez de nombreuses annonces : des maisons à vendre et des annonces de ventes d'appartement.
        </p>
    </div>
</div>
