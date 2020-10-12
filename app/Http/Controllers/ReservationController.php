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
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function reservationStep1($nbPlace = 4)
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

        return view('reservation.step1')->with([
            'indispos'      => $indispos,
            'spas'          => $spas,
            'packs'         => $packs,
            'accessoires'   => $accessoires,
            'nbPlace'       => $nbPlace
        ]);
    }

    public function reservationStep1Submit(Request $request)
    {
        /*$this->validate($request,[
            'daterange'         => 'required',
            'spa'               => 'required',
            'emplacement'       => 'required',
            'installation'      => 'required',
            'creneau'           => 'required',
            'name'              => 'required',
            'email'             => 'required',
            'phone'             => 'required',
            'adresse1'          => 'required',
            'ville'             => 'required',
            'cp'                => 'required'
        ]);*/

        $reservation                            = new Reservation;
        $reservation->create($request);

        Session::put('reservation', $reservation);
        return redirect('/reservation/informations');
    }

    public function reservationStep2()
    {
        $reservation = Session::get('reservation');

        return view('reservation.step2')->with([
            'reservation'   => $reservation
        ]);
    }
    
    public function reservationStep2Submit(Request $request)
    {
        /*$this->validate($request,[
            'daterange'         => 'required',
            'spa'               => 'required',
            'emplacement'       => 'required',
            'installation'      => 'required',
            'creneau'           => 'required',
            'name'              => 'required',
            'email'             => 'required',
            'phone'             => 'required',
            'adresse1'          => 'required',
            'ville'             => 'required',
            'cp'                => 'required'
        ]);*/

        /*$reservation                            = new Reservation;
        $reservation->create($request);

        Session::put('reservation', $reservation);*/
        return redirect('/reservation/paiement');
    }

    public function paiement()
    {
        $reservation = Session::get('reservation');


        // Intention de paiement
        \Stripe\Stripe::setApiKey(env('STRIPE_API_SECRET'));

        $intent = \Stripe\PaymentIntent::create([
            //'amount' => 13000,
            'amount' => $reservation->reservation_montant_total*100,
            'currency' => 'eur',
            'receipt_email' => 'cnl.alexandre@gmail.com',
        ]);

        return view('paiement')->with([
            'reservation'   => $reservation,
            'intent'        => $intent
        ]);
    }

    public function paiementSubmit(Request $request)
    {

      $reservation = Reservation::Find($request->reservation_id);

    }

    public function success()
    {

        $reservation = Session::get('reservation');
        $r = Reservation::Find($reservation->reservation_id);
        Session::put('reservation', $r);

        $reservation = Session::get('reservation');

        // var_dump($reservation->accessoires);

        // Mail destiné au client
        Mail::send('emails.confirmation', ['reservation' => $reservation], function($mess){
            $mess->from('akacocoputer@gmail.com'); // Mail de départ Bullao contact@bullao.fr
            $mess->to('cnl.alexandre@gmail.com'); // Mail du client
            // $mess->cc('jer.lemont@gmail.com');
            $mess->subject('Bullao : confirmation de réservation');
        });

        // Mail destiné aux Admins
        Mail::send('emails.confirmationAdmin', ['reservation' => $reservation], function($mess){
            $mess->from('akacocoputer@gmail.com'); // Mail de départ Bullao contact@bullao.fr
            $mess->to('cnl.alexandre@gmail.com'); // Mail du client
            $mess->cc('contact@bullao.fr');
            $mess->subject('Bullao : Nouvelle réservation !');
        });

        //Session::forget('reservation');

        return view('paiement-accepte')->with([]);
    }

    public function cancel()
    {
        return view('paiement-refuse')->with([]);
    }
}
