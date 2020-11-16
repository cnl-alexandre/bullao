<?php
namespace App\Http\Controllers\system;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Client;
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


}
