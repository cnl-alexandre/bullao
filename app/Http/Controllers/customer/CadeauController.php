<?php
namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Client;
use App\Cadeau;
use Illuminate\Http\Request;

class CadeauController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function presentation()
    {
        return view('reservation.cadeau.presentation')->with([]);
    }

    public function creationCarte(Request $request)
    {
        return view('reservation.cadeau.commande')->with([
            'action'        => url('/cartecadeau/offrir'),
            'libelle'       => $request->libelle,
            'prix'          => $request->prix
        ]);
    }

    public function creationCarteSubmit()
    {

    }

}
