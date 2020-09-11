@extends('layouts.app')

@section('pageTitle', 'Accueil | '.env('APP_NAME'))

@section('content')

<div class="owl-carousel slide-one-item">
    <div class="site-section-cover overlay img-bg-section" style="background-image: url({{ url('medias/img/hero_3.jpg') }}); " >
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-12 col-lg-7">
                    <h1 data-aos="fade-up" data-aos-delay="">Prenez le temps de vous détendre</h1>
                    <p class="mb-5" data-aos="fade-up" data-aos-delay="100">Découvrez Bullao : Location de spa - jaccuzi<br>à Marne-la-Vallée</p>
                    <!-- <p data-aos="fade-up" data-aos-delay="200"><a href="#" class="btn btn-outline-white border-w-2 btn-md">Get in touch</a></p> -->
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="site-section-cover overlay img-bg-section" style="background-image: url({{ url('medias/img/hero_2.jpg') }}); " >
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-12 col-lg-8">
                    <h1 data-aos="fade-up" data-aos-delay="">New Generation of Mining</h1>
                    <p class="mb-5" data-aos="fade-up" data-aos-delay="100">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est odit dolorum voluptates!</p>
                    <p data-aos="fade-up" data-aos-delay="200"><a href="#" class="btn btn-outline-white border-w-2 btn-md">Get in touch</a></p>
                </div>
            </div>
        </div>
    </div> -->
</div>

<div class="site-section">
    <div class="block__73694 mb-2" id="services-section">
        <div class="container">
            <div class="row d-flex no-gutters align-items-stretch">
                <div class="col-12 col-lg-6 block__73422" style="background-image: url({{ url('medias/img/img_1.jpg') }});" data-aos="fade" data-aos-delay="">
                </div>
                <!-- <img class="col-12 col-lg-6 block__73422" src="{{ url('medias/img/img_1.jpg') }}" alt="" data-aos="fade-up" data-aos-delay=""> -->
                <div class="col-lg-5 ml-auto p-lg-5 mt-4 mt-lg-0" data-aos="fade" data-aos-delay="">
                    <h2 class="mb-3 text-black">Soirée détente à remous et à domicile</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus id dignissimos nemo minus perspiciatis ullam itaque voluptas iure vero, nesciunt unde odit aspernatur distinctio, maiores facere officiis. Cum, esse, iusto?</p>
                    <p>Minus perspiciatis ullam itaque voluptas iure vero, nesciunt unde odit aspernatur distinctio, maiores facere officiis. Cum, esse, iusto?</p>
                    <ul class="ul-check primary list-unstyled mt-5">
                        <li>Lorem ipsum dolor.</li>
                        <li>Quod, amet. Provident.</li>
                        <li>Quo, adipisci, quis.</li>
                        <li>Cumque perspiciatis, blanditiis?</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="block__73694">
        <div class="container">
            <div class="row d-flex no-gutters align-items-stretch">
                <div class="col-12 col-lg-6 block__73422 order-lg-2" style="background-image: url({{ url('medias/img/img_2.jpg') }});" data-aos="fade" data-aos-delay="">
                </div>
                <div class="col-lg-5 mr-auto p-lg-5 mt-4 mt-lg-0 order-lg-1" data-aos="fade" data-aos-delay="">
                    <h2 class="mb-3 text-black">Réservez-le pour une occasion (ou non)</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus id dignissimos nemo minus perspiciatis ullam itaque voluptas iure vero, nesciunt unde odit aspernatur distinctio, maiores facere officiis. Cum, esse, iusto?</p>
                    <p>(Ciblage) Notre service se propose tout aussi bien pour les particuliers comme les professionnels à Marne-la-Vallée pour l'instant.</p>
                    <ul class="ul-check primary list-unstyled mt-5">
                        <li>Lorem ipsum dolor.</li>
                        <li>Quod, amet. Provident.</li>
                        <li>Quo, adipisci, quis.</li>
                        <li>Cumque perspiciatis, blanditiis?</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="">
                <div class="block__35630">
                    <div class="icon mb-3">
                        <span class="flaticon-mining"></span>
                    </div>
                    <h3 class="mb-3">Réservation</h3>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur dolores voluptas obcaecati quo consequuntur mollitia facilis.
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="block__35630">
                    <div class="icon mb-3">
                        <span class="flaticon-gold-ingots"></span>
                    </div>
                    <h3 class="mb-3">Installation</h3>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur dolores voluptas obcaecati quo consequuntur mollitia facilis.
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="block__35630">
                    <div class="icon mb-3">
                        <span class="flaticon-wagon"></span>
                    </div>
                    <h3 class="mb-3">Hygiène</h3>
                    Les jacuzzis ainsi que les accessoires sont nettoyés et désinfectés après chaque utilisation pour vous assurer une qualité de prestation propre et saine.
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="">
                <div class="block__35630">
                    <div class="icon mb-3">
                        <span class="flaticon-refinery"></span>
                    </div>
                    <h3 class="mb-3">Localisation</h3>
                    Nous agissons pour le moment sur le secteur Marne-la-Vallée en priorité du fait de notre situation géographique, nous comptons desservir d'autres secteurs rapidement.
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="block__35630">
                    <div class="icon mb-3">
                        <span class="flaticon-blacksmith"></span>
                    </div>
                    <h3 class="mb-3">Personnalisation</h3>
                    Ajustez le thème de votre soirée spa ! Pour cela nous vous proposons plusieurs thèmes et nous sommes prêt à fournir une expérience sur-mesure à votre demande.
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="block__35630">
                    <div class="icon mb-3">
                        <span class="flaticon-crucible"></span>
                    </div>
                    <h3 class="mb-3">bonheur</h3>
                    Une fois votre soirée réservée, détendez-vous et on s'occupe du reste !
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-section" id="team-section">
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-md-7 text-center">
                <div class="block-heading-1" data-aos="fade-up" data-aos-delay="">
                    <h2>L'équipe</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere at delectus laudantium, deserunt, atque eveniet. Voluptatem, fuga quos rerum inventore.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up">
                <div class="block-team-member-1 text-center rounded">
                    <figure>
                        <img src="{{ url('medias/img/person_1.jpg') }}" alt="Image" class="img-fluid rounded-circle">
                    </figure>
                    <h3 class="font-size-20 text-black">Grégoire Conil</h3>
                    <span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-12 mb-3">Créateur et installateur Bullao</span>
                    <div class="block-social-1">
                        <a href="#" class="btn border-w-2 rounded primary-primary-outline--hover"><span class="icon-linkedin"></span></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="block-team-member-1 text-center rounded">
                    <figure>
                        <img src="{{ url('medias/img/person_2.jpg') }}" alt="Image" class="img-fluid rounded-circle">
                    </figure>
                    <h3 class="font-size-20 text-black">Alexandre Conil</h3>
                    <span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-12 mb-3">Prestataire Product Design</span>
                    <div class="block-social-1">
                        <a href="#" class="btn border-w-2 rounded primary-primary-outline--hover"><span class="icon-linkedin"></span></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="block-team-member-1 text-center rounded">
                    <figure>
                        <img src="{{ url('medias/img/person_1.jpg') }}" alt="Image" class="img-fluid rounded-circle">
                    </figure>
                    <h3 class="font-size-20 text-black">Ricky Fisher</h3>
                    <span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-12 mb-3">Prestataire Community Management</span>
                    <div class="block-social-1">
                        <a href="#" class="btn border-w-2 rounded primary-primary-outline--hover"><span class="icon-linkedin"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="site-section bg-light" id="pricing-section">
    <div class="container">
        <div class="row mb-5 justify-content-center text-center">
            <div class="col-md-7">
                <div class="block-heading-1" data-aos="fade-up" data-aos-delay="">
                    <h2>Nos tarifs</h2>
                    <p>La prestation se base sur un délai d'utilisation de 24h (1 soirée), pour cela nous privilégions l'installation du jacuzzi en début d'après-midi.</p>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-6 mb-4 mb-lg-0 col-lg-4" data-aos="fade-up" data-aos-delay="" style="margin-left: auto;margin-right: 0;">
                <div class="pricing">
                    <h3 class="text-center text-black">1 soirée</h3>
                    <div class="price text-center mb-4 ">
                        <span><span>90€</span></span>
                    </div>
                    <ul class="list-unstyled ul-check success mb-5">
                        <li>Spa intex 4 places</li>
                        <li>Spot lumineux led</li>
                        <li class="remove">Filtration neuve</li>
                        <li class="remove">Livraison et installation à domicile</li>
                    </ul>
                    <p class="text-center">
                        <a href="#" class="btn btn-primary btn-md text-white">Buy Now</a>
                    </p>
                </div>
            </div>
            <div class="col-md-6 mb-4 mb-lg-0 col-lg-4" data-aos="fade-up" data-aos-delay="100" style="margin-left: 0;margin-right: auto;">
                <div class="pricing">
                    <h3 class="text-center text-black">1 soirée XL</h3>
                    <div class="price text-center mb-4 ">
                        <span><span>130€</span></span>
                    </div>
                    <ul class="list-unstyled ul-check success mb-5">
                        <li>Spa intex 6 places</li>
                        <li>Spot lumineux led</li>
                        <li class="remove">Filtration neuve</li>
                        <li class="remove">Livraison et installation à domicile</li>
                    </ul>
                    <p class="text-center">
                        <a href="#" class="btn btn-primary btn-md text-white">Buy Now</a>
                    </p>
                </div>
            </div>
            <!-- <div class="col-md-6 mb-4 mb-lg-0 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="pricing">
                    <h3 class="text-center text-black">Votre ambiance</h3>
                    <div class="price text-center mb-4 ">
                        <span><span>20€</span><br>à partir de</span>
                    </div>
                    <ul class="list-unstyled ul-check mb-5">
                        <li>Officia quaerat eaque neque</li>
                        <li>Lorem ipsum dolor sit amet</li>
                        <li>Lorem ipsum dolor sit amet</li>
                    </ul>
                    <p class="text-center">
                        <a href="#" class="btn btn-secondary btn-md">Buy Now</a>
                    </p>
                </div>
            </div> -->
        </div>
        <div class="row site-section" id="faq-section">
            <div class="col-12 text-center" data-aos="fade">
                <h2 class="section-title text-primary">Encore un doûte ?</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
              <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
                  <h3 class="text-black h4 mb-4">Can I accept both Paypal and Stripe?</h3>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam assumenda eum blanditiis perferendis.</p>
              </div>
              <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
                  <h3 class="text-black h4 mb-4">What available is refund period?</h3>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam assumenda eum blanditiis perferendis.</p>
              </div>
              <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
                  <h3 class="text-black h4 mb-4">Can I accept both Paypal and Stripe?</h3>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam assumenda eum blanditiis perferendis.</p>
              </div>
              <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
                  <h3 class="text-black h4 mb-4">What available is refund period?</h3>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam assumenda eum blanditiis perferendis.</p>
              </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="text-black h4 mb-4">Where are you from?</h3>
                    <p>Voluptatum nobis obcaecati perferendis dolor totam unde dolores quod maxime corporis officia et. Distinctio assumenda minima maiores.</p>
                </div>
                <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="text-black h4 mb-4">What is your opening time?</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam assumenda eum blanditiis perferendis.</p>
                </div>
                <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="text-black h4 mb-4">Can I accept both Paypal and Stripe?</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam assumenda eum blanditiis perferendis.</p>
                </div>
                <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="text-black h4 mb-4">What available is refund period?</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam assumenda eum blanditiis perferendis.</p>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="site-section bg-light block-13" id="testimonials-section" data-aos="fade">
    <div class="container">
        <div class="text-center mb-5">
            <div class="block-heading-1">
                <h2>Ils ont adoré</h2>
            </div>
        </div>
        <div class="owl-carousel nonloop-block-13">
            <div>
                <div class="block-testimony-1 text-center">
                    <blockquote class="mb-4">
                        <p>&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem, fugit excepturi sapiente voluptatum nulla odio quaerat quibusdam tempore similique doloremque veritatis et cupiditate, maiores cumque repudiandae explicabo tempora deserunt consequuntur?&rdquo;</p>
                    </blockquote>
                    <figure>
                        <img src="{{ url('medias/img/person_4.jpg') }}" alt="Image" class="img-fluid rounded-circle mx-auto">
                    </figure>
                    <h3 class="font-size-20 text-black">Ricky Fisher</h3>
                </div>
            </div>
            <div>
                <div class="block-testimony-1 text-center">
                    <figure>
                        <img src="{{ url('medias/img/person_2.jpg') }}" alt="Image" class="img-fluid rounded-circle mx-auto">
                    </figure>
                    <h3 class="font-size-20 mb-4 text-black">Ken Davis</h3>
                    <blockquote class="mb-4">
                        <p>&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem, fugit excepturi sapiente voluptatum nulla odio quaerat quibusdam tempore similique doloremque veritatis et cupiditate, maiores cumque repudiandae explicabo tempora deserunt consequuntur?&rdquo;</p>
                    </blockquote>
                </div>
            </div>
            <div>
                <div class="block-testimony-1 text-center">
                  <blockquote class="mb-4">
                      <p>&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem, fugit excepturi sapiente voluptatum nulla odio quaerat quibusdam tempore similique doloremque veritatis et cupiditate, maiores cumque repudiandae explicabo tempora deserunt consequuntur?&rdquo;</p>
                  </blockquote>
                  <figure>
                      <img src="{{ url('medias/img/person_1.jpg') }}" alt="Image" class="img-fluid rounded-circle mx-auto">
                  </figure>
                  <h3 class="font-size-20 text-black">Mellisa Griffin</h3>
                </div>
            </div>
            <div>
                <div class="block-testimony-1 text-center">
                  <figure>
                      <img src="{{ url('medias/img/person_3.jpg') }}" alt="Image" class="img-fluid rounded-circle mx-auto">
                  </figure>
                  <h3 class="font-size-20 mb-4 text-black">Robert Steward</h3>
                  <blockquote class="mb-4">
                      <p>&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem, fugit excepturi sapiente voluptatum nulla odio quaerat quibusdam tempore similique doloremque veritatis et cupiditate, maiores cumque repudiandae explicabo tempora deserunt consequuntur?&rdquo;</p>
                  </blockquote>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-section" id="blog-section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <div class="block-heading-1" data-aos="fade-up" data-aos-delay="">
                    <span>Les articles</span>
                    <h2>Nous sommes renseignés</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="">
                <div>
                    <a href="single.html" class="mb-4 d-block"><img src="{{ url('medias/img/hero_2.jpg') }}" alt="Image" class="img-fluid rounded"></a>
                    <h2><a href="single.html">How To Find Gold In Mining</a></h2>
                    <p class="text-muted mb-3 text-uppercase small"><span class="mr-2">January 18, 2019</span> By <a href="single.html" class="by">James Cooper</a></p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat et suscipit iste libero neque. Vitae quidem ducimus voluptatibus nemo cum odio ab enim nisi, itaque, libero fuga veritatis culpa quis!</p>
                    <p><a href="single.html">Read More</a></p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <div>
                    <a href="single.html" class="mb-4 d-block"><img src="{{ url('medias/img/hero_3.jpg') }}" alt="Image" class="img-fluid rounded"></a>
                    <h2><a href="single.html">How To Find Gold In Mining</a></h2>
                    <p class="text-muted mb-3 text-uppercase small"><span class="mr-2">January 18, 2019</span> By <a href="single.html" class="by">James Cooper</a></p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat et suscipit iste libero neque. Vitae quidem ducimus voluptatibus nemo cum odio ab enim nisi, itaque, libero fuga veritatis culpa quis!</p>
                    <p><a href="single.html">Read More</a></p>
                </div>
            </div>

        </div>
    </div>
</div>


<div class="site-section bg-light" id="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5" data-aos="fade-up" data-aos-delay="">
                <div class="block-heading-1">
                    <span>Get In Touch</span>
                    <h2>Contact Us</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 mb-5" data-aos="fade-up" data-aos-delay="100">
                <form action="#" method="post">
                    <div class="form-group row">
                        <div class="col-md-6 mb-4 mb-lg-0">
                            <input type="text" class="form-control" placeholder="First name">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="First name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="Email address">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <textarea name="" id="" class="form-control" placeholder="Write your message." cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 ml-auto">
                            <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Send Message">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 ml-auto" data-aos="fade-up" data-aos-delay="200">
                <h2 class="text-black">Need to know more on details. Get In Touch</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, distinctio! Harum quibusdam nisi, illum nulla aspernatur aut quidem aperiam, quae non tempora recusandae voluptatibus fugit impedit.</p>
                <p><a href="#" class="btn btn-primary text-white">Get Started</a></p>
            </div>
        </div>
    </div>
</div>

@endsection
