<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Indisponibilite;
use App\Spa;
use App\Pack;
use App\Accessoire;
use Illuminate\Http\Request;
use App\Reservation;
use Illuminate\Support\Facades\Session;

class ReservationController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function reservation($nbPlace = 4)
    {
        $indispos       = Indisponibilite::where('indisponibilite_date', '>=', date('Y-m-d'))->get();
        $spas           = Spa::where('spa_nb_place', '=', $nbPlace)->orderby('spa_id', 'ASC')->get();
        $packs          = Pack::orderby('pack_id', 'ASC')->get();
        $accessoires    = Accessoire::orderby('accessoire_id', 'ASC')->get();

        // $spaArray = [];
        // foreach($spas as $spa)
        // {
        //     array_push($spaArray, array($spa['spa_id'], $spa['spa_libelle'], $spa['spa_chemin_img'], $spa['spa_desc'], ));
        // }
            
        /*$stripe = new Stripe("sk_test_6dFJV0K9YSFiZuS75WB1ghOg00mprdTsla");
        $charge = $stripe->charges()->create([
            'amount' => '1000',
            'currency' => 'EUR',
            'source' => [
                'object'    => 'card',
                'name'      => "Jérémy Lémont",
                'number'    => "4242424242424242",
                'cvc'       => "123",
                'exp_month' => "10",
                'exp_year'  => "2021"
            ]
        ]);*/


        //$stripe = new \Stripe\StripeClient(env('STRIPE_API_SECRET'));

        // Création d'un nouveau client sur Stripe
        /*$customer = $stripe->customers->create([
            'description' => 'Jérémy Lémont',
            'email' => 'jerem-lem@hotmail.fr',
            'payment_method' => 'pm_card_visa',
        ]);*/

        /*$payment = $stripe->charges->create([
            'amount'            => 9000,
            'currency'          => 'eur',
            'source'            => 'card_1HVNN8Ae5yGeW8UltnY8y7Tm',
            'description'       => 'Spa Navy 4 places',
            'customer'          => 'cus_I5YS3QuQBxM4uy'
        ]);

        echo '<pre>';
        var_dump($payment);
        echo '<pre>';*/

        /*\Stripe\Stripe::setApiKey(env('STRIPE_API_SECRET'));

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => 'Spa Navy 6 places',
                    ],
                    'unit_amount' => 13000,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => url('/reservation/paiement-accepte'),
            'cancel_url' => url('/reservation/paiement-refuse'),
        ]);
        
        echo $session;*/

        return view('reservation')->with([
            'indispos'      => $indispos,
            'spas'          => $spas,
            'packs'         => $packs,
            'accessoires'   => $accessoires
        ]);
    }

    public function reservationSubmit(Request $request)
    {
        /*$this->validate($request,[
            'daterange'         => 'required',
            'spa'               => 'required',
            'emplacement'       => 'required',
            'installation'      => 'required',
            'name'              => 'required',
            'email'             => 'required',
            'phone'             => 'required',
            'adresse1'          => 'required',
            'ville'             => 'required',
            'cp'                => 'required'
        ]);*/

        $reservation                            = new Reservation;
        $reservation->create($request);

        Session::put('reservation', $reservation->reservation_id);
        return redirect('/reservation/paiement');
    }
}
