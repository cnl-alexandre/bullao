<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function faq()
    {
        return view('articles.faq')->with([]);
    }

    public function mentions()
    {
        return view('articles.mentions')->with([]);
    }

    public function cgv()
    {
        return view('articles.cgv')->with([]);
    }
}
