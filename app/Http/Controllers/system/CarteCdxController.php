<?php
namespace App\Http\Controllers\system;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Cadeau;
use App\Client;
use App\Adresse;
use Illuminate\Http\Request;

class CarteCdxController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function list()
    {
        $listeCartes = Cadeau::orderby('cadeau_id', 'DESC')->get();


        return view('system.cartesCdx.list')->with([
            'listeCartes'              =>  $listeCartes
        ]);
    }

    public function editCarte($id)
    {
        $carte = Cadeau::find($id);

        return view('system.cartesCdx.edit')->with([
            'carte'                    => $carte,
            'action'                    => url('/system/cartescadeaux/edit/'.$id)
        ]);
    }


}
