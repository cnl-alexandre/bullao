<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Promo;

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
}
