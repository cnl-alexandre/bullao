<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use App\Logement;
use App\Parametre;

class GlobalCustomer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $nbVenteMaison  = Logement::where('logement_contrat_id', '=', '1')->where('logement_type_id', '=', '1')->where('logement_etat','=','1')->count();
        Session::put('nbVenteMaison', $nbVenteMaison);

        $nbVenteAppartement  = Logement::where('logement_contrat_id', '=', '1')->where('logement_type_id', '=', '2')->where('logement_etat','=','1')->count();
        Session::put('nbVenteAppartement', $nbVenteAppartement);

        $nbVenteVaires  = Logement::where('logement_contrat_id', '=', '1')->where('logement_ville', 'LIKE', 'Vaires-sur-Marne')->where('logement_etat','=','1')->count();
        Session::put('nbVenteVaires', $nbVenteVaires);

        $nbVenteThorigny  = Logement::where('logement_contrat_id', '=', '1')->where('logement_ville', 'LIKE', 'Thorigny-sur-Marne')->where('logement_etat','=','1')->count();
        Session::put('nbVenteThorigny', $nbVenteThorigny);

        $nbVenteBrou  = Logement::where('logement_contrat_id', '=', '1')->where('logement_ville', 'LIKE', 'Brou-sur-Chantereine')->where('logement_etat','=','1')->count();
        Session::put('nbVenteBrou', $nbVenteBrou);

        $nbVenteLagny  = Logement::where('logement_contrat_id', '=', '1')->where('logement_ville', 'LIKE', 'Lagny-sur-Marne')->where('logement_etat','=','1')->count();
        Session::put('nbVenteLagny', $nbVenteLagny);

        Session::put('nbVente', ($nbVenteMaison + $nbVenteAppartement));

        // Paramètres
        $parametre = new Parametre;
        Session::put('Parametres', $parametre->getParams());

        return $next($request);
    }
}
