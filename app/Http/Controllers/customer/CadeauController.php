<?php
namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Client;
use App\Cadeau;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CadeauController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function presentation()
    {
        return view('reservation.cadeau.presentation')->with([]);
    }

    public function creationCarte(Request $request)
    {
        if(isset($request->libelle)){
            return view('reservation.cadeau.commande')->with([
                'action'        => url('/cartecadeau/offrir/submit'),
                'libelle'       => $request->libelle,
                'prix'          => $request->prix
            ]);
        }
        else {
            return redirect('/cartecadeau');
        }
    }

    public function creationCarteSubmit(Request $request)
    {
        if(isset($request->email)){
            $carte         = new Cadeau;
            $carte->create($request);

            Session::put('carte', $carte->cadeau_id);

            return redirect('/cartecadeau/paiement');
        }
        else {
            return redirect('/cartecadeau');
        }

    }

    public function paiement()
    {

        if(Session::get('carte')){
            $carte = Cadeau::Find(Session::get('carte'));

            // Intention de paiement
            \Stripe\Stripe::setApiKey(env('STRIPE_API_SECRET'));

            $intent = \Stripe\PaymentIntent::create([
                'amount' => $carte->cadeau_montant*100,
                'currency' => 'eur',
                'receipt_email' => $carte->clientPaiement->client_email
            ]);

            $carte->cadeau_payment_id = $intent->id;
            $carte->save();

            return view('reservation.cadeau.paiement')->with([
                'carte'         => $carte,
                'intent'        => $intent
            ]);
        }
        else {
            return redirect('/cartecadeau');
        }

    }

    public function success()
    {
        if(Session::get('carte')){
            $carte = Cadeau::Find(Session::get('carte'));
            $carte->cadeau_paye = 1;
            $datePaie = date('Y-m-d');
            $carte->cadeau_date_paie = $datePaie;
            $carte->save();

            // Mail destiné au client
            Mail::send('emails.customer.confirmationCarte', ['carte' => $carte], function($mess) use ($carte){
                $mess->from(env('MAIL_EMAIL'));                         // Mail de départ Bullao contact@bullao.fr
                $mess->to($carte->clientPaiement->client_email);          // Mail du client
                $mess->subject('Bullao : confirmation de réservation');
            });

            // Mail destiné aux Admins
            Mail::send('emails.system.confirmationCarte', ['carte' => $carte], function($mess){
                $mess->from(env('MAIL_EMAIL'));                         // Mail de départ Bullao contact@bullao.fr
                $mess->to(env('MAIL_ADMIN'));                           // Mail de l'admin
                // $mess->cc('contact@bullao.fr');
                $mess->subject('Bullao : Nouvelle réservation !');
            });

            Session::forget('carte');

            return view('reservation.cadeau.paiement-accepte')->with([]);
        }
        else {
            return redirect('/cartecadeau');
        }
    }

}
