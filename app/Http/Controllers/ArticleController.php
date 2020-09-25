<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function mentions()
    {
        return view('mentions')->with([]);
    }

    public function cgv()
    {
        return view('cgv')->with([]);
    }
}
