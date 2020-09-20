<?php
namespace App\Http\Controllers\system;

use App\Http\Controllers\Controller;
use App\Logement;

class BackOfficeController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function dashboard()
    {
        return view('system.backoffice.dashboard')->with([]);
    }
}
