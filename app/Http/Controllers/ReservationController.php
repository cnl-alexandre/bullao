<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Indisponibilite;
use App\Spa;
use App\Pack;
use App\Accessoire;
use Illuminate\Http\Request;
use App\Reservation;
use App\Cadeau;
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
        $packs          = Pack::orderby('pack_id', 'ASC')->get();

        return view('reservation.step1')->with([
            'indispos'      => $indispos,
            'packs'         => $packs,
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

        $joursSupp = $reservation->joursSupp($request->daterange);

        Session::put('reservation', $reservation);
        Session::put('joursSupp', $joursSupp);
        return redirect('/reservation/informations');
    }

    public function reservationStep2()
    {
        if(Session::get('reservation'))
        {
            $reservation = Session::get('reservation');
            $joursSupp = Session::get('joursSupp');

            return view('reservation.step2')->with([
                'reservation'   => $reservation,
                'joursSupp'     => $joursSupp
            ]);
        }
        else
        {
            return redirect('/');
        }
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

        $reservation                            = Reservation::find($request->id);
        $reservation->create($request);

        Session::put('reservation', $reservation);
        return redirect('/reservation/paiement');
    }

    public function paiement()
    {
        $reservation = Reservation::Find(Session::get('reservation')->reservation_id);

        if(Session::get('reservation')){
            if(Session::get('montant_total') > 1){
                // Intention de paiement
                \Stripe\Stripe::setApiKey(env('STRIPE_API_SECRET'));

                $intent = \Stripe\PaymentIntent::create([
                    'amount' => $reservation->reservation_montant_total*100,
                    'currency' => 'eur',
                    'receipt_email' => $reservation->reservation_email
                ]);

                $reservation->reservation_payment_id = $intent->id;
                $reservation->save();

                return view('reservation.paiement')->with([
                    'reservation'   => $reservation,
                    'intent'        => $intent
                ]);
            }
            else{
                return redirect('/reservation/paiement-accepte');
            }
        }
        else{
            // code...
        }

    }

    // public function paiementSubmit(Request $request)
    // {
    //
    //   $reservation = Reservation::Find($request->reservation_id);
    //
    // }

    public function success()
    {
        $reservation = Session::get('reservation');

        if (Session::get('reservation')) {
            $r = Reservation::Find($reservation->reservation_id);
            $r->reservation_paye = 1;
            $r->reservation_active = 1;

            if(isset($reservation->reservation_cadeau_id) && $reservation->reservation_cadeau_id != NULL)
            {
                $carte = Cadeau::Find($reservation->reservation_cadeau_id);

                $montantRestant = 0.00;

                if($carte->cadeau_montant_restant > $reservation->reservation_montant_total) {
                    $montantRestant = $carte->cadeau_montant_restant - $reservation->reservation_montant_total;
                    $r->reservation_montant_total = 0.00;
                }
                else {
                    $montantRestant = 0.00;
                    $r->reservation_montant_total = $reservation->reservation_montant_total - $carte->cadeau_montant_restant;
                }

                $carte->cadeau_used = '1';
                $carte->cadeau_client_id_used = $reservation->reservation_client_id;
                $carte->cadeau_date_used = date('Y-m-d');
                $carte->cadeau_montant_restant = $montantRestant;
                $carte->save();
            }

            $r->save();

            if(count($reservation->accessoires) > 0)
            {
                foreach($reservation->accessoires as $rAccessoire)
                {
                    $accessoire = Accessoire::find($rAccessoire->ra_accessoire_id);
                    if($accessoire->accessoire_conso == 1)
                    {
                        $accessoire->accessoire_stock = $accessoire->accessoire_stock-1;
                        $accessoire->save();
                    }
                }
            }

            Session::put('reservation', $r);

            $reservation = Session::get('reservation');

            // Mail destiné au client
            Mail::send('emails.customer.confirmation', ['reservation' => $reservation], function($mess) use ($reservation){
                $mess->from(env('MAIL_EMAIL'));                         // Mail de départ Bullao contact@bullao.fr
                $mess->to($reservation->client->client_email);          // Mail du client
                // $mess->cc('jer.lemont@gmail.com');
                $mess->subject('Bullao : confirmation de réservation');
            });

            // Mail destiné aux Admins
            Mail::send('emails.system.confirmation', ['reservation' => $reservation], function($mess){
                $mess->from(env('MAIL_EMAIL'));                         // Mail de départ Bullao contact@bullao.fr
                $mess->to(env('MAIL_ADMIN'));                           // Mail de l'admin
                $mess->cc('contact@bullao.fr');
                $mess->subject('Bullao : Nouvelle réservation !');
            });

            Session::forget('reservation');
            Session::forget('montant_total');
            Session::forget('joursSupp');

            return view('reservation.paiement-accepte')->with([]);
        }
        else {
            return redirect('/');
        }

    }

    public function cancel()
    {
        Session::forget('reservation');
        Session::forget('joursSupp');

        return view('reservation.paiement-refuse')->with([]);
    }

    public function dateUs2Fr($date)
    {
        $split = explode("-",$date);

        $annee = $split[0];
        $mois = $split[1];
        $jour = $split[2];

        return "$jour"."/"."$mois"."/"."$annee";
    }

    public function dateFr2Us($date)
    {
        $split = explode("/",$date);

        $annee = $split[2];
        $mois = $split[1];
        $jour = $split[0];

        return "$annee"."-"."$mois"."-"."$jour";
    }
}
