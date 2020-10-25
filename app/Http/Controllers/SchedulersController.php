<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Reservation;
use App\ReservationAccessoire;
use App\Adresse;
use App\Client;

class SchedulersController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function launch()
    {
        /**
         * CECI EST LANCÉ TOUTES LES HEURES PAR UNE TÂCHE CRON SUR OVH
         * -----------------------------------------------------------
         */

        /**
         * Scheduler permettant de purger les réservations qui n'ont pas été payés depuis plus de 12h après sa création
         * 
         * Lancement toutes les heures
        */
        $this->purgeReservationsNonPayees();

        /**
         * Scheduler permettant d'envoyer un mail aux clients qui ont eu une réservation il y a 3 jours
         * 
         * Lancement toutes les heures
        */
        $this->notationPrestationAfter();
    }

    public function purgeReservationsNonPayees()
    {
        $reservations = Reservation::where('reservation_paye', '=', '0')->whereNull('reservation_payment_id')->get();
        $count = 0;

        if(count($reservations) > 0)
        {
            foreach($reservations as $reservation)
            {
                if((time() - strtotime($reservation->created_at)) >= (60*60*12)) // 12h
                {
                    // On supprime toutes les Reservation_Accessoire
                    $reservationsAccessoires = ReservationAccessoire::where('ra_reservation_id', '=', $reservation->reservation_id)->get();

                    if(count($reservationsAccessoires) > 0)
                    {
                        foreach($reservationsAccessoires as $reservationAccessoire)
                        {
                            $reservationAccessoire->delete();
                        }
                    }

                    $nbResaClient = Reservation::where('reservation_client_id', '=', $reservation->reservation_client_id)->count();

                    // On supprime la réservation
                    $clientId = $reservation->reservation_client_id;
                    $reservation->delete();

                    if($nbResaClient == 0)
                    {
                        // On supprime les adresses du client de la réservation
                        $adresses = Adresse::where('adresse_client_id', '=', $clientId)->get();
                        if(count($adresses) > 0)
                        {
                            foreach($adresses as $adresse)
                            {
                                $adresse->delete();
                            }
                        }

                        // On supprime le client de la réservation
                        $client = Client::find($clientId);
                        $client->delete();
                    }

                    $count++;
                }
            }
        }

        //Session::put('infoScheduler', 'Le scheduler <code>purgeReservationsNonPayees</code> a été lancé et <code>'.$count.'</code> réservation(s) ont été supprimées.');
    }

    public function notationPrestationAfter()
    {
        $reservations = Reservation::where('reservation_paye', '=', '1')
                                    ->whereNotNull('reservation_payment_id')
                                    ->where('reservation_notation_prestation', '=', '0')
                                    ->where('reservation_date_fin', '<=', date('Y-m-d', strtotime(date('Y-m-d'). ' - 3 days')))
                                    ->get();

        if(count($reservations) > 0)
        {
            foreach($reservations as $reservation)
            {
                // Mail destiné au client
                Mail::send('emails.customer.notationPrestationAfter', ['reservation' => $reservation], function($mess) use ($reservation){
                    $mess->from(env('MAIL_EMAIL'));                         // Mail de départ Bullao contact@bullao.fr
                    $mess->to($reservation->client->client_email);          // Mail du client
                    // $mess->cc('jer.lemont@gmail.com');
                    $mess->subject('Bullao : Qu\'avez-vous pensé de la prestation ?');
                });

                $reservation->reservation_notation_prestation = 1;
                $reservation->save();
            }
        }

        //Session::put('infoScheduler', 'Le scheduler <code>notationPrestationAfter</code> a été lancé et <code>'.count($reservations).'</code> mail(s) ont été envoyés.');
    }
}