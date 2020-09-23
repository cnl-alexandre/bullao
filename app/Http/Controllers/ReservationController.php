<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Indisponibilite;
use App\Spa;
use App\Pack;
use App\Accessoire;

class ReservationController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function reservation($nbPlace = 4)
    {
        $indispos       = Indisponibilite::where('indisponibilite_date', '>=', date('Y-m-d'))->get();
        $spas           = Spa::where('spa_nb_place', '=', $nbPlace)->orderby('spa_id', 'ASC')->get();
        $packs          = Pack::orderby('pack_id', 'ASC')->get();
        $accessoires    = Accessoire::orderby('accessoire_id', 'ASC')->get();

        return view('reservation')->with([
            'indispos'      => $indispos,
            'spas'          => $spas,
            'packs'         => $packs,
            'accessoires'   => $accessoires
        ]);
    }

    public function reservationSubmit(Request $request)
    {
        $this->validate($request,[
            'daterange'         => 'required',
            'spa'               => 'required',
            'emplacement'       => 'required',
            'installation'      => 'required',
            'name'              => 'required',
            'email'             => 'required',
            'phone'             => 'required',
            'adresse1'          => 'required',
            'ville'             => 'required',
            'cp'                => 'required'
        ]);

        $reservation                            = new Reservation;
        $reservation->create($request);

        Session::put('success', 'L\'annonce a bien été ajoutée.');
        return redirect('/administration/annonce/edit/'.$annonce->logement_id);
    }
}
