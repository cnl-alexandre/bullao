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

    public function newCarte(){

        return view('system.cartesCdx.edit')->with([
            'action'        => url('/system/cartescadeaux/new')
        ]);
    }

    public function newCarteSubmit(Request $request){

        $newCarte = new Cadeau;
        $newCarte->create($request);
        $idCarte = $newCarte->cadeau_id;

        Session::put('success', 'La carte a bien été ajouté');
        return redirect('/system/cartescadeaux/edit/'.$idCarte);
    }

    public function editCarte($id)
    {
        $carte = Cadeau::find($id);

        return view('system.cartesCdx.edit')->with([
            'carte'                    => $carte,
            'action'                    => url('/system/cartescadeaux/edit/'.$id)
        ]);
    }
    public function editCarteSubmit(Request $request, $id){
        // $this->validate($request,[
        //     'name'                => 'required'
        // ]);

        $carte = Cadeau::find($id);
        $carte->edit($request);

        Session::put('success', 'La carte a bien été modifié');
        return redirect('/system/cartescadeaux/edit/'.$id);
    }

}
