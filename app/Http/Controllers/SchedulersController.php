<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Reservation;
use App\ReservationAccessoire;
use App\Adresse;
use App\Client;
use App\Cadeau;
use Illuminate\Support\Facades\Log;

class SchedulersController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function launch()
    {
        Log::info('Début du launcher de schedulers');

        // Mail pour avertir du bon déroulement des schedulers
        Mail::send('emails.system.launch-schedulers', [], function($mess) {
            $mess->from(env('MAIL_EMAIL'));                         // Mail de départ Bullao contact@bullao.fr
            $mess->to("jerem-lem@hotmail.fr");          // Mail du client
            // $mess->cc('jer.lemont@gmail.com');
            $mess->subject('Bullao : Lancement des schedulers');
        });

        /**
         * CECI EST LANCÉ TOUTES LES HEURES PAR UNE TÂCHE CRON SUR OVH
         * -----------------------------------------------------------
         */

        /**
         * Scheduler permettant de purger les réservations qui n'ont pas été payées depuis plus de 12h après sa création
         *
         * Lancement toutes les heures
        */
        $this->purgeReservationsNonPayees();

        /**
         * Scheduler permettant de purger les cartes cadeaux qui n'ont pas été payées depuis plus de 12h après sa création
         *
         * Lancement toutes les heures
        */
        $this->purgeCadeauxNonPayes();

        /**
         * Scheduler permettant d'envoyer un mail aux clients qui ont eu une réservation il y a 3 jours
         *
         * Lancement toutes les heures
        */
        //$this->notationPrestationAfter();

        Log::info('Fin du launcher de schedulers');
    }

    public function purgeReservationsNonPayees()
    {
        Log::info('Début du lancement du scheduler purgeReservationsNonPayees()');

        $reservations = Reservation::where('reservation_paye', '=', '0')->where('reservation_active', '=', '0')->get();
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

        // Log::emergency($message);
        // Log::alert($message);
        // Log::critical($message);
        // Log::error($message);
        // Log::warning($message);
        // Log::notice($message);
        // Log::info($message);
        // Log::debug($message);

        Log::info('Le scheduler "purgeReservationsNonPayees" a été lancé et '.$count.' réservation(s) ont été supprimées.');
        //Session::put('infoScheduler', 'Le scheduler <code>purgeReservationsNonPayees</code> a été lancé et <code>'.$count.'</code> réservation(s) ont été supprimées.');

        Log::info('Fin du lancement du scheduler purgeReservationsNonPayees()');
    }

    public function purgeCadeauxNonPayes()
    {
        Log::info('Début du lancement du scheduler purgeCadeauxNonPayes()');

        $cadeaux = Cadeau::where('cadeau_paye', '=', '0')->get();
        $count = 0;

        if(count($cadeaux) > 0)
        {
            foreach($cadeaux as $cadeau)
            {
                if((time() - strtotime($cadeau->created_at)) >= (60*60*12)) // 12h
                {
                    $nbCadeauClient = Cadeau::where('cadeau_client_id', '=', $cadeau->cadeau_client_id)->count();

                    // On supprime la réservation
                    $clientId = $cadeau->cadeau_client_id;
                    $cadeau->delete();

                    if($nbCadeauClient == 0)
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

        // Log::emergency($message);
        // Log::alert($message);
        // Log::critical($message);
        // Log::error($message);
        // Log::warning($message);
        // Log::notice($message);
        // Log::info($message);
        // Log::debug($message);

        Log::info('Le scheduler "purgeCadeauxNonPayes" a été lancé et '.$count.' carte(s) cadeau(x) ont été supprimées.');
        //Session::put('infoScheduler', 'Le scheduler <code>purgeReservationsNonPayees</code> a été lancé et <code>'.$count.'</code> réservation(s) ont été supprimées.');

        Log::info('Fin du lancement du scheduler purgeCadeauxNonPayes()');
    }

    public function notationPrestationAfter()
    {
        Log::info('Début du lancement du scheduler notationPrestationAfter()');

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

        Log::info('Fin du lancement du scheduler notationPrestationAfter()');
    }
}
