<?php
namespace App\Http\Controllers\system;

use App\Http\Controllers\Controller;
use App\Reservation;
use App\Spa;

class BackOfficeController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function dashboard()
    {
        $dateToday = date("Y-m-d");
        // echo $dateToday;
        $nbResaEnCours = Reservation::where('reservation_date_debut', '<=', $dateToday)
                        ->where('reservation_date_fin', '>=', $dateToday)
                        ->where('reservation_active', '=', '1')
                        ->count();
        $nbResaOuvertes = Reservation::where('reservation_date_debut', '>=', $dateToday)
                        ->where('reservation_active', '=', '1')
                        ->count();
        $nbResaFermees = Reservation::where('reservation_date_fin', '<=', $dateToday)
                        ->where('reservation_active', '=', '1')
                        ->count();

        $resasSpa = [];

        $spas = Spa::all();

        foreach($spas as $spa)
        {
            $nb = Reservation::where('reservation_spa_libelle', 'LIKE', $spa->spa_libelle.' '.$spa->spa_nb_place.' places')
                            ->where('reservation_active', '=', '1')
                            ->count();

            $resasSpa[$spa->spa_libelle.' '.$spa->spa_nb_place.' places'] = $nb;
        }
        // Resultat : reservation en cours
        $detailsResaEnCours = Reservation::where('reservation_date_debut', '<=', $dateToday)
                                ->where('reservation_date_fin', '>=', $dateToday)
                                ->where('reservation_active', '=', '1')
                                ->orderby('reservation_date_debut', 'ASC')
                                ->get();
        // Resultat : reservation futures
        $detailsResaFutures = Reservation::where('reservation_date_debut', '>', $dateToday)
                                ->where('reservation_active', '=', '1')
                                ->orderby('reservation_date_debut', 'ASC')
                                ->get();
        // Resultats : dates d'installation
        $detailsDatesInstall = Reservation::where('reservation_date_debut', '<=', $dateToday)
                                ->where('reservation_active', '=', '1')
                                ->orderby('reservation_date_debut', 'ASC')
                                ->get();


        for($i=12;$i>=0;$i--)
        {
            $today = date("Y-m-d");
            $date = date('Y-m-d', strtotime($today. ' - '.$i.' months'));
            $dateAffichage = date('m/Y', strtotime($today. ' - '.$i.' months'));

            $nbVentesActives = Reservation::where('reservation_active', '=', '1')
                                            ->where('reservation_date_debut', '<=', $date)->count();

            $ventesActives[$dateAffichage] = $nbVentesActives;
        }

        return view('system.dashboard')->with([
            'nbResaEnCours'                 => $nbResaEnCours,
            'nbResaOuvertes'                => $nbResaOuvertes,
            'nbResaFermees'                 => $nbResaFermees,
            'detailsResaFutures'            => $detailsResaFutures,
            'detailsResaEnCours'            => $detailsResaEnCours,
            'resasSpa'                      => $resasSpa,
            'spas'                          => $spas,
            'ventesActives'                 => $ventesActives
        ]);
    }
}
