<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

class User extends Model
{
    protected $connection = 'mysql';
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    
    protected $fillable = [
        'user_id'
    ];
    
    public function rank()
    {
        return $this->belongsTo('App\Rank', 'user_rank_id', 'rank_id');
    }
    
    public function administrateurs()
    {
        return $this->hasMany('App\Administrateur', 'administrateur_user_id');
    }
    
    public function clients()
    {
        return $this->hasMany('App\Client', 'client_user_id');
    }
    
    public function getStatus()
    {
        if($this->user_last_connection != NULL && (time() - strtotime($this->user_last_connection)) <= 60)
        {
            echo '<span class="badge badge-success" title="'.$this->DateLastConnection->format('d/m/Y H:i').'">En ligne</span>';
        }
        else
        {
            if($this->user_last_connection != NULL)
            {
                echo '<span class="badge badge-secondary" title="'.$this->DateLastConnection->format('d/m/Y H:i').'">Hors ligne</span>';
            }
            else
            {
                echo '<span class="badge badge-secondary" title="Jamais connecté">Hors ligne</span>';
            }
        }
    }
    
    public function createSession()
    {
        Session::forget('User');
        Session::pull('User');
        Session::put('User', $this);
    }
    
    public function sendForgotPassword()
    {
        // Récupération des infos de l'administrateur associé à l'utilisateur
        $admin = Administrateur::where('administrateur_user_id','=',$this->user_id)->first();

        // Génération d'un nouveau mot de passe
        $new_password = $this->randomPassword(10);

        // Création et remplissage d'un tableau pour le mail à envoyer
        $contact['firstname']   = $admin->administrateur_prenom;
        $contact['lastname']    = $admin->administrateur_nom;
        $contact['email']       = $admin->administrateur_email;
        $contact['login']       = $this->user_login;
        $contact['password']    = $new_password;

        $user = User::find($this->user_id);
        $user->user_password = sha1($new_password);
        $user->save();

        try
        {
            Mail::send('emails.forgot-password', ['infos' => $contact], function($message)use($contact){
                $message->from(env('SUPPORT_EMAIL'));
                $message->to($contact['email']);
                $message->subject('['.env('APP_NAME').'] Mot de passe oublié');
            });

            return "";
        }
        catch(Exception $e)
        {
            return $e;
        }
    }
    
    public function getDateLastConnectionAttribute()
    {
        return Carbon::parse($this->attributes['user_last_connection']);
    }
    
    public function getDateCreatedAttribute()
    {
        return Carbon::parse($this->attributes['created_at']);
    }
    
    public function getDateUpdatedAttribute()
    {
        return Carbon::parse($this->attributes['updated_at']);
    }

    public function randomPassword($length)
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890@!#';

        $pass = array();
        $alphaLength = strlen($alphabet) - 1;

        for($i = 0; $i < $length; $i++)
        {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }

        return implode($pass);
    }
}