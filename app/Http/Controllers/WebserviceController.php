<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Promo;
use App\Spa;
use App\Reservation;
use App\Pack;
use App\Accessoire;
use App\Cadeau;

class WebserviceController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function verifyPromo(Request $request)
    {
        $today = date('Y-m-d');

        // $promo      = Promo::where([
        //                     ['promo_libelle', 'LIKE', $request->code],
        //                     ['promo_date_debut', '<=', $today],
        //                     ['promo_date_fin', '>=', $today]
        //                     ])
        //                     ->first();

        $promo      = Promo::where('promo_libelle', 'LIKE', $request->code)
                            ->where('promo_date_debut', '<=', $today)
                            ->where('promo_date_fin', '>=', $today)
                            ->first();

        $carte      = Cadeau::where('cadeau_code', 'LIKE', $request->code)
                            ->where('cadeau_date_debut', '<=', $today)
                            ->where('cadeau_date_fin', '>=', $today)
                            ->where('cadeau_montant_restant', '>=', '1')
                            ->first();

        // $carte      = Cadeau::where([
        //                     ['cadeau_code', 'LIKE', $request->code]
        //                     // ['cadeau_date_debut', '<=', $today],
        //                     // ['cadeau_date_fin', '>=', $today],
        //                     // ['cadeau_paye', '=', '1']
        //                     ])
        //                     ->first();

        if(isset($promo) && $promo != NULL)
        {
            return response()->json([
                'promo'       => $promo
            ]);
        }
        elseif(isset($carte) && $carte != NULL)
        {
            return response()->json([
                'carte'       => $carte
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
                                        ['reservation_date_fin', '>=', $request->date_debut],
                                        ['reservation_paye', '=', '1']
                                    ])
                                    ->orWhere([
                                        ['reservation_date_debut', '<=', $request->date_fin],
                                        ['reservation_date_fin', '>=', $request->date_fin],
                                        ['reservation_paye', '=', '1']
                                    ])
                                    ->orWhere([
                                        ['reservation_date_debut', '>=', $request->date_debut],
                                        ['reservation_date_fin', '<=', $request->date_fin],
                                        ['reservation_paye', '=', '1']
                                    ])
                                    ->get();

        $spas = Spa::get();

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
                if($reservation->reservation_spa_id != NULL)
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
        }

        $html = "";
        if(count($spas) > 0)
        {
            foreach($spas as $spa)
            {
                if(!in_array($spa->spa_id, $reserv) && $spa->spa_stock > 0)
                {
                    $html .= '<label for="spa-'.$spa->spa_id.'" class="btn btn-radio-custom col-lg-4 col-md-6 mb-3 spa-recap spa-no-disabled spa" data-aos="fade-up">';
                        $html .= '<input type="radio" name="spa" id="spa-'.$spa->spa_id.'" class="spa" autocomplete="off" value="'.$spa->spa_id.'">';
                        $html .= '<div class="block-team-member-1 text-center input-row-step1-responsive radius">';
                            $html .= '<figure class="col-3 col-md-12 mt-1">';
                                $html .= '<img src="'.url($spa->spa_chemin_img).'" alt="Image" class="img-fluid rounded-circle">';
                            $html .= '</figure>';
                            $html .= '<div class="col-9 col-md-12 ml-1 ml-md-0">';
                                $html .= '<h3 class="font-size-20 text-primaire">'.$spa->spa_libelle.'</h3>';
                                $html .= '<span class="d-block font-gray-6 font-size-14 mb-1">'.$spa->spa_desc.'</span>';
                                $html .= '<span class="d-block font-size-14 mb-1">'.$spa->spa_nb_place.' places - '.$spa->spa_prix.'€</span>';
                            $html .= '</div>';
                        $html .= '</div>';
                    $html .= '</label>';
                }
                else
                {
                    $html .= '<label for="spa-'.$spa->spa_id.'" class="btn btn-radio-custom col-lg-4 col-md-6 mb-3 spa-recap disabled spa" data-aos="fade-up">';
                        $html .= '<input type="radio" name="spa" id="spa-'.$spa->spa_id.'" class="spa" disabled autocomplete="off" value="'.$spa->spa_id.'">';
                        $html .= '<div class="block-team-member-1 text-center rounded nostock input-row-step1-responsive radius">';
                            $html .= '<figure class="col-3 col-md-12 mt-1">';
                                $html .= '<img src="'.url($spa->spa_chemin_img).'" alt="Image" class="img-fluid rounded-circle">';
                            $html .= '</figure>';
                            $html .= '<div class="col-9 col-md-12 ml-1 ml-md-0">';
                                $html .= '<h3 class="font-size-20 text-primaire">'.$spa->spa_libelle.'</h3>';
                                // $html .= '<span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-14 mb-3">'.$spa->spa_desc.'</span>';
                                $html .= '<span class="d-block font-size-14 mb-1" style="opacity:0.6;">Victime de son succès<br>sur les dates choisies.</span>';
                                $html .= '<span class="d-block font-size-14 mb-1">'.$spa->spa_nb_place.' places - '.$spa->spa_prix.'€</span>';
                                $html .= '</div>';
                        $html .= '</div>';
                    $html .= '</label>';
                }
            }

            $html .= '<script>';
                $html .= '$("#btn-confirm").attr("disabled", true);';
                $html .= '$(".spa-no-disabled").click(function() {';
                    $html .= '$("html, body").animate({';
                        $html .= 'scrollTop: $("#packs-section").offset().top';
                    $html .= '}, 1500);';
                    $html .= '$("#btn-confirm").attr("disabled", false);';
                    $html .= '$("#btn-confirm").attr("title", null);';
                $html .= '})';
            $html .= '</script>';
        }

        return response()->json([
            'spas'          => $html
        ]);
    }

    public function verifyPackStock(Request $request)
    {
        $reservations = Reservation::select('reservation_pack_id')
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

        $packs = Pack::all();

        $reserv = [];
        $nbPackReserv = [];

        if(count($reservations) > 0)
        {
            foreach($reservations as $reservation)
            {
                $nbPackReserv[$reservation->reservation_pack_id] = 0;
            }

            foreach($reservations as $reservation)
            {
                $nbPackReserv[$reservation->reservation_pack_id] = $nbPackReserv[$reservation->reservation_pack_id] + 1;
            }

            foreach($reservations as $reservation)
            {
                if($nbPackReserv[$reservation->reservation_pack_id] >= $reservation->pack->pack_stock)
                {
                    if(!in_array($reservation->reservation_pack_id, $reserv))
                    {
                        array_push($reserv, $reservation->reservation_pack_id);
                    }
                }
            }
        }

        $html = "";
        if(count($packs) > 0)
        {
            foreach($packs as $pack)
            {
                if(!in_array($pack->pack_id, $reserv))
                {
                    $html .= '<label for="spa-'.$spa->spa_id.'" class="btn btn-radio-custom col-lg-4 col-md-6 mb-3 spa-recap" data-aos="fade-up" rel="'.$spa->spa_prix.'" rel2="'.$spa->spa_libelle.' '.$spa->spa_nb_place.' places">';
                        $html .= '<input type="radio" name="spa" id="spa-'.$spa->spa_id.'" autocomplete="off" value="'.$spa->spa_id.'">';
                        $html .= '<div class="block-team-member-1 text-center rounded radius">';
                            $html .= '<figure>';
                                $html .= '<img src="'.url($spa->spa_chemin_img).'" alt="Image" class="img-fluid rounded-circle">';
                            $html .= '</figure>';
                            $html .= '<h3 class="font-size-20 text-action">'.$spa->spa_libelle.'</h3>';
                            $html .= '<span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-14 mb-1">'.$spa->spa_desc.'</span>';
                            $html .= '<span class="d-block font-size-14 mb-1">'.$spa->spa_prix.'€</span>';
                        $html .= '</div>';
                    $html .= '</label>';
                }
                else
                {
                    $html .= '<label for="spa-'.$spa->spa_id.'" class="btn btn-radio-custom col-lg-4 col-md-6 mb-3 spa-recap disabled" data-aos="fade-up" rel="'.$spa->spa_prix.'" rel2="'.$spa->spa_libelle.' '.$spa->spa_nb_place.' places">';
                        $html .= '<input type="radio" name="spa" id="spa-'.$spa->spa_id.'" disabled autocomplete="off" value="'.$spa->spa_id.'">';
                        $html .= '<div class="block-team-member-1 text-center rounded nostock radius">';
                            $html .= '<figure>';
                                $html .= '<img src="'.url($spa->spa_chemin_img).'" alt="Image" class="img-fluid rounded-circle">';
                            $html .= '</figure>';
                            $html .= '<h3 class="font-size-20 text-action">'.$spa->spa_libelle.'</h3>';
                            // $html .= '<span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-14 mb-3">'.$spa->spa_desc.'</span>';
                            $html .= '<span class="text-danger letter-spacing-1 text-uppercase font-size-14" style="opacity:0.6;">Victime de son succès</span>';
                            $html .= '<span class="d-block font-size-14 mb-1">'.$spa->spa_prix.'€</span>';
                        $html .= '</div>';
                    $html .= '</label>';
                }
            }
        }

        return response()->json([
            'packs'          => $html
        ]);
    }

    public function verifyAccessoireStock(Request $request)
    {
        $reservations = Reservation::where([
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

        $accessoires = Accessoire::orderby('accessoire_stock', 'DESC')->orderby('accessoire_prix', 'DESC')->get();;

        $reserv = [];
        $nbAccessoireReserv = [];

        if(count($reservations) > 0)
        {
            foreach($accessoires as $accessoire)
            {
                $nbAccessoireReserv[$accessoire->accessoire_id] = 0;
            }

            foreach($reservations as $reservation)
            {
                if(count($reservation->accessoires) > 0)
                {
                    foreach($reservation->accessoires as $rAccessoire)
                    {
                        $nbAccessoireReserv[$rAccessoire->ra_accessoire_id]++;
                    }
                }
            }

            foreach($reservations as $reservation)
            {
                if(count($reservation->accessoires) > 0)
                {
                    foreach($reservation->accessoires as $rAccessoire)
                    {
                        if($nbAccessoireReserv[$rAccessoire->ra_accessoire_id] >= $rAccessoire->accessoire->accessoire_stock)
                        {
                            if(!in_array($rAccessoire->ra_accessoire_id, $reserv))
                            {
                                array_push($reserv, $rAccessoire->ra_accessoire_id);
                            }
                        }
                    }
                }
            }
        }

        $html = "";
        if(count($accessoires) > 0)
        {
            foreach($accessoires as $accessoire)
            {
                if(!in_array($accessoire->accessoire_id, $reserv) && $accessoire->accessoire_stock > 0)
                {
                    $html .= '<label for="accessoire-'.$accessoire->accessoire_id.'" class="btn btn-checkbox-custom col-lg-3 col-md-4 col-6 mb-3 accessoire-recap" data-aos="fade-up">';
                        $html .= '<input type="checkbox" name="accessoires[]" id="accessoire-'.$accessoire->accessoire_id.'" autocomplete="off" value="'.$accessoire->accessoire_id.'">';
                        $html .= '<div class="block-team-member-1 text-center rounded  radius" style="height: 100%;">';
                            $html .= '<figure>';
                                $html .= '<img src="'.url($accessoire->accessoire_chemin_img).'" alt="Image" class="img-fluid rounded-circle">';
                            $html .= '</figure>';
                            $html .= '<h3 class="font-size-18 text-primaire">'.$accessoire->accessoire_libelle.'</h3>';
                            $html .= '<span class="d-block font-gray-5 font-size-14 mb-1">'.$accessoire->accessoire_prix.'€</span>';
                        $html .= '</div>';
                    $html .= '</label>';
                }
                else
                {
                    $html .= '<label for="accessoire-'.$accessoire->accessoire_id.'" class="btn btn-checkbox-custom col-lg-3 col-md-4 col-6 mb-3 accessoire-recap disabled" data-aos="fade-up">';
                        $html .= '<input type="checkbox" name="accessoires[]" id="accessoire-'.$accessoire->accessoire_id.'" disabled autocomplete="off" value="'.$accessoire->accessoire_id.'">';
                        $html .= '<div class="block-team-member-1 text-center rounded nostock radius" style="height: 100%;">';
                            $html .= '<figure>';
                                $html .= '<img src="'.url($accessoire->accessoire_chemin_img).'" alt="Image" class="img-fluid rounded-circle">';
                            $html .= '</figure>';
                            $html .= '<h3 class="font-size-18 text-primaire">'.$accessoire->accessoire_libelle.'</h3>';
                            // $html .= '<span class="d-block font-gray-5 font-size-14 mb-2">'.$accessoire->accessoire_prix.'€</span>';
                            $html .= '<span class="text-danger">Victime de son succès</span>';
                        $html .= '</div>';
                    $html .= '</label>';
                }
            }
        }

        return response()->json([
            'accessoires'           => $html,
            'reserv'                => $reserv
        ]);
    }
}
