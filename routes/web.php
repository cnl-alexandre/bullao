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

// Réservation
Route::get('/reservation', 'ReservationController@reservationStep1');
Route::get('/reservation/{nbPlace}places', 'ReservationController@reservationStep1');
Route::post('/reservation', 'ReservationController@reservationStep1Submit');
Route::get('/reservation/informations', 'ReservationController@reservationStep2');
Route::post('/reservation/informations', 'ReservationController@reservationStep2Submit');

// PRESS & ARTICLES
Route::get('/cgv-bullao', 'ArticleController@cgv');
Route::get('/mentions-legales', 'ArticleController@mentions');
//Route::get('/blog/NOM_ARTICLE', 'ArticleController@NOM_FONCTION');

// PAIEMENT
Route::get('/reservation/paiement', 'ReservationController@paiement');
Route::post('/reservation/paiement', 'ReservationController@paiementSubmit');
Route::get('/reservation/paiement-accepte', 'ReservationController@success');
Route::get('/reservation/paiement-refuse', 'ReservationController@cancel');

// WebServices
Route::post('/webservices/promo/verify', 'WebserviceController@verifyPromo');
Route::post('/webservices/spa/stock/verify', 'WebserviceController@verifySpaStock');
Route::post('/webservices/pack/stock/verify', 'WebserviceController@verifyPackStock');
Route::post('/webservices/accessoire/stock/verify', 'WebserviceController@verifyAccessoireStock');

// ACCOUNT
Route::get('/account/login', 'AccountController@login');
Route::post('/account/login', 'AccountController@loginSubmit');
Route::get('/account/forgot-password', 'AccountController@forgotPassword');
Route::post('/account/forgot-password', 'AccountController@forgotPasswordSubmit');
Route::get('/account/logout', 'AccountController@logout');
Route::post('/account/send-reservations', 'AccountController@sendReservationSubmit');

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
Route::get('/account/reservations', 'customer\AccountController@reservations');
Route::get('/account/addresses', 'customer\AccountController@addresses');
Route::get('/account/profil', 'customer\AccountController@profil');

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
Route::get('/system/dashboard', 'system\BackOfficeController@dashboard')                                            ->middleware('cache.headers');

// RESERVATION
Route::get('/system/reservations/list', 'system\ReservationController@list');
Route::get('/system/reservations/edit/{id}', 'system\ReservationController@edit');

// PRODUITS (SPAS-PACKS-ACCESSOIRES)
Route::get('system/produits/spas/list', 'system\ProduitController@listSpas');
Route::get('system/produits/spas/new', 'system\ProduitController@newSpa');
Route::post('system/produits/spas/new', 'system\ProduitController@newSpaSubmit');
Route::get('system/produits/spas/edit/{id}', 'system\ProduitController@editSpa');
Route::post('system/produits/spas/edit/{id}', 'system\ProduitController@editSpaSubmit');

Route::get('system/produits/packs/list', 'system\ProduitController@listPacks');
Route::get('system/produits/packs/new', 'system\ProduitController@newPack');
Route::post('system/produits/packs/new', 'system\ProduitController@newPackSubmit');
Route::get('system/produits/packs/edit/{id}', 'system\ProduitController@editPack');
Route::post('system/produits/packs/edit/{id}', 'system\ProduitController@editPackSubmit');

Route::get('system/produits/accessoires/list', 'system\ProduitController@listAccessoires');
Route::get('system/produits/accessoires/new', 'system\ProduitController@newAccessoire');
Route::post('system/produits/accessoires/new', 'system\ProduitController@newAccessoireSubmit');
Route::get('system/produits/accessoires/edit/{id}', 'system\ProduitController@editAccessoire');
Route::post('system/produits/accessoires/edit/{id}', 'system\ProduitController@editAccessoireSubmit');
