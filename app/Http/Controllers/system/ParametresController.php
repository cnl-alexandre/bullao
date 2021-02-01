<?php
namespace App\Http\Controllers\system;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Promo;
use App\Reservation;
use App\Indisponibilite;
use Illuminate\Http\Request;
use App\Parametre;

class ParametresController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function listCodesPromo()
    {
        $listeCodesPromo = Promo::orderby('promo_id', 'DESC')->get();

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

    public function listIndispo()
    {
        $listeIndispo = Indisponibilite::orderby('indisponibilite_date', 'DESC')->get();

        return view('system.parametres.indisponibilite.list')->with([
            'listeIndispo'              =>  $listeIndispo
        ]);
    }

    public function newIndispo()
    {
        return view('system.parametres.indisponibilite.edit')->with([
            'action'              =>  url('/system/parametres/indisponibilite/new')
        ]);
    }

    public function newIndispoSubmit(Request $request)
    {
        $this->validate($request,[
            'indispoDate'               => 'required'
        ]);

        $newIndispo             = new Indisponibilite;
        $newIndispo->edit($request);

        Session::put('success', 'La date a bien été ajouté.');
        return redirect('/system/parametres/indisponibilite/list');
    }

    public function editIndispo($id)
    {
        $indispo = Indisponibilite::find($id);

        return view('system.parametres.indisponibilite.edit')->with([
            'indispo'           => $indispo,
            'action'        => url('/system/parametres/indisponibilite/edit/'.$id)
        ]);
    }

    public function editIndispoSubmit(Request $request, $id)
    {
        $this->validate($request,[
            'indispoDate'               => 'required'
        ]);

        $newIndispo = Indisponibilite::find($id);;
        $newIndispo->edit($request);

        Session::put('success', 'La date a bien été modifié.');
        return redirect('/system/parametres/indisponibilite/list');
    }

    public function parameters()
    {
        $parametres = Parametre::all();

        $parameters = [];

        foreach($parametres as $parametre)
        {
            $parameters[$parametre->parametre_libelle] = $parametre->parametre_value;
        }

        return view('system.parametres.parameters')->with([
            'parametres'              =>  $parameters
        ]);
    }

    public function maintenanceSubmit(Request $request)
    {
        // Mode
        $maintenance = Parametre::where('parametre_libelle', '=', 'maintenance')->first();
        if($maintenance == NULL)
        {
            $maintenance = new Parametre;
            $maintenance->parametre_libelle = "maintenance";
        }
        $maintenance->parametre_value = $request->maintenance;
        $maintenance->save();

        // Message
        $message = Parametre::where('parametre_libelle', '=', 'maintenance_message')->first();
        if($message == NULL)
        {
            $message = new Parametre;
            $message->parametre_libelle = "maintenance_message";
        }
        $message->parametre_value = $request->maintenance_message;
        $message->save();

        if($request->maintenance == "1")
        {
            Session::put('success', 'La maintenance est activée.');
        }
        else
        {
            Session::put('success', 'La maintenance est désactivée.');
        }

        return redirect('/system/parametres/parameters');
    }
}
