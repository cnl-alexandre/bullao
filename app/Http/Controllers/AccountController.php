<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Administrateur;
use App\Reservation;
use Illuminate\Support\Facades\Mail;

class AccountController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function login()
    {
        if(isset($_COOKIE[env('NAME_COOKIE').'-token']))
        {
            $token = $_COOKIE[env('NAME_COOKIE').'-token'];

            $user = User::where('remember_token', '=', $token)->first();
            
            if($user != NULL)
            {
                $user->createSession();
            
                $admin = Administrateur::where('administrateur_user_id','=',$user->user_id)->first();
                $admin->createSession();

                Session::put('info', 'Bonjour <strong>'.$admin->administrateur_prenom.'</strong>, bienvenue sur le tableau de bord !');
                return redirect('/system/dashboard');
            }
        }
        
        return view('account.login')->with([]);
    }

    public function loginSubmit(Request $request)
    {
        $user = User::where([
            ['user_login', '=', $request->login],
            ['user_password', '=', sha1($request->password)]
        ])->first();

        if(isset($user))
        {
            if(isset($request->rememberme))
            {
                //Generate a random string.
                $token = openssl_random_pseudo_bytes(16);
                
                //Convert the binary data into hexadecimal representation.
                $token = bin2hex($token);

                setcookie(env('NAME_COOKIE').'-token', $token);

                $user->remember_token = $token;
            }
            else
            {
                $user->remember_token = NULL;
            }
            $user->save();

            $user->createSession();

            // En fonction du rang de l'utilisateur qui se connecte...
            switch($user->rank->rank_libelle)
            {
                case "Administrateur";
                    $admin = Administrateur::where('administrateur_user_id','=',$user->user_id)->first();
                    $admin->createSession();

                    $link = '/system/dashboard';

                    Session::put('success', 'Bonjour <strong>'.$admin->administrateur_prenom.'</strong>, bienvenue sur le tableau de bord !');
                    break;
                
                case "Client":
                    $client = Client::where('client_user_id','=',$user->user_id)->first();
                    $client->createSession();

                    if(Session::get('Order'))
                    {
                        $link = Session::get('Order');
                    }
                    else
                    {
                        $link = '/account/dashboard';
                    }

                    Session::put('success', 'Bonjour <strong>'.$client->client_name.'</strong> !');
                    break;
            }

            return redirect($link);
        }
        else
        {
            Session::put('error', 'Votre identifiant ou votre mot de passe est incorrect.');
            return redirect('/account/login');
        }
    }

    public function forgotPassword()
    {
        return view('account.forgot-password')->with([]);
    }

    public function forgotPasswordSubmit(Request $request)
    {
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = [
            'secret'    => env('RECAPTCHA_SITE_KEY'),
            'response'  => request('recaptcha')
        ];

        $options = [
            'http' => [
                'header'    => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'    => 'POST',
                'content'   => http_build_query($data)
            ]
        ];

        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        $resultJson = json_decode($result);

        if($resultJson->success)
        {
            $user = User::where('user_login', '=', $request->login)->first();

            if(isset($user))
            {
                $admin = Administrateur::where('administrateur_user_id','=',$user->user_id)->first();

                if($admin->administrateur_email == $request->email)
                {
                    $result = $user->sendForgotPassword();

                    if($result == "")
                    {
                        Session::put('info', 'Un email avec votre nouveau mot de passe vient de vous être envoyé.');
                        return redirect('/account/login');
                    }
                    else
                    {
                        Session::put('error', 'Un problème est survenue lors de l\'envoi du mail à cause de l\'erreur suivante : '.$result);
                        return redirect('/account/forgot-password');
                    }
                }
                else
                {
                    Session::put('error', 'Cet email n\'existe pas ou n\'est pas associé à cet identifiant.');
                    return redirect('/account/forgot-password');
                }
            }
            else
            {
                Session::put('error', 'Votre identifiant n\'existe pas.');
                return redirect('/account/forgot-password');
            }
        }
        else
        {
            Session::put('error', 'Problème de recaptcha.');
            return back();
        }
    }

    public function logout()
    {
        if(Session::get('User'))
        {
            $user = User::find(Session::get('User')->user_id);
            $user->remember_token = NULL;
            $user->save();

            setcookie(env('NAME_COOKIE').'-token', time() - 3600);
        }

        auth()->logout();
        Session::flush();

        Session::put('success', 'Vous venez d\'être déconnecté.<br/>Merci et à bientot !');
        return redirect('/account/login');
    }

    public function sendReservationSubmit(Request $request)
    {
        $reservations = Reservation::where('reservation_email', 'LIKE', $request->email)->get();

        if(count($reservations) > 0)
        {
            // Mail destiné au client
            Mail::send('emails.historyReservations', ['reservations' => $reservations], function($mess) use ($request){
                $mess->from(env('MAIL_EMAIL'));
                $mess->to($request->email);
                $mess->subject('Bullao : Hitorique de vos réservations');
            });
        }

        Session::put('success', 'Si vous avez des réservations, vous recevrez un mail détaillé.');
        return redirect('/');
    }
}