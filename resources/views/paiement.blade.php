@extends('layouts.stripe')

@section('pageTitle', 'Paiement | '.env('APP_NAME'))

@section('content')

<section>

</section>
<section>
    <div class="container" style="max-width: 380px; margin: 22vh auto auto auto;">
        <div class="" style="text-align: center;">
            <img src="{{ url('/medias/img/logo-bleu.svg')}}" alt="" style="width:250px;">
        </div>

        <div class="" style="text-align: center;">
            <img src="{{ url('/medias/img/paiement-stripe.jpg')}}" alt="" style="width:250px;">
        </div>

        <div style="background-color: #fff;border-radius: .25rem;padding: .2rem .5rem;text-align: center">
            <p class="font-size-14">
                Spa Sahara 4 places
                <br>28/10/2020 - 29/10/2020
                <br>Montant total : 110€
            </p>
        </div>

        <form action="/charge" method="post" id="payment-form" style="margin-top: 3vh;">
            <div class="form-row" >
                <label for="card-element" class="font-size-14">
                  Merci de renseigner votre carte
                </label>
                <div id="card-element">
                  <!-- A Stripe Element will be inserted here. -->
                </div>

                <!-- Used to display form errors. -->
                <div id="card-errors" role="alert"></div>
            </div>

            <button style="color: #fff;background-color: #007bff;border-color: #007bff;margin-top: 35px; margin-left: 30%; margin-right: 30%; width: 40%; height: 40px;cursor: pointer;border-radius: .25rem;">Payer la réservation</button>
        </form>
    </div>
</section>

<script type="text/javascript">
// Create a Stripe client.
var stripe = Stripe('pk_test_InZ0WdANQap1gA0gU1ajy69900GZ9zaHIl');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
base: {
color: '#32325d',
fontSize: '16px',
'::placeholder': {
  color: '#aab7c4'
}
},
invalid: {
color: '#fa755a',
iconColor: '#fa755a'
}
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.on('change', function(event) {
var displayError = document.getElementById('card-errors');
if (event.error) {
displayError.textContent = event.error.message;
} else {
displayError.textContent = '';
}
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
event.preventDefault();

stripe.createToken(card).then(function(result) {
if (result.error) {
  // Inform the user if there was an error.
  var errorElement = document.getElementById('card-errors');
  errorElement.textContent = result.error.message;
} else {
  // Send the token to your server.
  stripeTokenHandler(result.token);
}
});
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
// Insert the token ID into the form so it gets submitted to the server
var form = document.getElementById('payment-form');
var hiddenInput = document.createElement('input');
hiddenInput.setAttribute('type', 'hidden');
hiddenInput.setAttribute('name', 'stripeToken');
hiddenInput.setAttribute('value', token.id);
form.appendChild(hiddenInput);

// Submit the form
form.submit();
}
</script>



@endsection
