<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-8">
                        <h2 class="footer-heading mb-4">A propos</h2>
                        <p>
                            Bullao propose des locations de spa et jacuzzi à domicile sur le secteur de Paris et Marne-la-Vallée.
                            <br>Bullao est un nom commercial utilisé (et déposé à l'INPI) par Grégoire Conil.
                        </p>
                    </div>
                  <div class="col-md-4 ml-auto">
                      <h2 class="footer-heading mb-4">Rubriques</h2>
                      <ul class="list-unstyled">
                          <li><a href="{{ url('/') }}">Accueil</a></li>
                          <li><a href="{{ url('/reservation') }}">Réservation</a></li>
                          <li><a href="{{ url('/mentions-legales') }}">Mentions légales</a></li>
                          <li><a href="{{ url('/cgv-bullao') }}">CGV</a></li>
                      </ul>
                  </div>

                </div>
            </div>
            <div class="col-md-4 ml-auto">
                <h2 class="footer-heading mb-4">Suivez-nous !</h2>
                <a href="#about-section" class="smoothscroll pl-0 pr-3"><span class="icon-facebook"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
            </div>
        </div>
        <div class="row pt-3 mt-2 text-center">
            <div class="col-md-12">
                <div class="border-top pt-3">
                    <p class="copyright"><small>
                    Copyright &copy;{{ date('Y') }} Tous droits réservés - Bullao - Grégoire Conil
                    </small></p>
                </div>
            </div>

        </div>
    </div>
</footer>
