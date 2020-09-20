<?php
namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Client;

class AccountController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function dashboard()
    {
        return view('customer.dashboard')->with([]);
    }
}