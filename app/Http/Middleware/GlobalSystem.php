<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use App\Logement;
use App\Message;
use App\Administrateur;
use App\User;
use App\Parametre;

class GlobalSystem
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
        if(Session::get('User'))
        {
            // Nombre de logements en vente et qui ne sont pas encore archivés
            $nbVente  = Logement::where('logement_contrat_id', '=', '1')->where('logement_vendu', '<>', '3')->count();
            Session::put('nbVente', $nbVente);

            // Nombre de logements en vente encore actif et qui ne sont pas encore archivés
            $nbVenteActive  = Logement::where('logement_contrat_id', '=', '1')->where('logement_vendu', '<>', '3')->where('logement_etat', '=', '1')->count();
            Session::put('nbVenteActive', $nbVenteActive);

            // Nombre de logements en vente plus actif et qui ne sont pas encore archivés
            $nbVenteInnactive  = Logement::where('logement_contrat_id', '=', '1')->where('logement_vendu', '<>', '3')->where('logement_etat', '=', '0')->count();
            Session::put('nbVenteInnactive', $nbVenteInnactive);

            // Nombre de logements sous compromis de vente, vendu ou archivé
            $nbVenteVendu  = Logement::where('logement_contrat_id', '=', '1')->where('logement_vendu', '<>', '0')->where('logement_etat', '=', '1')->count();
            Session::put('nbVenteVendu', $nbVenteVendu);

            // Nombre de logements en location et qui ne sont pas encore archivés
            $nbLocation  = Logement::where('logement_contrat_id', '=', '2')->where('logement_vendu', '<>', '3')->count();
            Session::put('nbLocation', $nbLocation);

            // Nombre de nouveaux messages
            $nbNewMessage  = Message::where('message_lu', '=', '0')->count();
            Session::put('nbNewMessage', $nbNewMessage);

            // Pour savoir si un utilisateur est connecté actuellement ou non
            $user = User::find(Session::get('User')->user_id);
            $user->user_last_connection = date('Y-m-d H:i:s');
            $user->save();

            // Paramètres
            $parametre = new Parametre;
            Session::put('Parametres', $parametre->getParams());

            return $next($request);
        }
        else
        {
            if(!isset($_COOKIE[env('NAME_COOKIE').'-token']))
            {
                Session::put('error', 'Veuillez vous connecter pour accéder à cette page.');
            }

            return redirect('/account/login');
        }
    }
}
