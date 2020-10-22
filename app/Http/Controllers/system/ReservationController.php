<?php
namespace App\Http\Controllers\system;

use App\Http\Controllers\Controller;
use App\Reservation;
use App\Accessoire;

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
                                        ->where('reservation_paye', '=', '1')
                                        ->orderby('reservation_date_fin', 'ASC')
                                        ->get();
        $listeResaPassees = Reservation::where('reservation_date_fin', '<', $dateToday)
                                        ->where('reservation_paye', '=', '1')
                                        ->orderby('reservation_date_fin', 'ASC')
                                        ->get();

        return view('system.reservation.list')->with([
            'listeResas'              => $listeResas,
            'listeResaPassees'        => $listeResaPassees
        ]);
    }

    public function edit($id)
    {
        $reservation = Reservation::find($id);
        $accessoires = Accessoire::All();

        return view('system.reservation.edit')->with([
            'reservation'           => $reservation,
            'accessoires'           => $accessoires,
            'action'        => url('/system/reservations/edit')
        ]);
    }
}
