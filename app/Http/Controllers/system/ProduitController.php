<?php
namespace App\Http\Controllers\system;

use App\Http\Controllers\Controller;
use App\Spa;
use App\Pack;
use App\Accessoire;
// use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function listSpas()
    {

        $listeSpas = Spa::orderby('spa_id', 'ASC')->get();

        return view('system.produits.spas.list')->with([
            'listeSpas'              =>  $listeSpas
        ]);
    }

    public function newSpa()
    {
        return view('system.produits.spas.edit')->with([
            'action'        => url('/system/produits/spas/new')
        ]);
    }
    public function newSpaSubmit(Request $request)
    {
        $this->validate($request,[
            // Propriétés de l'annonce
            'spaLibelle'              => 'required',
            'spaPlace'                => 'required',
            'spaPrix'                 => 'required',
            'spaPrixSupp'             => 'required',
            'spaStock'                => 'required',
            'spaDescription'          => 'required'
        ]);

        $newSpa             = new Spa;
        $newSpa->edit($request);

        Session::put('success', 'Le spa a bien été ajouté.');
        return redirect('/system/produits/spas/list');
    }

    public function editSpa($id)
    {
        $spa = Spa::find($id);

        return view('system.produits.spas.edit')->with([
            'spa'           => $spa,
            'action'        => url('/system/produits/spas/new')
        ]);
    }
    public function editSpaSubmit(Request $request, $id)
    {
        $this->validate($request,[
            // Propriétés de l'annonce
            'spaLibelle'              => 'required',
            'spaPlace'                => 'required',
            'spaPrix'                 => 'required',
            'spaPrixSupp'             => 'required',
            'spaStock'                => 'required',
            'spaDescription'          => 'required'
        ]);

        $newSpa = Spa::find($id);;
        $newSpa->edit($request);

        Session::put('success', 'Le spa a bien été modifié.');
        return redirect('/system/produits/spas/list');
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
