<?php
namespace App\Http\Controllers\system;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Client;
use App\Adresse;
use App\Reservation;
use App\Pack;
use App\Accessoire;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function listClients()
    {
        $listeClients = Client::orderby('client_id', 'DESC')->get();

        return view('system.clients.list')->with([
            'listeClients'              =>  $listeClients
        ]);
    }

    public function newClient()
    {
        $adresses = [];

        return view('system.clients.edit')->with([
            'adresses'      => $adresses,
            'action'        => url('/system/clients/new')
        ]);
    }

    public function newClientSubmit(Request $request){
        $this->validate($request,[
            'name'                => 'required'
        ]);

        $newClient = new Client;
        $newClient->create($request);
        $idClient = $newClient->client_id;

        if(isset($request->ville) && $request->ville != ""){
            $newAdresse = new Adresse;
            $newAdresse->create($idClient, $request);
        }

        Session::put('success', 'Le client a bien été ajouté');
        return redirect('/system/clients/edit/'.$idClient);
    }

    public function editClient($id)
    {
        $client = Client::find($id);
        $reservations = Reservation::where('reservation_client_id', '=', $id)
                                    ->where('reservation_active', '=', 1)
                                    ->orderby('reservation_date_debut', 'ASC')
                                    ->get();

        $adresses = Adresse::where('adresse_client_id', '=', $id)
                            ->orderby('adresse_id', 'ASC')
                            ->get();

        return view('system.clients.edit')->with([
            'client'                    => $client,
            'reservations'              => $reservations,
            'adresses'                  => $adresses,
            'action'                    => url('/system/clients/edit/'.$id)
        ]);
    }

    public function editClientSubmit(Request $request, $id){
        $this->validate($request,[
            'name'                => 'required'
        ]);

        $client = Client::find($id);
        $client->edit($request);

        // Si un id est existant, on save les modifications par l'id
        // if(isset($request->idAdresse)){
        //     $adresse = Adresse::find($request->idAdresse);
        //     $adresse->edit($id, $request);
        // }
        // else {
        //     $newAdresse = new Adresse;
        //     $newAdresse->create($id, $request);
        // }

        if(count($client->adresses) > 0){
            for ($i=1; $i <= count($client->adresses); $i++) {
                $adresse = Adresse::find($request["id-".$i]);
                $adresse->edit($request, $i);
            }
        }

        // if(isset($request->ville) && $request->ville != "")
        // {
        //
        //     $verif = Adresse::where('adresse_rue', 'LIKE', $request->ville)
        //                     ->where('adresse_ville', 'LIKE', $request->adresse1)
        //                     ->get();
        //
        //     if(count($verif) == 0){
        //
        //     }
        //
        //     $address = new Adresse;
        //     $address->edit($request);
        // }

        Session::put('success', 'Le client a bien été modifié');
        return redirect('/system/clients/edit/'.$id);
    }
}
