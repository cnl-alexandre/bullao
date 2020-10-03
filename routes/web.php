<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// HOME
Route::get('/', 'HomeController@home');
Route::get('/reservation', 'ReservationController@reservation');
Route::get('/reservation/{nbPlace}places', 'ReservationController@reservation');
Route::post('/reservation', 'ReservationController@reservationSubmit');

// PRESS & ARTICLES
Route::get('/cgv-bullao', 'ArticleController@cgv');
Route::get('/mentions-legales', 'ArticleController@mentions');

// PAIEMENT
Route::get('/reservation/paiement', 'ReservationController@paiement');
Route::post('/reservation/paiement', 'ReservationController@paiementSubmit');
Route::get('/reservation/paiement-accepte', 'ReservationController@success');
Route::get('/reservation/paiement-refuse', 'ReservationController@cancel');

// WebServices
Route::post('/webservices/promo/verify', 'WebserviceController@verifyPromo');
Route::post('/webservices/spa/stock/verify', 'WebserviceController@verifySpaStock');

// LOGIN
Route::get('/account/login', 'AccountController@login');
Route::post('/account/login', 'AccountController@loginSubmit');
Route::get('/account/forgot-password', 'AccountController@forgotPassword');
Route::post('/account/forgot-password', 'AccountController@forgotPasswordSubmit');
Route::get('/account/logout', 'AccountController@logout');

/**
 *  ######  ##     ##  ######  ########  #######  ##     ## ######## ########
 * ##    ## ##     ## ##    ##    ##    ##     ## ###   ### ##       ##     ##
 * ##       ##     ## ##          ##    ##     ## #### #### ##       ##     ##
 * ##       ##     ##  ######     ##    ##     ## ## ### ## ######   ########
 * ##       ##     ##       ##    ##    ##     ## ##     ## ##       ##   ##
 * ##    ## ##     ## ##    ##    ##    ##     ## ##     ## ##       ##    ##
 *  ######   #######   ######     ##     #######  ##     ## ######## ##     ##
 */

// My account
Route::get('/account/dashboard', 'customer\AccountController@dashboard');
Route::get('/account/orders', 'customer\AccountController@orders');
Route::get('/account/addresses', 'customer\AccountController@addresses');
Route::get('/account/profil', 'customer\AccountController@profil');
Route::get('/account/preferences', 'customer\AccountController@preferences');

/**
 *  ######  ##    ##  ######  ######## ######## ##     ##
 * ##    ##  ##  ##  ##    ##    ##    ##       ###   ###
 * ##         ####   ##          ##    ##       #### ####
 *  ######     ##     ######     ##    ######   ## ### ##
 *       ##    ##          ##    ##    ##       ##     ##
 * ##    ##    ##    ##    ##    ##    ##       ##     ##
 *  ######     ##     ######     ##    ######## ##     ##
 */

// ADMINISTRATION
Route::get('/administration/dashboard', 'system\BackOfficeController@dashboard')                                            ->middleware('cache.headers');
