@extends('layouts.article')

@section('pageTitle', 'Mentions légales | '.env('APP_NAME'))

@section('content')

<div class="site-section-cover overlay inner-page bg-light" style="background-image: url('images/hero_3.jpg')" data-aos="fade">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-lg-10">
                <div class="box-shadow-content">
                    <div class="block-heading-1">
                        <span class="d-block mb-3 text-white"  data-aos="fade-up">1er Octobre 2020</span>
                        <h1 class="mb-4" data-aos="fade-up" data-aos-delay="100" style="font-size: 28px;">Mentions légales</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto blog-content">
                <p class="lead">Vous trouverez ici toutes les mentions légales concernant l'activité de Bullao</p>
                <br>

                <p><b>Édition</b></p>
                <blockquote><p>
                    Bullao
                    <br>
                    Responsable : Grégoire Conil
                    <br>
                    Siège social : 19 chemin de la porte verte, Montévrain 77144
                    <br>
                    Contact : gregoireconil@bullao.fr
                    <br>
                    Téléphone : 0628826954
                    <br>
                    Siret : 889 969 010
                </p></blockquote>
                <p>
                    "Bullao" est une marque déposée à l'INPI sous le numéro national n°101010101011.
                    <br>
                    Adresses web : bullao.fr + www.bullao.fr
                </p>
                <br>

                <p><b>Propriété et reproduction</b></p>
                <p>
                    Les textes, images animées ou fixes, sons, savoir-faire, dessins, graphismes, vidéos et tous autres éléments composant ce site web sont de l’utilisation exclusive de Bullao d'organisation et des représentants de la marque Bulle d'un soir. Toute reproduction totale ou partielle de ce site, par quelque procédé que ce soit, sans autorisation préalable de Bullao d'organisation et des représentants de Bulle d'un soir est interdite et constituerait une infraction sanctionnée par les articles L335-2 et suivants du Code de la propriété intellectuelle. Les liens hypertextes mis en place dans le cadre du présent site web en direction d’autres ressources présentes sur le réseau internet, ne sauraient engager la responsabilité de Bullao d'organisation.
                </p>
                <br>

                <p><b>Données personnelles</b></p>
                <p>
                    Aucune information personnelle n’est collectée à votre insu ni cédée à des tiers. Vous disposez d’un droit d’accès, de rectification et d’opposition aux données vous concernant que vous pouvez exercer en complétant le formulaire de contact en suivant ce lien ou en envoyant un courrier électronique à l’adresse suivante : contact@bullao.fr
                </p>
                <br>

                <p><b>Statistiques</b></p>
                <p>
                  En vue d’adapter le site aux demandes de ses visiteurs, nous mesurons le nombre de visites, le nombre de pages vues ainsi que l’activité des visiteurs sur le site. Google Analytics, l’outil de statistiques utilisé par Bullao d'organisation génère un cookie avec un identifiant unique. Pour connaître les règles de confidentialité de Google Analytics, veuillez suivre ce lien.
                </p>
                <br>

            </div>
        </div>
    </div>
</section>

@endsection
