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
        //Session::put('libelle', $request->libelle);
        //Session::put('prix', $request->prix);

        return view('reservation.cadeau.commande')->with([
            'action'        => url('/cartecadeau/offrir/submit'),
            'libelle'       => $request->libelle,
            'prix'          => $request->prix
        ]);
    }

    public function creationCarteSubmit(Request $request)
    {
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $longueurMax = strlen($caracteres);
        $code = '';
        for ($i = 0; $i < 12; $i++){
            $code .= $caracteres[rand(0, $longueurMax - 1)];
        }

        $carte         = new Cadeau;
        $carte->create($request, $code);

        Session::put('carte', $carte);

        return redirect('/cartecadeau/paiement');
    }

    public function paiement()
    {
        $carte = Cadeau::Find(Session::get('carte')->cadeau_id);

        // Intention de paiement
        \Stripe\Stripe::setApiKey(env('STRIPE_API_SECRET'));

        $intent = \Stripe\PaymentIntent::create([
            'amount' => $carte->cadeau_montant*100,
            'currency' => 'eur',
            'receipt_email' => 'cnl.alexandre@gmail.com',
        ]);

        $carte->cadeau_payment_id = $intent->id;
        $carte->save();

        return view('reservation.cadeau.paiement')->with([
            'carte'         => $carte,
            'intent'        => $intent
        ]);
    }

    public function paiementSubmit(Request $request)
    {
        $carte = Cadeau::Find($request->cadeau_id);
    }

    public function success()
    {
        $carte = Session::get('carte');

        $client = Client::Find($carte->cadeau_id);

        $r = Cadeau::Find($carte->cadeau_id);
        $r->cadeau_paye = 1;
        $r->save();

        Session::put('carte', $r);

        $carte = Session::get('carte');

        // // Mail destiné au client
        Mail::send('emails.customer.confirmationCarte', ['carte' => $carte], function($mess) use ($carte){
            $mess->from(env('MAIL_EMAIL'));                         // Mail de départ Bullao contact@bullao.fr
            $mess->to(Session::get('clientEmail'));          // Mail du client
            $mess->subject('Bullao : confirmation de réservation');
        });

        // // Mail destiné aux Admins
        Mail::send('emails.system.confirmationCarte', ['carte' => $carte], function($mess){
            $mess->from(env('MAIL_EMAIL'));                         // Mail de départ Bullao contact@bullao.fr
            $mess->to(env('MAIL_ADMIN'));                           // Mail de l'admin
            // $mess->cc('contact@bullao.fr');
            $mess->subject('Bullao : Nouvelle réservation !');
        });

        Session::forget('carte');

        return view('reservation.paiement-accepte')->with([]);
    }

}
