<?php
namespace App\Http\Controllers\system;

use App\Http\Controllers\Controller;
use App\Spa;
use App\Pack;
use App\Accessoire;

class ProduitController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function listSpas()
    {

        $listeSpas = Spa::orderby('spa_id', 'ASC')->get();

        return view('system.produits.spas.list-spas')->with([
            'listeSpas'              =>  $listeSpas
        ]);
    }

    public function listPacks()
    {

        $listePacks = Pack::orderby('pack_id', 'ASC')->get();

        return view('system.produits.packs.list-packs')->with([
            'listePacks'              =>  $listePacks
        ]);
    }

    public function listAccessoires()
    {

        $listeAccessoires = Accessoire::orderby('accessoire_id', 'ASC')->get();

        return view('system.produits.accessoires.list-accessoires')->with([
            'listeAccessoires'              =>  $listeAccessoires
        ]);
    }
}
