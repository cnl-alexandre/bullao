<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Indisponibilite;
use App\Spa;
use App\Pack;
use App\Accessoire;
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

    // public function azerty(Request $request)
    // {
        // if(Session::get('reservation'))
        // {
        //
        //
        // }
        // else
        // {
        //     return redirect('/reservation/dates');
        // }
    // }

    public function reservationDates()
    {
        $indispos       = Indisponibilite::where('indisponibilite_date', '>=', date('Y-m-d'))->get();

        return view('reservation.dates')->with([
            'indispos'      => $indispos,
            'action'        => url('/reservation/dates')
        ]);
    }

    public function reservationDatesSubmit(Request $request)
    {
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
        $res = Session::get('reservation');

        $res->spa_id                                 = $request->spa;
        $spa = Spa::find($request->spa);
        $res->spa_libelle                            = $spa->spa_libelle.' '.$spa->spa_nb_place.' pers.';
        $res->spa_prix                               = $spa->spa_prix;

        $daterange = Session::get('daterange');
        $joursSupp = $res->joursSupp($daterange);

        $res->montant_total = $spa->spa_prix;
        $res->montant_total += $spa->calculPrixJoursSupp($joursSupp);

        Session::put('reservation', $res);

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

        if(isset($request->pack) && $request->pack != "")
        {
            $res->pack_id          = $request->pack;
            $pack = Pack::find($request->pack);
            $res->pack_prix        = $pack->pack_prix;
            $res->pack_libelle     = $pack->pack_libelle;
            $res->montant_total += $pack->pack_prix;

            Session::put('reservation', $res);
            // var_dump($res);
        }

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
            $montant_total = $res->montant_total;
            foreach($request->accessoires as $accessoire)
            {
                $accessory = Accessoire::find($accessoire);
                $montant_total += $accessory->accessoire_prix;

                array_push($accessoires, $accessory);
            }
            $res->montant_total = $montant_total;
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

            return view('reservation.recap')->with([
                'accessoires'   => $accessoires,
                'reservation'   => $res,
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

        return redirect('/reservation/heures');
    }

    public function reservationHeures()
    {
        if(Session::get('reservation'))
        {
            $res = Session::get('reservation');

            return view('reservation.heures')->with([
                'reservation'   => $res,
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

        return redirect('/reservation/logement');
    }

    public function reservationLogement()
    {
        if(Session::get('reservation'))
        {
            $res = Session::get('reservation');



            return view('reservation.logement')->with([
                'reservation'   => $res,
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
        $res = Session::get('reservation');

        $res->logement = $request->logement;
        $res->emplacement = $request->emplacement;
        $res->remplissage = $request->remplissage;

        Session::put('reservation', $res);

        return redirect('/reservation/adresse');
    }

    public function reservationAdresse()
    {
        if(Session::get('reservation'))
        {
            $res = Session::get('reservation');

            return view('reservation.adresse')->with([
                'reservation'   => $res,
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
        $res = Session::get('reservation');

        $res->adresse = $request->adresse;
        $res->ville = $request->ville;
        $res->cp = $request->cp;
        $res->departement = $request->departement;
        $res->complement = $request->complement;

        Session::put('reservation', $res);

        return redirect('/reservation/client');
    }

    public function reservationClient()
    {
        if(Session::get('reservation'))
        {
            $res = Session::get('reservation');

            return view('reservation.client')->with([
                'reservation'   => $res,
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
        $res = Session::get('reservation');

        $res->name = $request->name;
        $res->email = $request->email;
        $res->phone = $request->phone;

        Session::put('reservation', $res);

        return redirect('/reservation/confirmation');
    }

    public function reservationConfirmation()
    {
        if(Session::get('reservation'))
        {
            $res = Session::get('reservation');

            return view('reservation.confirmation')->with([
                'reservation'   => $res,
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

        return redirect('/reservation/paiement');
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
        if(Session::get('reservation')){

            $reservation = Session::get('reservation');

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
            return redirect('/');
        }

    }

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
