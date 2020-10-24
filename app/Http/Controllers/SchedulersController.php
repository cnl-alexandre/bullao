<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Promo;
use App\Spa;
use App\Reservation;
use App\Pack;
use App\Accessoire;

class SchedulersController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function launch()
    {
        /**
         * Scheduler permettant de purger les réservations qui n'ont pas été payés depuis plus de 12h après sa création
         * 
         * Lancement toutes les heures
        */
        if(date('i') == '00') {
            $this->purgeReservationsNonPayees();
        }
    }

    public function purgeReservationsNonPayees()
    {
        $reservations = Reservation::where('reservation_paye', '=', '0')->where('reservation_payment_id', '=', '')->get();
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

                    // On supprime la réservation
                    $clientId = $reservation->reservation_client_id;
                    $reservation->delete();

                    $nbResaClient = Reservation::where('reservation_client_id', '=', $clientId)->count();

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

        Session::put('info', 'Le scheduler <code>purgeReservationsNonPayees</code> a été lancé et <code>'.$count.'</code> réservation(s) ont été supprimées.');
    }

    public function notationPrestationAfter()
    {
        $reservations = Reservation::where('reservation_paye', '=', '1')
                                    ->where('reservation_payment_id', '<>', '')
                                    ->where('reservation_date_fin', 'LIKE', '%-%-'.date('Y-m-d', strtotime(date('Y-m-d'). ' - 3 days')))
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
            }
        }

        Session::put('info', 'Le scheduler <code>notationPrestationAfter</code> a été lancé et <code>'.count($reservations).'</code> mail(s) ont été envoyés.');
    }
}