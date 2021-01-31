<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Parametre;
use Illuminate\Support\Facades\Session;

class MaintenanceController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        $maintenance = Parametre::where("parametre_libelle", "=", "maintenance")->first();
        $message = Parametre::where('parametre_libelle', "=", "maintenance_message")->first();


        if ($maintenance->parametre_value == 1) {
            return view('maintenance')->with([
                "message" => $message
            ]);
        }
        else {

            Session::put('success', 'Le site est à nouveau disponible');
            return redirect('/');
        }
    }
}
