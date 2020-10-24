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
                                        ->orderby('reservation_date_debut', 'ASC')
                                        ->orderby('reservation_id', 'ASC')
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
            'accessoires'               => $accessoires,
            'action'                    => url('/system/reservations/edit'),
            'idAccessoiresReservation'  => $idAccessoiresReservation
        ]);
    }
}
