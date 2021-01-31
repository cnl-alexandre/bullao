<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use App\Logement;
use App\Message;
use App\Administrateur;
use App\User;
use App\Parametre;

class Maintenance
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
        $parametre = Parametre::where('parametre_libelle', "=", "maintenance")->first();

        if($parametre == NULL)
        {
            return $next($request);
        }
        else
        {
            if(Session::get('Admin') || $parametre->parametre_value == "0")
            {
                return $next($request);
            }
            else
            {
                return redirect('/maintenance');
            }
        }
    }
}
