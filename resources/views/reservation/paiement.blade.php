@extends('layouts.stripe')

@section('pageTitle', 'Paiement | '.env('APP_NAME'))

@section('content')

<section>
    <div class="container" style="max-width: 380px; margin: 22vh auto auto auto;">
        <div class="" style="text-align: center;">
            <img src="{{ url('/medias/img/logo-bleu.svg')}}" alt="" style="width:250px;">
        </div>

        <div class="" style="text-align: center;">
            <img src="{{ url('/medias/img/paiement-stripe.jpg')}}" alt="" style="width:380px;">
        </div>

        <div style="background-color: #fff;border-radius: .25rem;padding: .2rem .5rem;text-align: center">
            <p class="font-size-14">
                {{ $reservation->reservation_spa_libelle }}
                <br>Du {{ $reservation->DateDebut->format('d/m/Y') }} au {{ $reservation->DateFin->format('d/m/Y') }}
                <br>Montant total : {{ $reservation->reservation_montant_total }}€
            </p>
        </div>

        <form action="{{ url('/reservation/paiement') }}" method="post" id="payment-form" style="margin-top: 3vh;">
            {{ csrf_field() }}
            <div class="form-row" >
                <div id="errors"></div>
                <label for="card-element" class="font-size-14">
                  Carte de paiement
                </label>
                <div id="card-element">
                  <!-- A Stripe Element will be inserted here. -->
                </div>
                <input id="cardholder-name" type="text" class="cardholder-name" placeholder="Nom du titulaire" maxlength="100">
                <!-- Used to display form errors. -->
                <div id="card-errors" role="alert"></div>
            </div>
            <input type="hidden" name="reservation_id" value="{{ $reservation->reservation_id }}">
            <div class="col-6 text-left">
                <a href="{{ url('/') }}" class="btn btn-secondary btn-md text-white">Annuler</a>
            </div>
            <div class="col-6 text-right">
                <button id="card-button" type="button" data-secret="<?= $intent['client_secret'] ?>" style="color: #fff;background-color: #007bff;border-color: #007bff;margin-top: 35px; margin-left: 30%; margin-right: 30%; width: 40%; height: 40px;cursor: pointer;border-radius: .25rem;">Payer la réservation</button>
            </div>
        </form>
    </div>
</section>

<script type="text/javascript">

// On instancie Stripe et on lui passe notre clé publique
let stripe = Stripe('{{ env("STRIPE_API_KEY") }}');

// Initialise les éléments du formulaire
let elements = stripe.elements();

// Définit la redirection en cas de succès du paiement
let redirect = "{{ url('/reservation/paiement-accepte') }}";

// Récupère l'élément qui contiendra le nom du titulaire de la carte
let cardholderName = document.getElementById('cardholder-name');

// Récupère l'élement button
let cardButton = document.getElementById('card-button');

// Récupère l'attribut data-secret du bouton
let clientSecret = cardButton.dataset.secret;

// Crée les éléments de carte et les stocke dans la variable card
let card = elements.create("card");

card.mount("#card-element");

card.addEventListener('change', function(event) {
    // On récupère l'élément qui permet d'afficher les erreurs de saisie
    let displayError = document.getElementById('card-errors');

    // Si il y a une erreur
    if (event.error) {
        // On l'affiche
        displayError.textContent = event.error.message;
    } else {
        // Sinon on l'efface
        displayError.textContent = '';
    }
});

cardButton.addEventListener('click', () => {
    // On envoie la promesse contenant le code de l'intention, l'objet "card" contenant les informations de carte et le nom du client
    stripe.handleCardPayment(
        clientSecret, card, {
            payment_method_data: {
                billing_details: {name: cardholderName.value}
            }
        }
    ).then(function(result) {
        // Quand on reçoit une réponse
        if (result.error) {
            // Si on a une erreur, on l'affiche
            document.getElementById("errors").innerText = result.error.message;
        } else {
            // Sinon on redirige l'utilisateur
            document.location.href = redirect;
        }
    });
});

</script>

@endsection
