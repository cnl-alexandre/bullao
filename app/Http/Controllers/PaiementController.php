<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class PaiementController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function paiement()
    {
        return view('paiement')->with([]);
    }

    public function success()
    {
        return view('paiement-accepte')->with([]);
    }

    public function cancel()
    {
        return view('paiement-refuse')->with([]);
    }
}
