<?php
namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Client;
use App\Cadeau;
use App\Adresse;
use App\User;
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

            Session::forget('reservation');

            $cadeau = new Cadeau;
            $cadeau->cadeau_offre            = $request->libelle;
            $cadeau->cadeau_montant          = $request->prix;
            $cadeau->cadeau_montant_restant  = $request->prix;
            Session::put('cadeau', $cadeau);

            return redirect('/cartecadeau/recap');
        }
        else {
            return redirect('/cartecadeau');
        }
    }

    public function cadeauRecap()
    {
        if(Session::get('cadeau'))
        {
            $cadeau = Session::get('cadeau');

            return view('reservation.recap')->with([
                'cadeau'        => $cadeau,
                'back'          => url('/cartecadeau'),
                'action'        => url('/cartecadeau/recap')
            ]);
        }
        else
        {
            return redirect('/cartecadeau');
        }
    }

    public function cadeauRecapSubmit(Request $request)
    {
        if(Session::get('cadeau')){

            $cadeau    = Session::get('cadeau');

            $cadeau->save();

            Session::put('cadeau', $cadeau);

            return redirect('/cartecadeau/adresse');
        }
        else
        {
            return redirect('/cartecadeau');
        }

    }

    public function cadeauAdresse()
    {
        if(Session::get('cadeau'))
        {
            $cadeau = Session::get('cadeau');

            return view('reservation.adresse')->with([
                'cadeau'        => $cadeau,
                'back'          => url('/cartecadeau/recap'),
                'action'        => url('/cartecadeau/adresse')
            ]);
        }
        else
        {
            return redirect('/cartecadeau');
        }
    }

    public function cadeauAdresseSubmit(Request $request)
    {
        $this->validate($request,[
            'adresse'               => 'required',
            'ville'                 => 'required',
            'cp'                    => 'required',
            'departement'           => 'required'
        ]);

        $cadeau = Session::get('cadeau');
        $cadeau->cadeau_rue                 = $request->adresse;
        $cadeau->cadeau_ville               = $request->ville;
        $cadeau->cadeau_cp                  = $request->cp;
        $cadeau->cadeau_departement         = $request->departement;
        $cadeau->cadeau_complement          = $request->complement;
        Session::put('cadeau', $cadeau);

        $address = new Adresse;
        $address->adresse_name              = "Principal";
        $address->adresse_rue               = $request->adresse;
        $address->adresse_cp                = $request->cp;
        $address->adresse_ville             = $request->ville;
        $address->adresse_complement        = $request->complement;
        $address->adresse_departement       = $request->departement;
        Session::put('address', $address);

        return redirect('/cartecadeau/client');
    }

    public function cadeauClient()
    {
        if(Session::get('cadeau'))
        {
            $cadeau = Session::get('cadeau');

            return view('reservation.client')->with([
                'cadeau'        => $cadeau,
                'back'          => url('/cartecadeau/adresse'),
                'action'        => url('/cartecadeau/client')
            ]);
        }
        else
        {
            return redirect('/reservation/dates');
        }
    }

    public function cadeauClientSubmit(Request $request)
    {
        $this->validate($request,[
            'name'                  => 'required',
            'email'                 => 'required',
            'phone'                 => 'required'
        ]);

        $client = new Client;
        $client->client_name        = $request->name;
        $client->client_email       = $request->email;
        $client->client_phone       = $request->phone;
        Session::put('client', $client);

        $cadeau = Session::get('cadeau');
        $cadeau->cadeau_email = $request->email;
        $cadeau->cadeau_phone = $request->phone;
        Session::put('cadeau', $cadeau);

        return redirect('/cartecadeau/confirmation');
    }

    public function cadeauConfirmation()
    {
        if(Session::get('cadeau'))
        {
            $cadeau         = Session::get('cadeau');
            $adr            = Session::get('address');
            $client         = Session::get('client');

            return view('reservation.confirmation')->with([
                'client'        => $client,
                'cadeau'        => $cadeau,
                'back'          => url('/cartecadeau/client'),
                'action'        => url('/cartecadeau/confirmation')
            ]);
        }
        else
        {
            return redirect('/cartecadeau');
        }
    }

    public function cadeauConfirmationSubmit(Request $request)
    {
        // Enregistrement du client en BDD
        $client = Session::get('client');
        $u = User::where('user_login', 'LIKE', $client->client_email)->get();
        if(count($u) == 0)
        {
            $user = new User;
            $user->user_login           = $client->client_email;
            $user->user_password        = sha1($user->randomPassword(10));
            $user->user_rank_id         = 2;
            $user->save();

            $idUser = $user->user_id;
        }
        else
        {
            $idUser = $u[0]->user_id;
        }

        $client->client_user_id       = $idUser;
        $client->save();

        // Enregistrement de l'adresse dans la BDD
        $adr = Session::get('address');
        $adr->adresse_client_id = $client->client_id;
        $adr->save();

        // Enregistrement de la réservation dans la BDD
        $cadeau = Session::get('cadeau');
        $cadeau->cadeau_client_id = $client->client_id;
        $cadeau->save();

        return redirect('/cartecadeau/paiement');
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

        if(Session::get('cadeau')){
            $cadeau = Session::get('cadeau');

            // Intention de paiement
            \Stripe\Stripe::setApiKey(env('STRIPE_API_SECRET'));

            $intent = \Stripe\PaymentIntent::create([
                'amount' => $cadeau->cadeau_montant*100,
                'currency' => 'eur',
                'receipt_email' => $cadeau->clientPaiement->client_email
            ]);

            $cadeau->cadeau_payment_id = $intent->id;
            $cadeau->save();

            return view('reservation.paiement')->with([
                'cadeau'        => $cadeau,
                'intent'        => $intent,
                'action'        => url('/cartecadeau/paiement')
            ]);
        }
        else {
            return redirect('/cartecadeau');
        }

    }

    public function success()
    {
        if(Session::get('cadeau')){
            $cadeau = Session::get('cadeau');
            $cadeau->cadeau_paye = 1;
            $datePaie = date('Y-m-d');
            $cadeau->cadeau_date_paie = $datePaie;
            $cadeau->cadeau_code = $cadeau->generateCode(10);

            $cadeau->cadeau_date_debut = $datePaie;
            $cadeau->cadeau_date_fin = date('Y-m-d', strtotime($datePaie. ' + 1 year'));

            $cadeau->save();

            // Mail destiné au client
            // Mail::send('emails.customer.confirmationCarte', ['carte' => $cadeau], function($mess) use ($cadeau){
            //     $mess->from(env('MAIL_EMAIL'));                         // Mail de départ Bullao contact@bullao.fr
            //     $mess->to($cadeau->clientPaiement->client_email);          // Mail du client
            //     $mess->subject('Bullao : confirmation de réservation');
            // });

            // Mail destiné aux Admins
            // Mail::send('emails.system.confirmationCarte', ['carte' => $cadeau], function($mess){
            //     $mess->from(env('MAIL_EMAIL'));                         // Mail de départ Bullao contact@bullao.fr
            //     $mess->to(env('MAIL_ADMIN'));                           // Mail de l'admin
            //     // $mess->cc('contact@bullao.fr');
            //     $mess->subject('Bullao : Nouvelle réservation !');
            // });

            Session::forget('cadeau');

            return view('reservation.paiement-accepte')->with([]);
        }
        else {
            return redirect('/cartecadeau');
        }
    }

}
