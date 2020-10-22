<?php
namespace App\Http\Controllers\system;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Promo;
use App\Reservation;
use Illuminate\Http\Request;

class ParametresController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function listCodesPromo()
    {
        $listeCodesPromo = Promo::orderby('promo_id', 'ASC')->get();

        // Count par utilisation de code promo dans reservation

        return view('system.parametres.promo.list')->with([
            'listePromo'              =>  $listeCodesPromo
        ]);
    }

    public function newCodePromo()
    {
        return view('system.parametres.promo.edit')->with([
            'action'              =>  url('/system/parametres/codespromo/new')
        ]);
    }

    public function newCodePromoSubmit(Request $request)
    {
        $this->validate($request,[
            'promoLibelle'              => 'required',
            'promoValeur'               => 'required',
            'promoDateDebut'                => 'required',
            'promoDateFin'                  => 'required'
        ]);

        $newPromo             = new Promo;
        $newPromo->edit($request);

        Session::put('success', 'Le code promo a bien été ajouté.');
        return redirect('/system/parametres/codespromo/list');
    }

    public function editCodePromo($id)
    {
        $promo = Promo::find($id);

        return view('system.parametres.promo.edit')->with([
            'promo'           => $promo,
            'action'        => url('/system/parametres/codespromo/edit/'.$id)
        ]);
    }

    public function editCodePromoSubmit(Request $request, $id)
    {
        $this->validate($request,[
            'promoLibelle'              => 'required',
            'promoValeur'               => 'required',
            'promoDateDebut'                => 'required',
            'promoDateFin'                  => 'required'
        ]);

        $newPromo = Promo::find($id);;
        $newPromo->edit($request);

        Session::put('success', 'Le code promo a bien été modifié.');
        return redirect('/system/parametres/codespromo/list');
    }
}