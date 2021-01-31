<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Parametre;

class MaintenanceController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        $parametre = Parametre::where('parametre_libelle', "=", "maintenance_message")->first();

        return view('maintenance')->with([
            "parametre" => $parametre
        ]);
    }
}
