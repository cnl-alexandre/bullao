<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Indisponibilite;

class HomeController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function home()
    {
        return view('home')->with([]);
    }

    public function reservation()
    {
        $indispos = Indisponibilite::where('indisponibilite_date', '>=', date('Y-m-d'))->get();

        return view('reservation')->with([
            'indispos'  => $indispos
        ]);
    }
}
