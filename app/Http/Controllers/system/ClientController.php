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
        return view('system.clients.edit')->with([
            'action'        => url('/system/clients/new')
        ]);
    }

    public function newClientSubmit(Request $request){
        $this->validate($request,[
            'clientName'                => 'required',
            'clientPhone'               => 'required',
            'clientEmail'               => 'required'
        ]);

        $newClient = new Client;
        $newClient->edit($request);

        Session::put('success', 'Le client a bien été ajouté');
        return redirect('/system/clients/list');
    }

    public function editClient($id)
    {
        $client = Client::find($id);
        $reservations = Reservation::where('reservation_client_id', '=', $id)
                                    ->orderby('reservation_date_debut', 'ASC')
                                    ->get();
        $adresses = Adresse::where('adresse_client_id', '=', $id)
                            ->orderby('adresse_id', 'ASC')
                            ->get();
        // $packs = Pack::All();
        // $accessoires = Accessoire::All();
        //
        // $idAccessoiresReservation = [];
        //
        // if(count($reservation->accessoires) > 0)
        // {
        //     foreach($reservation->accessoires as $accessoire)
        //     {
        //         array_push($idAccessoiresReservation, $accessoire->ra_accessoire_id);
        //     }
        // }

        return view('system.clients.edit')->with([
            'client'                    => $client,
            'reservations'              => $reservations,
            'adresses'                  => $adresses,
            // 'packs'                     => $packs,
            // 'accessoires'               => $accessoires,
            'action'                    => url('/system/clients/edit/'.$id)
            // 'idAccessoiresReservation'  => $idAccessoiresReservation
        ]);
    }

    public function editClientSubmit(Request $request, $id){
        $this->validate($request,[
            'clientName'                => 'required',
            'clientPhone'               => 'required',
            'clientEmail'               => 'required'
        ]);

        $client = Client::find($id);
        $client->edit($request);

        Session::put('success', 'Le client a bien été modifié');
        return redirect('/system/clients/list');
    }
}
