<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Promo;
use App\Spa;
use App\Reservation;

class WebserviceController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function verifyPromo(Request $request)
    {
        $promo       = Promo::where('promo_libelle', 'LIKE', $request->code)->first();

        if($promo != NULL)
        {
            return response()->json([
                'promo'       => $promo
            ]);
        }
        else
        {
            return "";
        }
    }

    public function verifySpaStock(Request $request)
    {
        $reservations = Reservation::select('reservation_spa_id')
                                    ->where([
                                        ['reservation_date_debut', '<=', $request->date_debut],
                                        ['reservation_date_fin', '>=', $request->date_debut]
                                    ])
                                    ->orWhere([
                                        ['reservation_date_debut', '<=', $request->date_fin],
                                        ['reservation_date_fin', '>=', $request->date_fin]
                                    ])
                                    ->orWhere([
                                        ['reservation_date_debut', '>=', $request->date_debut],
                                        ['reservation_date_fin', '<=', $request->date_fin]
                                    ])
                                    ->get();
        
        $spas = Spa::where('spa_nb_place', '=', $request->nb_place)->get();

        $reserv = [];
        $nbSpaReserv = [];

        if(count($reservations) > 0)
        {
            foreach($reservations as $reservation)
            {
                $nbSpaReserv[$reservation->reservation_spa_id] = 0;
            }

            foreach($reservations as $reservation)
            {
                $nbSpaReserv[$reservation->reservation_spa_id] = $nbSpaReserv[$reservation->reservation_spa_id] + 1;
            }

            foreach($reservations as $reservation)
            {
                if($nbSpaReserv[$reservation->reservation_spa_id] >= $reservation->spa->spa_stock)
                {
                    if(!in_array($reservation->reservation_spa_id, $reserv))
                    {
                        array_push($reserv, $reservation->reservation_spa_id);
                    }
                }
            }
        }

        $html = "";
        if(count($spas) > 0)
        {
            foreach($spas as $spa)
            {
                if(!in_array($spa->spa_id, $reserv))
                {
                    $html .= '<label for="spa-'.$spa->spa_id.'" class="btn btn-radio-custom col-lg-4 col-md-6 mb-3 spa-recap" data-aos="fade-up" rel="'.$spa->spa_prix.'" rel2="'.$spa->spa_libelle.' '.$spa->spa_nb_place.' places">';
                        $html .= '<input type="radio" name="spa" id="spa-'.$spa->spa_id.'" autocomplete="off" value="'.$spa->spa_id.'">';
                        $html .= '<div class="block-team-member-1 text-center rounded">';
                            $html .= '<figure>';
                                $html .= '<img src="'.url($spa->spa_chemin_img).'" alt="Image" class="img-fluid rounded-circle">';
                            $html .= '</figure>';
                            $html .= '<h3 class="font-size-20 text-black">'.$spa->spa_libelle.'</h3>';
                            $html .= '<span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-14 mb-3">'.$spa->spa_desc.'</span>';
                        $html .= '</div>';
                    $html .= '</label>';
                }
                else
                {
                    $html .= '<label for="spa-'.$spa->spa_id.'" class="btn btn-radio-custom col-lg-4 col-md-6 mb-3 spa-recap disabled" data-aos="fade-up" rel="'.$spa->spa_prix.'" rel2="'.$spa->spa_libelle.' '.$spa->spa_nb_place.' places">';
                        $html .= '<input type="radio" name="spa" id="spa-'.$spa->spa_id.'" disabled autocomplete="off" value="'.$spa->spa_id.'">';
                        $html .= '<div class="block-team-member-1 text-center rounded">';
                            $html .= '<figure>';
                                $html .= '<img src="'.url($spa->spa_chemin_img).'" alt="Image" class="img-fluid rounded-circle">';
                            $html .= '</figure>';
                            $html .= '<h3 class="font-size-20 text-black">'.$spa->spa_libelle.'</h3>';
                            $html .= '<span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-14 mb-3">'.$spa->spa_desc.'</span>';
                            $html .= '<span class="text-danger">Victime de son succès</span>';
                        $html .= '</div>';
                    $html .= '</label>';
                }
            }
        }

        return response()->json([
            'spas'          => $html
        ]);
    }
}
