<?php
namespace App\Http\Controllers\system;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Reservation;
use App\Spa;
use App\Pack;
use App\Accessoire;
use App\Client;
use App\Adresse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function list()
    {
        $dateToday = date("Y-m-d");

        $listeResas = Reservation::where('reservation_date_fin', '>=', $dateToday)
                                        ->where('reservation_active', '=', '1')
                                        ->orderby('reservation_date_debut', 'ASC')
                                        ->orderby('reservation_id', 'ASC')
                                        ->get();
        $listeResaPassees = Reservation::where('reservation_date_fin', '<', $dateToday)
                                        ->where('reservation_active', '=', '1')
                                        ->orderby('reservation_date_fin', 'ASC')
                                        ->get();

        return view('system.reservation.list')->with([
            'listeResas'              => $listeResas,
            'listeResaPassees'        => $listeResaPassees
        ]);
    }

    public function new($id = null)
    {
        $client = null;
        $adresse = null;

        if ($id != null) {

            $client = Client::find($id);
        }

        $spas = Spa::All();
        $packs = Pack::All();
        $accessoires = Accessoire::All();

        return view('system.reservation.edit')->with([
            'spas'                      => $spas,
            'packs'                     => $packs,
            'accessoires'               => $accessoires,
            'client'                    => $client,
            'action'                    => url('/system/reservations/new')
        ]);
    }

    public function sendClient($id)
    {
        $reservation = Reservation::find($id);

        Mail::send('emails.customer.confirmation', ['reservation' => $reservation], function($mess) use ($reservation){
            $mess->from(env('MAIL_EMAIL'));                         // Mail de départ Bullao contact@bullao.fr
            $mess->to($reservation->client->client_email);          // Mail du client
            // $mess->cc('jer.lemont@gmail.com');
            $mess->subject('Bullao : confirmation de réservation');
        });

        Session::put('success', 'Le mail client a bien été envoyé');
        return redirect('/system/reservations/edit/'.$id);
    }

    public function sendAdmin($id)
    {
        $reservation = Reservation::find($id);

        Mail::send('emails.system.confirmation', ['reservation' => $reservation], function($mess){
            $mess->from(env('MAIL_EMAIL'));                         // Mail de départ Bullao contact@bullao.fr
            $mess->to(env('MAIL_ADMIN'));                           // Mail de l'admin
            $mess->cc('contact@bullao.fr');
            $mess->subject('Bullao : Nouvelle réservation !');
        });

        Session::put('success', 'Le mail admin a bien été envoyé');
        return redirect('/system/reservations/edit/'.$id);
    }

    public function newSubmit(Request $request)
    {
        $this->validate($request,[
            'name'                => 'required'
        ]);

        $reservation                            = new Reservation;

        $datedebut = $this->dateUs2Fr($request->reservationDateDebut);
        $datefin = $this->dateUs2Fr($request->reservationDateFin);
        $request['daterange'] = $datedebut.' - '.$datefin;

        $spalibelle = Spa::find($request->reservationLibelleSpa);
        $request['spa'] = $spalibelle->spa_id;

        $request['validation'] = "1";

        $reservation->create($request);
        $request['step'] = '2';
        $reservation->create($request);

        Session::put('success', 'La réservation a bien été créé');
        return redirect('/system/reservations/list');
    }

    public function edit($id)
    {
        $reservation = Reservation::find($id);
        $spas = Spa::All();
        $packs = Pack::All();
        $accessoires = Accessoire::All();

        $idAccessoiresReservation = [];

        if(count($reservation->accessoires) > 0)
        {
            foreach($reservation->accessoires as $accessoire)
            {
                array_push($idAccessoiresReservation, $accessoire->ra_accessoire_id);
            }
        }

        return view('system.reservation.edit')->with([
            'reservation'               => $reservation,
            'spas'                      => $spas,
            'packs'                     => $packs,
            'accessoires'               => $accessoires,
            'action'                    => url('/system/reservations/edit/'.$id),
            'idAccessoiresReservation'  => $idAccessoiresReservation
        ]);
    }

    public function editSubmit(Request $request, $id)
    {
        $this->validate($request,[
            'name'                => 'required'
        ]);

        $datedebut = $this->dateUs2Fr($request->reservationDateDebut);
        $datefin = $this->dateUs2Fr($request->reservationDateFin);
        $request['daterange'] = $datedebut.' - '.$datefin;

        $spalibelle = Spa::find($request->reservationLibelleSpa);
        $request['spa'] = $spalibelle->spa_id;

        $reservation = Reservation::find($id);
        $reservation->edit($request);

        Session::put('success', 'La réservation a bien été modifié');
        return redirect('/system/reservations/edit/'.$id);
    }

    function dateUs2Fr($date)
    {
        $split = explode("-",$date);

        $annee = $split[0];
        $mois = $split[1];
        $jour = $split[2];

        return "$jour"."/"."$mois"."/"."$annee";
    }

}
