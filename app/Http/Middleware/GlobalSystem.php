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
