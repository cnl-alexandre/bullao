@extends('layouts.tunnel')

@section('pageTitle', 'Réservation | '.env('APP_NAME'))

@section('content')

<!-- <section class="site-section bg-light pb-4" id="pricing-section">
    <div class="container">
        <div class="row mt-5 d-flex justify-content-center">
            <div class="align-self-center">
                <img src="{{ url('medias/img/pictos/reservation-on.png') }}" alt="">
                <img src="{{ url('medias/img/pictos/separator-off.png') }}" class="separator" alt="">
                <img src="{{ url('medias/img/pictos/livraison-off.png') }}" alt="">
                <img src="{{ url('medias/img/pictos/separator-off.png') }}" class="separator" alt="">
                <img src="{{ url('medias/img/pictos/paiement-off.png') }}" alt="">
            </div>
        </div>
    </div>
</section> -->

<form class="" action="{{ $action }}" method="post">

    {{ csrf_field() }}

    <div class="site-section tunnel-achat bg-light" id="spas-section">
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <div class="col-md-8 mt-2">
                    <div class="block-heading" data-aos="fade-up" data-aos-delay="">
                        <h2 class="h2-reservation">À propos des dates</h2>
                        <p><a href="{{ url('/reservation/dates') }}" style="">Du {{ $reservation->dateDebut->format('d/m') }} au {{ $reservation->dateFin->format('d/m') }}</a> - <a href="{{ url('/reservation/spas') }}"> {{ $reservation->spa_libelle }}</a></p>
                        Heure de pose souhaité du spa le {{ $reservation->dateDebut->format('d/m') }} ?
                        <div class="row d-flex justify-content-start btn-group btn-group-toggle radio-custom mb-2" data-toggle="buttons" required>
                            <label for="heures" class="btn btn-radio-custom col-lg-3 col-md-3 col-3 mb-1 heures">
                                <input type="radio" name="heures" class="heures" value="08:00">
                                <div class="block-team-member-1 text-center rounded" style="padding: 14px 5px 8px 5px;">
                                    <p class="font-size-15" style="color: #525252;">08:00</p>
                                </div>
                            </label>
                            <label for="HeureInstall" class="btn btn-radio-custom col-lg-3 col-md-3 col-3 mb-1 heures">
                                <input type="radio" name="HeureInstall" class="HeureInstall" value="09:00">
                                <div class="block-team-member-1 text-center rounded"  style="padding: 14px 5px 8px 5px;">
                                    <p class="font-size-15" style="color: #525252;">09:00</p>
                                </div>
                            </label>
                            <label for="HeureInstall" class="btn btn-radio-custom col-lg-3 col-md-3 col-3 mb-1 heures">
                                <input type="radio" name="HeureInstall" class="HeureInstall" value="09:00">
                                <div class="block-team-member-1 text-center rounded"  style="padding: 14px 5px 8px 5px;">
                                    <p class="font-size-15" style="color: #525252;">10:00</p>
                                </div>
                            </label>
                            <label for="HeureInstall" class="btn btn-radio-custom col-lg-3 col-md-3 col-3 mb-1 heures">
                                <input type="radio" name="HeureInstall" class="HeureInstall" value="08:00">
                                <div class="block-team-member-1 text-center rounded" style="padding: 14px 5px 8px 5px;">
                                    <p class="font-size-15" style="color: #525252;">11:00</p>
                                </div>
                            </label>
                            <label for="HeureInstall" class="btn btn-radio-custom col-lg-3 col-md-3 col-3 mb-1 heures">
                                <input type="radio" name="HeureInstall" class="HeureInstall" value="09:00">
                                <div class="block-team-member-1 text-center rounded"  style="padding: 14px 5px 8px 5px;">
                                    <p class="font-size-15" style="color: #525252;">12:00</p>
                                </div>
                            </label>
                            <label for="HeureInstall" class="btn btn-radio-custom col-lg-3 col-md-3 col-3 mb-1 heures">
                                <input type="radio" name="HeureInstall" class="HeureInstall" value="09:00">
                                <div class="block-team-member-1 text-center rounded"  style="padding: 14px 5px 8px 5px;">
                                    <p class="font-size-15" style="color: #525252;">13:00</p>
                                </div>
                            </label>
                            <label for="HeureInstall" class="btn btn-radio-custom col-lg-3 col-md-3 col-3 mb-1 heures">
                                <input type="radio" name="HeureInstall" class="HeureInstall" value="09:00">
                                <div class="block-team-member-1 text-center rounded"  style="padding: 14px 5px 8px 5px;">
                                    <p class="font-size-15" style="color: #525252;">14:00</p>
                                </div>
                            </label>
                            <label for="HeureInstall" class="btn btn-radio-custom col-lg-3 col-md-3 col-3 mb-1 heures">
                                <input type="radio" name="HeureInstall" class="HeureInstall" value="08:00">
                                <div class="block-team-member-1 text-center rounded" style="padding: 14px 5px 8px 5px;">
                                    <p class="font-size-15" style="color: #525252;">15:00</p>
                                </div>
                            </label>
                            <label for="HeureInstall" class="btn btn-radio-custom col-lg-3 col-md-3 col-3 mb-1 heures">
                                <input type="radio" name="HeureInstall" class="HeureInstall" value="09:00">
                                <div class="block-team-member-1 text-center rounded"  style="padding: 14px 5px 8px 5px;">
                                    <p class="font-size-15" style="color: #525252;">16:00</p>
                                </div>
                            </label>
                            <label for="HeureInstall" class="btn btn-radio-custom col-lg-3 col-md-3 col-3 mb-1 heures">
                                <input type="radio" name="HeureInstall" class="HeureInstall" value="09:00">
                                <div class="block-team-member-1 text-center rounded"  style="padding: 14px 5px 8px 5px;">
                                    <p class="font-size-15" style="color: #525252;">17:00</p>
                                </div>
                            </label>
                            <label for="HeureInstall" class="btn btn-radio-custom col-lg-3 col-md-3 col-3 mb-1 heures">
                                <input type="radio" name="HeureInstall" class="HeureInstall" value="">
                                <div class="block-team-member-1 text-center rounded"  style="padding: 14px 5px 8px 5px;">
                                    <p class="font-size-15" style="color: #525252;">Autre</p>
                                </div>
                            </label>
                        </div>
                        Heure de retrait souhaité du spa le {{ $reservation->dateFin->format('d/m') }} ?
                        <div class="row d-flex justify-content-start btn-group btn-group-toggle radio-custom" data-toggle="buttons" required>
                            <label for="HeureDesinstall" class="btn btn-radio-custom col-lg-3 col-md-3 col-3 mb-1 heures">
                                <input type="radio" name="HeureDesinstall" class="HeureDesinstall" value="08:00">
                                <div class="block-team-member-1 text-center rounded" style="padding: 14px 5px 8px 5px;">
                                    <p class="font-size-15" style="color: #525252;">08:00</p>
                                </div>
                            </label>
                            <label for="HeureDesinstall" class="btn btn-radio-custom col-lg-3 col-md-3 col-3 mb-1 heures">
                                <input type="radio" name="HeureDesinstall" class="HeureDesinstall" value="09:00">
                                <div class="block-team-member-1 text-center rounded"  style="padding: 14px 5px 8px 5px;">
                                    <p class="font-size-15" style="color: #525252;">09:00</p>
                                </div>
                            </label>
                            <label for="HeureDesinstall" class="btn btn-radio-custom col-lg-3 col-md-3 col-3 mb-1 heures">
                                <input type="radio" name="HeureDesinstall" class="HeureDesinstall" value="09:00">
                                <div class="block-team-member-1 text-center rounded"  style="padding: 14px 5px 8px 5px;">
                                    <p class="font-size-15" style="color: #525252;">10:00</p>
                                </div>
                            </label>
                            <label for="HeureDesinstall" class="btn btn-radio-custom col-lg-3 col-md-3 col-3 mb-1 heures">
                                <input type="radio" name="HeureDesinstall" class="HeureDesinstall" value="08:00">
                                <div class="block-team-member-1 text-center rounded" style="padding: 14px 5px 8px 5px;">
                                    <p class="font-size-15" style="color: #525252;">11:00</p>
                                </div>
                            </label>
                            <label for="HeureDesinstall" class="btn btn-radio-custom col-lg-3 col-md-3 col-3 mb-1 heures">
                                <input type="radio" name="HeureDesinstall" class="HeureDesinstall" value="09:00">
                                <div class="block-team-member-1 text-center rounded"  style="padding: 14px 5px 8px 5px;">
                                    <p class="font-size-15" style="color: #525252;">12:00</p>
                                </div>
                            </label>
                            <label for="HeureDesinstall" class="btn btn-radio-custom col-lg-3 col-md-3 col-3 mb-1 heures">
                                <input type="radio" name="HeureDesinstall" class="HeureDesinstall" value="09:00">
                                <div class="block-team-member-1 text-center rounded"  style="padding: 14px 5px 8px 5px;">
                                    <p class="font-size-15" style="color: #525252;">13:00</p>
                                </div>
                            </label>
                            <label for="HeureDesinstall" class="btn btn-radio-custom col-lg-3 col-md-3 col-3 mb-1 heures">
                                <input type="radio" name="HeureDesinstall" class="HeureDesinstall" value="09:00">
                                <div class="block-team-member-1 text-center rounded"  style="padding: 14px 5px 8px 5px;">
                                    <p class="font-size-15" style="color: #525252;">14:00</p>
                                </div>
                            </label>
                            <label for="HeureDesinstall" class="btn btn-radio-custom col-lg-3 col-md-3 col-3 mb-1 heures">
                                <input type="radio" name="HeureDesinstall" class="HeureDesinstall" value="08:00">
                                <div class="block-team-member-1 text-center rounded" style="padding: 14px 5px 8px 5px;">
                                    <p class="font-size-15" style="color: #525252;">15:00</p>
                                </div>
                            </label>
                            <label for="HeureDesinstall" class="btn btn-radio-custom col-lg-3 col-md-3 col-3 mb-1 heures">
                                <input type="radio" name="HeureDesinstall" class="HeureDesinstall" value="09:00">
                                <div class="block-team-member-1 text-center rounded"  style="padding: 14px 5px 8px 5px;">
                                    <p class="font-size-15" style="color: #525252;">16:00</p>
                                </div>
                            </label>
                            <label for="HeureDesinstall" class="btn btn-radio-custom col-lg-3 col-md-3 col-3 mb-1 heures">
                                <input type="radio" name="HeureDesinstall" class="HeureDesinstall" value="09:00">
                                <div class="block-team-member-1 text-center rounded"  style="padding: 14px 5px 8px 5px;">
                                    <p class="font-size-15" style="color: #525252;">17:00</p>
                                </div>
                            </label>
                            <label for="HeureDesinstall" class="btn btn-radio-custom col-lg-3 col-md-3 col-3 mb-1 heures">
                                <input type="radio" name="HeureDesinstall" class="HeureDesinstall" value="">
                                <div class="block-team-member-1 text-center rounded"  style="padding: 14px 5px 8px 5px;">
                                    <p class="font-size-15" style="color: #525252;">Autre</p>
                                </div>
                            </label>
                        </div>
                        <!-- <div class="form-group mb-4">
                            <label for="email">L'adresse mail :</label>
                            <input type="time" id="email" class="form-control" name="email" maxlength="100" placeholder="monadresse@email.com" required>
                            <small>Vous ne recevrez pas de spams, c'est promis !</small>
                        </div>
                        <div class="form-group mb-4">
                            <label for="etage">Heure de pose</label>
                            <select class="form-control" name="etage" id="etage" required>
                                <option value="" disabled selected hidden>Choisir</option>
                                <option value="08:00">08:00</option>
                                <option value="08:00">09:00</option>
                                <option value="08:00">10:00</option>
                                <option value="08:00">11:00</option>
                            </select>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="row d-flex flex-column justify-content-around" data-toggle="buttons">

            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-12 px-0 text-center sticky">
                    <input type="submit" name="" value="Réserver ce spa" id="btn-confirm" class="btn btn-primary btn-md text-white">
                </div>
            </div>
        </div>
    </div>

</form>

<footer style="background-color:#ffffff;">
    @include('partials.footer-tunnel')
</footer>

<script>
    $(".HeureInstall").change(function() {
        inputCheck();
    });
    $(".HeureDesinstall").change(function() {
        inputCheck();
    });

    function inputCheck() {
        if($(".HeureInstall").is(':checked') && $(".HeureDesinstall").is(':checked'))
        {
            $('#btn-confirm').attr("disabled", false);
            $('#btn-confirm').attr("title", null);
        }
        else
        {
            $('#btn-confirm').attr("disabled", true);
            $('#btn-confirm').attr("title", "Vous devez remplir toutes les informations.");
        }

    }

    $(document).ready(function() {
        $('#btn-confirm').attr("disabled", true);
        $('#btn-confirm').attr("title", "Vous devez remplir toutes les informations.");
    });
</script>

@endsection
