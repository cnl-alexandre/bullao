<?php
namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Client;
use App\Reservation;

class AccountController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function dashboard()
    {
        return view('customer.dashboard')->with([]);
    }

    public function reservations()
    {
        $reservationsPassees = Reservation::where('reservation_date_fin', '<', date('Y-m-d'))
                                            ->where('reservation_client_id', '=', Session::get('Client')->client_id)
                                            ->orderby('reservation_date_debut', 'DESC')
                                            ->get();

        $reservationsEnCours = Reservation::where('reservation_date_fin', '>=', date('Y-m-d'))
                                            ->where('reservation_client_id', '=', Session::get('Client')->client_id)
                                            ->orderby('reservation_date_debut', 'DESC')
                                            ->get();

        return view('customer.reservations')->with([
            'reservationsPassees'   => $reservationsPassees,
            'reservationsEnCours'   => $reservationsEnCours
        ]);
    }
}