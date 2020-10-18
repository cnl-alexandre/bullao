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
        $listeResas = Reservation::orderby('reservation_id', 'ASC')->get();

        return view('system.reservation.list')->with([
            'listeResas'              =>  $listeResas
        ]);
    }
}
