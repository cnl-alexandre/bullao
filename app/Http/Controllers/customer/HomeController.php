<?php
namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function home()
    {
        return view('customer.home')->with([]);
    }

    public function reservation()
    {
        return view('customer.reservation')->with([]);
    }
}
