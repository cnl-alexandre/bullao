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
                        ->count();
        $nbResaOuvertes = Reservation::where('reservation_date_debut', '>=', $dateToday)
                        ->count();
        $nbResaFermees = Reservation::where('reservation_date_fin', '<=', $dateToday)
                        ->count();

        $nbResaSahara4p = Reservation::where('reservation_spa_libelle', '=', 'Spa Sahara 4 places')
                        ->count('reservation_paye', '=', '1');
        $nbResaNavy4p = Reservation::where('reservation_spa_libelle', '=', 'Spa Navy 4 places')
                        ->count('reservation_paye', '=', '1');
        $nbResaBaltik4p = Reservation::where('reservation_spa_libelle', '=', 'Spa Baltik 4 places')
                        ->count('reservation_paye', '=', '1');
        $nbResaBaltik6p = Reservation::where('reservation_spa_libelle', '=', 'Spa Baltik 6 places')
                        ->count('reservation_paye', '=', '1');
        $nbResaCarbone6p = Reservation::where('reservation_spa_libelle', '=', 'Spa Carbone 6 places')
                        ->count('reservation_paye', '=', '1');

        $detailsResaFutures = Reservation::where('reservation_date_debut', '>=', $dateToday)
                                ->get();

        return view('system.dashboard')->with([
            'nbResaEnCours'                => $nbResaEnCours,
            'nbResaOuvertes'                => $nbResaOuvertes,
            'nbResaFermees'                 => $nbResaFermees,
            'nbResaSahara4p'                =>$nbResaSahara4p,
            'nbResaNavy4p'                  =>$nbResaNavy4p,
            'nbResaBaltik4p'                =>$nbResaBaltik4p,
            'nbResaBaltik6p'                =>$nbResaBaltik6p,
            'nbResaCarbone6p'               =>$nbResaCarbone6p,
            'detailsResaFutures'            =>$detailsResaFutures
        ]);
    }
}
