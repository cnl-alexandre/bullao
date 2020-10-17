<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Reservation;
use App\ReservationAccessoire;
use App\Client;
use App\Adresse;

class SchedulerController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function purgeReservationsNonPayees()
    {
        $reservations = Reservation::where('reservation_paye', '=', '0')->get();
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

                    $count++;
                }
            }
        }

        Session::put('info', 'Le scheduler <code>purgeReservationsNonPayees</code> a été lancé et <code>'.$count.'</code> réservation(s) ont été supprimées.');
    }
}