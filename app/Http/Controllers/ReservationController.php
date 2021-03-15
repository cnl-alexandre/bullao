<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Indisponibilite;
use App\Spa;
use App\Pack;
use App\Accessoire;
use App\Adresse;
use App\Client;
use App\User;
use App\ReservationAccessoire;
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

    public function reservationDates()
    {
        Session::forget('carte');

        $indispos       = Indisponibilite::where('indisponibilite_date', '>=', date('Y-m-d'))->get();

        return view('reservation.dates')->with([
            'indispos'      => $indispos,
            'back'          => url('/'),
            'action'        => url('/reservation/dates')
        ]);
    }

    public function reservationDatesSubmit(Request $request)
    {
        $this->validate($request,[
            'daterange'               => 'required'
        ]);

        $reservation = new Reservation;

        $daterange = $request->daterange;
        $dates = explode(' - ', $daterange);

        $dateDebut = $this->dateFr2Us($dates[0]);
        $dateFin = $this->dateFr2Us($dates[1]);

        $reservation->reservation_date_debut = $dateDebut;
        $reservation->reservation_date_fin = $dateFin;

        Session::put('reservation', $reservation);
        Session::put('daterange', $daterange);

        return redirect('/reservation/spas');
    }

    public function reservationSpas()
    {
        if(Session::get('reservation'))
        {
            $res = Session::get('reservation');

            $date_debut     = $res->reservation_date_debut;
            $date_fin       = $res->reservation_date_fin;

            $reservations = Reservation::select('reservation_spa_id')
                                        ->where([
                                            ['reservation_date_debut', '<=', $date_debut],
                                            ['reservation_date_fin', '>=', $date_debut],
                                            ['reservation_paye', '=', '1']
                                        ])
                                        ->orWhere([
                                            ['reservation_date_debut', '<=', $date_fin],
                                            ['reservation_date_fin', '>=', $date_fin],
                                            ['reservation_paye', '=', '1']
                                        ])
                                        ->orWhere([
                                            ['reservation_date_debut', '>=', $date_debut],
                                            ['reservation_date_fin', '<=', $date_fin],
                                            ['reservation_paye', '=', '1']
                                        ])
                                        ->get();

            $spas = Spa::all();

            $reserv = [];
            $nbSpaReserv = [];

            if(count($reservations) > 0){
                foreach($reservations as $reservation){
                    $nbSpaReserv[$reservation->reservation_spa_id] = 0;
                }

                foreach($reservations as $reservation){
                    $nbSpaReserv[$reservation->reservation_spa_id] = $nbSpaReserv[$reservation->reservation_spa_id] + 1;
                }

                foreach($reservations as $reservation){
                    if($reservation->reservation_spa_id != NULL){
                        if($nbSpaReserv[$reservation->reservation_spa_id] >= $reservation->spa->spa_stock){
                            if(!in_array($reservation->reservation_spa_id, $reserv)){
                                array_push($reserv, $reservation->reservation_spa_id);
                            }
                        }
                    }
                }
            }

            return view('reservation.spas')->with([
                'spas'          => $spas,
                'reserv'        => $reserv,
                'reservation'   => $res,
                'back'          => url('/reservation/dates'),
                'action'        => url('/reservation/spas')
            ]);
        }
        else
        {
            return redirect('/reservation/dates');
        }
    }

    public function reservationSpasSubmit(Request $request)
    {
        $this->validate($request,[
            'spa'               => 'required'
        ]);

        $res = Session::get('reservation');

        $res->reservation_spa_id                            = $request->spa;
        $spa = Spa::find($request->spa);
        $res->reservation_spa_libelle                       = $spa->spa_libelle.' '.$spa->spa_nb_place.' pers.';
        $res->reservation_prix                              = $spa->spa_prix;

        $daterange = Session::get('daterange');
        $joursSupp = $res->joursSupp($daterange);

        $res->reservation_montant_total = $spa->spa_prix;
        $res->reservation_montant_total += $spa->calculPrixJoursSupp($joursSupp);

        Session::put('reservation', $res);

        // var_dump($res);

        return redirect('/reservation/packs');
    }

    public function reservationPacks()
    {
        if(Session::get('reservation'))
        {
            $res = Session::get('reservation');

            $date_debut     = $res->reservation_date_debut;
            $date_fin       = $res->reservation_date_fin;

            $reservations = Reservation::select('reservation_spa_id')
                                        ->where([
                                            ['reservation_date_debut', '<=', $date_debut],
                                            ['reservation_date_fin', '>=', $date_debut],
                                            ['reservation_paye', '=', '1']
                                        ])
                                        ->orWhere([
                                            ['reservation_date_debut', '<=', $date_fin],
                                            ['reservation_date_fin', '>=', $date_fin],
                                            ['reservation_paye', '=', '1']
                                        ])
                                        ->orWhere([
                                            ['reservation_date_debut', '>=', $date_debut],
                                            ['reservation_date_fin', '<=', $date_fin],
                                            ['reservation_paye', '=', '1']
                                        ])
                                        ->get();

            $packs = Pack::all();

            $reserv = [];
            $nbPackReserv = [];

            if(count($reservations) > 0){
                foreach($reservations as $reservation){
                    $nbPackReserv[$reservation->reservation_pack_id] = 0;
                }

                foreach($reservations as $reservation){
                    $nbPackReserv[$reservation->reservation_pack_id] = $nbPackReserv[$reservation->reservation_pack_id] + 1;
                }

                foreach($reservations as $reservation){
                    if($nbPackReserv[$reservation->reservation_pack_id] >= $reservation->pack->pack_stock){
                        if(!in_array($reservation->reservation_pack_id, $reserv)){
                            array_push($reserv, $reservation->reservation_pack_id);
                        }
                    }
                }
            }

            return view('reservation.packs')->with([
                'packs'         => $packs,
                'reserv'        => $reserv,
                'reservation'   => $res,
                'back'          => url('/reservation/spas'),
                'action'        => url('/reservation/packs')
            ]);
        }
        else
        {
            return redirect('/reservation/dates');
        }
    }

    public function reservationPacksSubmit(Request $request)
    {
        $res = Session::get('reservation');
        $pack = NULL;

        if(isset($request->pack) && $request->pack != "")
        {
            $res->reservation_pack_id           = $request->pack;
            $pack = Pack::find($request->pack);
            $res->reservation_prix_pack         = $pack->pack_prix;
            $res->reservation_montant_total     += $pack->pack_prix;

            Session::put('reservation', $res);
            // var_dump($res);
        }

        Session::put('pack', $pack);

        return redirect('/reservation/accessoires');
    }

    public function reservationAccessoires()
    {
        if(Session::get('reservation'))
        {
            $res = Session::get('reservation');

            $date_debut     = $res->reservation_date_debut;
            $date_fin       = $res->reservation_date_fin;

            $reservations = Reservation::select('reservation_spa_id')
                                        ->where([
                                            ['reservation_date_debut', '<=', $date_debut],
                                            ['reservation_date_fin', '>=', $date_debut],
                                            ['reservation_paye', '=', '1']
                                        ])
                                        ->orWhere([
                                            ['reservation_date_debut', '<=', $date_fin],
                                            ['reservation_date_fin', '>=', $date_fin],
                                            ['reservation_paye', '=', '1']
                                        ])
                                        ->orWhere([
                                            ['reservation_date_debut', '>=', $date_debut],
                                            ['reservation_date_fin', '<=', $date_fin],
                                            ['reservation_paye', '=', '1']
                                        ])
                                        ->get();


            $accessoires = Accessoire::orderby('accessoire_stock', 'DESC')->orderby('accessoire_prix', 'DESC')->get();;

            $reserv = [];
            $nbAccessoireReserv = [];

            if(count($reservations) > 0){
                foreach($accessoires as $accessoire){
                    $nbAccessoireReserv[$accessoire->accessoire_id] = 0;
                }

                foreach($reservations as $reservation){
                    if(count($reservation->accessoires) > 0){
                        foreach($reservation->accessoires as $rAccessoire){
                            $nbAccessoireReserv[$rAccessoire->ra_accessoire_id]++;
                        }
                    }
                }

                foreach($reservations as $reservation){
                    if(count($reservation->accessoires) > 0){
                        foreach($reservation->accessoires as $rAccessoire){
                            if($nbAccessoireReserv[$rAccessoire->ra_accessoire_id] >= $rAccessoire->accessoire->accessoire_stock){
                                if(!in_array($rAccessoire->ra_accessoire_id, $reserv)){
                                    array_push($reserv, $rAccessoire->ra_accessoire_id);
                                }
                            }
                        }
                    }
                }
            }

            return view('reservation.accessoires')->with([
                'accessoires'   => $accessoires,
                'reserv'        => $reserv,
                'reservation'   => $res,
                'back'          => url('/reservation/packs'),
                'action'        => url('/reservation/accessoires')
            ]);
        }
        else
        {
            return redirect('/reservation/dates');
        }
    }

    public function reservationAccessoiresSubmit(Request $request)
    {
        $res = Session::get('reservation');
        $accessoires = [];

        if(isset($request->accessoires) && count($request->accessoires) > 0)
        {
            $montant_total = $res->reservation_montant_total;
            foreach($request->accessoires as $accessoire)
            {
                $accessory = Accessoire::find($accessoire);
                $montant_total += $accessory->accessoire_prix;

                array_push($accessoires, $accessory);
            }
            $res->reservation_montant_total = $montant_total;
        }

        Session::put('reservation', $res);
        Session::put('accessoires', $accessoires);

        return redirect('/reservation/recap');
    }

    public function reservationRecap()
    {
        if(Session::get('reservation'))
        {
            $res = Session::get('reservation');
            $accessoires = Session::get('accessoires');

            $daterange = Session::get('daterange');
            $joursSupp = $res->joursSupp($daterange);


            return view('reservation.recap')->with([
                'accessoires'   => $accessoires,
                'reservation'   => $res,
                'joursSupp'     => $joursSupp,
                'back'          => url('/reservation/accessoires'),
                'action'        => url('/reservation/recap')
            ]);
        }
        else
        {
            return redirect('/reservation/dates');
        }
    }

    public function reservationRecapSubmit(Request $request)
    {
        if(Session::get('reservation')){

            $reservation    = Session::get('reservation');
            $pack           = Session::get('pack');
            $accessoires    = Session::get('accessoires');

            $reservation->save();

            if($accessoires != NULL)
            {
                foreach($accessoires as $accessoire)
                {
                    $reservationAccessoire = new ReservationAccessoire;
                    $reservationAccessoire->create($accessoire->accessoire_id, $reservation->reservation_id);
                }
            }

            Session::put('reservation', $reservation);

            return redirect('/reservation/heures');

        }
        else
        {
            return redirect('/reservation/dates');
        }

    }

    public function reservationHeures()
    {
        if(Session::get('reservation'))
        {
            $res = Session::get('reservation');

            return view('reservation.heures')->with([
                'reservation'   => $res,
                'back'          => url('/reservation/recap'),
                'action'        => url('/reservation/heures')
            ]);
        }
        else
        {
            return redirect('/reservation/dates');
        }
    }

    public function reservationHeuresSubmit(Request $request)
    {
        $this->validate($request,[
            'HeureInstall'                  => 'required',
            'HeureDesinstall'               => 'required'
        ]);

        $res = Session::get('reservation');

        $res->reservation_heure_install    = $request->HeureInstall;
        $res->reservation_heure_desinstall = $request->HeureDesinstall;

        Session::put('reservation', $res);

        return redirect('/reservation/logement');
    }

    public function reservationLogement()
    {
        if(Session::get('reservation'))
        {
            $res = Session::get('reservation');

            return view('reservation.logement')->with([
                'reservation'   => $res,
                'back'          => url('/reservation/heures'),
                'action'        => url('/reservation/logement')
            ]);
        }
        else
        {
            return redirect('/reservation/dates');
        }
    }

    public function reservationLogementSubmit(Request $request)
    {
        $this->validate($request,[
            'logement'                  => 'required',
            'emplacement'               => 'required',
            'remplissage'               => 'required',
            'source'                    => 'required'
        ]);

        $res = Session::get('reservation');

        $res->reservation_type_logement         = $request->logement;
        $res->reservation_emplacement           = $request->emplacement;
        $res->reservation_remplissage           = $request->remplissage;
        $res->reservation_source                = $request->source;

        Session::put('reservation', $res);

        // var_dump($res);

        return redirect('/reservation/adresse');
    }

    public function reservationAdresse()
    {
        if(Session::get('reservation'))
        {
            $res = Session::get('reservation');

            return view('reservation.adresse')->with([
                'reservation'   => $res,
                'back'          => url('/reservation/logement'),
                'action'        => url('/reservation/adresse')
            ]);
        }
        else
        {
            return redirect('/reservation/dates');
        }
    }

    public function reservationAdresseSubmit(Request $request)
    {
        $this->validate($request,[
            'adresse'               => 'required',
            'ville'                 => 'required',
            'cp'                    => 'required',
            'departement'           => 'required'
        ]);

        $res = Session::get('reservation');
        $res->reservation_rue           = $request->adresse;
        $res->reservation_ville         = $request->ville;
        $res->reservation_cp            = $request->cp;
        $res->reservation_departement   = $request->departement;
        $res->reservation_complement    = $request->complement;
        $res->reservation_etage         = $request->etage;
        $res->reservation_ascenseur     = $request->ascenseur;
        Session::put('reservation', $res);

        $address = new Adresse;
        $address->adresse_name              = "Principal";
        $address->adresse_rue               = $request->adresse;
        $address->adresse_cp                = $request->cp;
        $address->adresse_ville             = $request->ville;
        $address->adresse_complement        = $request->complement;
        $address->adresse_departement       = $request->departement;
        $address->adresse_etage             = $request->etage;
        $address->adresse_ascenseur         = $request->ascenseur;
        Session::put('address', $address);

        return redirect('/reservation/client');
    }

    public function reservationClient()
    {
        if(Session::get('reservation'))
        {
            $res = Session::get('reservation');

            return view('reservation.client')->with([
                'reservation'   => $res,
                'back'          => url('/reservation/adresse'),
                'action'        => url('/reservation/client')
            ]);
        }
        else
        {
            return redirect('/reservation/dates');
        }
    }

    public function reservationClientSubmit(Request $request)
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

        $reservation = Session::get('reservation');
        $reservation->reservation_email = $request->email;
        $reservation->reservation_phone = $request->phone;
        Session::put('reservation', $reservation);

        return redirect('/reservation/confirmation');
    }

    public function reservationConfirmation()
    {
        if(Session::get('reservation'))
        {
            $res            = Session::get('reservation');
            $accessoires    = Session::get('accessoires');
            $adr            = Session::get('address');
            $client         = Session::get('client');

            $daterange      = Session::get('daterange');
            $joursSupp      = $res->joursSupp($daterange);

            // echo "<pre>";
            // var_dump($client);
            // echo "</pre>";

            return view('reservation.confirmation')->with([
                'accessoires'   => $accessoires,
                'client'        => $client,
                'reservation'   => $res,
                'joursSupp'     => $joursSupp,
                'back'          => url('/reservation/client'),
                'action'        => url('/reservation/confirmation')
            ]);
        }
        else
        {
            return redirect('/reservation/dates');
        }
    }

    public function reservationConfirmationSubmit(Request $request)
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
        $reservation = Session::get('reservation');
        $reservation->reservation_client_id = $client->client_id;
        $reservation->save();

        return redirect('/reservation/paiement');
    }

    public function paiement()
    {
        if(Session::get('reservation')){

            $reservation = Session::get('reservation');

            if($reservation->reservation_montant_total > 1){
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
            return redirect('/');
        }

    }

    public function success()
    {
        if(Session::get('reservation')) {

            $reservation = Session::get('reservation');

            $r = Reservation::Find($reservation->reservation_id);
            $r->reservation_paye = 1;
            $r->reservation_active = 1;
            $r->reservation_moyen_paiement = "Stripe";

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

            // Mail destiné au client
            Mail::send('emails.customer.confirmation', ['reservation' => $r], function($mess) use ($r){
                $mess->from(env('MAIL_EMAIL'));                         // Mail de départ Bullao contact@bullao.fr
                $mess->to($r->client->client_email);          // Mail du client
                // $mess->cc('jer.lemont@gmail.com');
                $mess->subject('Bullao : confirmation de réservation');
            });

            // Mail destiné aux Admins
            Mail::send('emails.system.confirmation', ['reservation' => $r], function($mess){
                $mess->from(env('MAIL_EMAIL'));                         // Mail de départ Bullao contact@bullao.fr
                $mess->to(env('MAIL_ADMIN'));                           // Mail de l'admin
                $mess->cc('contact@bullao.fr');
                $mess->subject('Bullao : Nouvelle réservation !');
            });

            Session::forget('reservation');
            Session::forget('client');
            Session::forget('adresse');
            Session::forget('accessoires');
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
        Session::forget('client');
        Session::forget('adresse');
        Session::forget('accessoires');
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
