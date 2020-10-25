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
Route::get('/system/dashboard', 'system\BackOfficeController@dashboard')                                            ->middleware('cache.headers', 'global.system');

// RESERVATION
Route::get('/system/reservations/list', 'system\ReservationController@list')                                        ->middleware('global.system');
Route::get('/system/reservations/edit/{id}', 'system\ReservationController@edit')                                   ->middleware('global.system');

// PRODUITS (SPAS-PACKS-ACCESSOIRES)
Route::get('system/produits/spas/list', 'system\ProduitController@listSpas')                                        ->middleware('global.system');
Route::get('system/produits/spas/new', 'system\ProduitController@newSpa')                                           ->middleware('global.system');
Route::post('system/produits/spas/new', 'system\ProduitController@newSpaSubmit');
Route::get('system/produits/spas/edit/{id}', 'system\ProduitController@editSpa')                                    ->middleware('global.system');
Route::post('system/produits/spas/edit/{id}', 'system\ProduitController@editSpaSubmit');

Route::get('system/produits/packs/list', 'system\ProduitController@listPacks')                                      ->middleware('global.system');
Route::get('system/produits/packs/new', 'system\ProduitController@newPack')                                         ->middleware('global.system');
Route::post('system/produits/packs/new', 'system\ProduitController@newPackSubmit');
Route::get('system/produits/packs/edit/{id}', 'system\ProduitController@editPack')                                  ->middleware('global.system');
Route::post('system/produits/packs/edit/{id}', 'system\ProduitController@editPackSubmit');

Route::get('system/produits/accessoires/list', 'system\ProduitController@listAccessoires')                          ->middleware('global.system');
Route::get('system/produits/accessoires/new', 'system\ProduitController@newAccessoire')                             ->middleware('global.system');
Route::post('system/produits/accessoires/new', 'system\ProduitController@newAccessoireSubmit');
Route::get('system/produits/accessoires/edit/{id}', 'system\ProduitController@editAccessoire')                      ->middleware('global.system');
Route::post('system/produits/accessoires/edit/{id}', 'system\ProduitController@editAccessoireSubmit');

// PARAMETRES - Code Promo
Route::get('system/parametres/codespromo/list', 'system\ParametresController@listCodesPromo')                       ->middleware('global.system');
Route::get('system/parametres/codespromo/new', 'system\ParametresController@newCodePromo')                          ->middleware('global.system');
Route::post('system/parametres/codespromo/new', 'system\ParametresController@newCodePromoSubmit');
Route::get('system/parametres/codespromo/edit/{id}', 'system\ParametresController@editCodePromo')                   ->middleware('global.system');
Route::post('system/parametres/codespromo/edit/{id}', 'system\ParametresController@editCodePromoSubmit');
// PARAMETRES - Indispo
Route::get('system/parametres/indisponibilite/list', 'system\ParametresController@listIndispo')                     ->middleware('global.system');
Route::get('system/parametres/indisponibilite/new', 'system\ParametresController@newIndispo')                       ->middleware('global.system');
Route::post('system/parametres/indisponibilite/new', 'system\ParametresController@newIndispoSubmit');
Route::get('system/parametres/indisponibilite/edit/{id}', 'system\ParametresController@editIndispo')                ->middleware('global.system');
Route::post('system/parametres/indisponibilite/edit/{id}', 'system\ParametresController@editIndispoSubmit');

// SCHEDULERS
Route::get('schedulers/launch', 'SchedulersController@launch');
Route::get('scheduler/launch/notationPrestationAfter', 'SchedulersController@notationPrestationAfter');
Route::get('scheduler/launch/purgeReservationsNonPayees', 'SchedulersController@purgeReservationsNonPayees');