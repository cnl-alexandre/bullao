<?php
namespace App\Http\Controllers\system;

use App\Http\Controllers\Controller;
use App\Reservation;

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
                                        ->orderby('reservation_date_fin', 'ASC')
                                        ->get();
        $listeResaPassees = Reservation::where('reservation_date_fin', '<', $dateToday)
                                        ->orderby('reservation_date_fin', 'ASC')
                                        ->get();

        return view('system.reservation.list')->with([
            'listeResas'              => $listeResas,
            'listeResaPassees'        => $listeResaPassees
        ]);
    }
}
