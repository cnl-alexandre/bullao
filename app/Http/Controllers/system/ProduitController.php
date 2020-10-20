<?php
namespace App\Http\Controllers\system;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Spa;
use App\Pack;
use App\Accessoire;
use Illuminate\Http\Request;

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
            'spaStock'                => 'required'
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
            'action'        => url('/system/produits/spas/edit/'.$id)
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

        return view('system.produits.packs.list')->with([
            'listePacks'              =>  $listePacks
        ]);
    }

    public function newPack()
    {
        return view('system.produits.packs.edit')->with([
            'action'        => url('/system/produits/packs/new')
        ]);
    }

    public function newPackSubmit(Request $request)
    {
        $this->validate($request,[
            // Propriétés de l'annonce
            'packLibelle'              => 'required',
            'packPrix'                 => 'required',
            'packStock'                => 'required',
            'packDescription'          => 'required'
        ]);

        $newPack             = new Pack;
        $newPack->edit($request);

        Session::put('success', 'Le pack a bien été ajouté.');
        return redirect('/system/produits/packs/list');
    }

    public function editPack($id)
    {
        $pack = Pack::find($id);

        return view('system.produits.packs.edit')->with([
            'pack'           => $pack,
            'action'        => url('/system/produits/packs/edit/'.$id)
        ]);
    }

    public function editPackSubmit(Request $request, $id)
    {
        $this->validate($request,[
            // Propriétés de l'annonce
            'packLibelle'              => 'required',
            'packPrix'                 => 'required',
            'packStock'                => 'required',
            'packDescription'          => 'required'
        ]);

        $newPack = Pack::find($id);;
        $newPack->edit($request);

        Session::put('success', 'Le <b>'.$newPack->pack_libelle.'</b> a bien été modifié.');
        return redirect('/system/produits/packs/list');

    }

    public function listAccessoires()
    {

        $listeAccessoires = Accessoire::orderby('accessoire_id', 'ASC')->get();

        return view('system.produits.accessoires.list')->with([
            'listeAccessoires'              =>  $listeAccessoires
        ]);
    }

    public function newAccessoire()
    {
        return view('system.produits.accessoires.edit')->with([
            'action'        => url('/system/produits/accessoires/new')
        ]);
    }

    public function newAccessoireSubmit(Request $request)
    {
        $this->validate($request,[
            // Propriétés de l'annonce
            'accessoireLibelle'              => 'required',
            'accessoirePrix'                 => 'required',
            'accessoireStock'                => 'required'
        ]);

        $newAccessoire             = new Accessoire;
        $newAccessoire->edit($request);

        Session::put('success', 'L\'ccessoire a bien été ajouté.');
        return redirect('/system/produits/accessoires/list');
    }

    public function editAccessoire($id)
    {
        $accessoire = Accessoire::find($id);

        return view('system.produits.accessoires.edit')->with([
            'accessoire'           => $accessoire,
            'action'        => url('/system/produits/accessoires/edit/'.$id)
        ]);
    }

    public function editAccessoireSubmit(Request $request, $id)
    {
        $this->validate($request,[
            // Propriétés de l'annonce
            'accessoireLibelle'              => 'required',
            'accessoirePrix'                 => 'required',
            'accessoireStock'                => 'required'
        ]);

        $newAccessoire = Accessoire::find($id);;
        $newAccessoire->edit($request);

        Session::put('success', 'L\'accessoire '.$id.' a bien été modifié.');
        return redirect('/system/produits/accessoires/list');

    }
}
