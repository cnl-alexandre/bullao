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

// Maintenance
Route::get('/maintenance', 'MaintenanceController@index');

// HOME
Route::get('/', 'HomeController@home')                                                                              ->middleware('maintenance');

// RÉSERVATION
Route::get('/reservation/dates', 'ReservationController@reservationDates')                                          ->middleware('maintenance');
Route::post('/reservation/dates', 'ReservationController@reservationDatesSubmit');
Route::get('/reservation/spas', 'ReservationController@reservationSpas')                                            ->middleware('maintenance');
Route::post('/reservation/spas', 'ReservationController@reservationSpasSubmit');
Route::get('/reservation/packs', 'ReservationController@reservationPacks')                                          ->middleware('maintenance');
Route::post('/reservation/packs', 'ReservationController@reservationPacksSubmit');
Route::get('/reservation/accessoires', 'ReservationController@reservationAccessoires')                              ->middleware('maintenance');
Route::post('/reservation/accessoires', 'ReservationController@reservationAccessoiresSubmit');
Route::get('/reservation/recap', 'ReservationController@reservationRecap')                                          ->middleware('maintenance');
Route::post('/reservation/recap', 'ReservationController@reservationRecapSubmit');
Route::get('/reservation/heures', 'ReservationController@reservationHeures')                                        ->middleware('maintenance');
Route::post('/reservation/heures', 'ReservationController@reservationHeuresSubmit');
Route::get('/reservation/logement', 'ReservationController@reservationLogement')                                    ->middleware('maintenance');
Route::post('/reservation/logement', 'ReservationController@reservationLogementSubmit');
Route::get('/reservation/adresse', 'ReservationController@reservationAdresse')                                      ->middleware('maintenance');
Route::post('/reservation/adresse', 'ReservationController@reservationAdresseSubmit');
Route::get('/reservation/client', 'ReservationController@reservationClient')                                        ->middleware('maintenance');
Route::post('/reservation/client', 'ReservationController@reservationClientSubmit');
Route::get('/reservation/confirmation', 'ReservationController@reservationConfirmation')                            ->middleware('maintenance');
Route::post('/reservation/confirmation', 'ReservationController@reservationConfirmationSubmit');

// CARTE CADEAU
Route::get('/cartecadeau', 'customer\CadeauController@presentation')                                                ->middleware('maintenance');
Route::get('/cartecadeau/offrir', 'customer\CadeauController@creationCarte')                                        ->middleware('maintenance');
Route::post('/cartecadeau/offrir', 'customer\CadeauController@creationCarte');
Route::post('/cartecadeau/offrir/submit', 'customer\CadeauController@creationCarteSubmit');
Route::get('/cartecadeau/paiement', 'customer\CadeauController@paiement')                                           ->middleware('maintenance');
Route::get('/cartecadeau/paiement-accepte', 'customer\CadeauController@success')                                    ->middleware('maintenance');

// PAIEMENT
Route::get('/reservation/paiement', 'ReservationController@paiement')                                               ->middleware('maintenance');
Route::post('/reservation/paiement', 'ReservationController@paiementSubmit');
Route::get('/reservation/paiement-accepte', 'ReservationController@success')                                        ->middleware('maintenance');
Route::get('/reservation/paiement-refuse', 'ReservationController@cancel')                                          ->middleware('maintenance');

// WebServices
Route::post('/webservices/promo/verify', 'WebserviceController@verifyPromo');
Route::post('/webservices/spa/stock/verify', 'WebserviceController@verifySpaStock');
Route::post('/webservices/pack/stock/verify', 'WebserviceController@verifyPackStock');
Route::post('/webservices/accessoire/stock/verify', 'WebserviceController@verifyAccessoireStock');

// PRESS & ARTICLES
Route::get('/contact', 'ArticleController@contact')                                                                 ->middleware('maintenance');
Route::get('/foire-aux-questions', 'ArticleController@faq')                                                         ->middleware('maintenance');
Route::get('/cgv-bullao', 'ArticleController@cgv')                                                                  ->middleware('maintenance');
Route::get('/mentions-legales', 'ArticleController@mentions')                                                       ->middleware('maintenance');
//Route::get('/blog/NOM_ARTICLE', 'ArticleController@NOM_FONCTION');

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
Route::get('/account/dashboard', 'customer\AccountController@dashboard')                                            ->middleware('maintenance');
Route::get('/account/reservations', 'customer\AccountController@reservations')                                      ->middleware('maintenance');
Route::get('/account/addresses', 'customer\AccountController@addresses')                                            ->middleware('maintenance');
Route::get('/account/profil', 'customer\AccountController@profil')                                                  ->middleware('maintenance');

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
Route::get('/system/reservations/new', 'system\ReservationController@new')                                          ->middleware('global.system');
Route::get('/system/reservations/new/{id}', 'system\ReservationController@new')                                      ->middleware('global.system');
Route::post('/system/reservations/new', 'system\ReservationController@newSubmit');
Route::get('/system/reservations/edit/{id}', 'system\ReservationController@edit')                                   ->middleware('global.system');
Route::post('/system/reservations/edit/{id}', 'system\ReservationController@editSubmit');
Route::get('/system/reservation/{id}/send/client', 'system\ReservationController@sendClient');
Route::get('/system/reservation/{id}/send/admin', 'system\ReservationController@sendAdmin');

// CARTES CADEAUX
Route::get('/system/cartescadeaux/list', 'system\CarteCdxController@list')                                          ->middleware('global.system');
Route::get('system/cartescadeaux/new', 'system\CarteCdxController@newCarte')                                         ->middleware('global.system');
Route::post('system/cartescadeaux/new', 'system\CarteCdxController@newCarteSubmit');
Route::get('system/cartescadeaux/edit/{id}', 'system\CarteCdxController@editCarte')                                  ->middleware('global.system');
Route::post('system/cartescadeaux/edit/{id}', 'system\CarteCdxController@editCarteSubmit');

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

// CLIENTS
Route::get('system/clients/list', 'system\ClientController@listClients')                                            ->middleware('global.system');
Route::get('system/clients/new', 'system\ClientController@newClient')                                               ->middleware('global.system');
Route::post('system/clients/new', 'system\ClientController@newClientSubmit');
Route::get('system/clients/edit/{id}', 'system\ClientController@editClient')                                        ->middleware('global.system');
Route::post('system/clients/edit/{id}', 'system\ClientController@editClientSubmit');

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

// PARAMETRES
Route::get('system/parametres/parameters', 'system\ParametresController@parameters')                                ->middleware('global.system');
Route::post('system/parametres/parameters/maintenance', 'system\ParametresController@maintenanceSubmit')            ->middleware('global.system');

// ADMIN GESTION
Route::get('system/parametres/administrateurs/list', 'system\AdministrateurController@listAdmins')                  ->middleware('global.system');
Route::get('system/parametres/administrateur/new', 'system\AdministrateurController@newAdmin')                      ->middleware('global.system');
Route::post('system/parametres/administrateur/new', 'system\AdministrateurController@newAdminSubmit');
Route::get('system/parametres/administrateur/edit/{id}', 'system\AdministrateurController@editAdmin')               ->middleware('global.system');
Route::post('system/parametres/administrateur/edit/{id}', 'system\AdministrateurController@editAdminSubmit');


// SCHEDULERS
Route::get('schedulers/launch', 'SchedulersController@launch');
Route::get('scheduler/launch/notationPrestationAfter', 'SchedulersController@notationPrestationAfter');
Route::get('scheduler/launch/purgeReservationsNonPayees', 'SchedulersController@purgeReservationsNonPayees');
