<?php
namespace App\Http\Controllers\system;

use App\Http\Controllers\Controller;
use App\Reservation;

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
        $nbResaEnCours = Reservation::where('reservation_date_fin', '>=', $dateToday)->where('reservation_date_fin', '<=', $dateToday)->count();
        $nbResaOuvertes = Reservation::where('reservation_date_fin', '>=', $dateToday)->count();
        $nbResaFermees = Reservation::where('reservation_date_fin', '<=', $dateToday)->count();

        return view('system.backoffice.dashboard')->with([
            'nbResaEnCours'                => $nbResaEnCours,
            'nbResaOuvertes'                => $nbResaOuvertes,
            'nbResaFermees'                 => $nbResaFermees
        ]);
    }
}
