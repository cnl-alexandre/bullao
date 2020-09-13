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

/**
 *  ######  ##     ##  ######  ########  #######  ##     ## ######## ########
 * ##    ## ##     ## ##    ##    ##    ##     ## ###   ### ##       ##     ##
 * ##       ##     ## ##          ##    ##     ## #### #### ##       ##     ##
 * ##       ##     ##  ######     ##    ##     ## ## ### ## ######   ########
 * ##       ##     ##       ##    ##    ##     ## ##     ## ##       ##   ##
 * ##    ## ##     ## ##    ##    ##    ##     ## ##     ## ##       ##    ##
 *  ######   #######   ######     ##     #######  ##     ## ######## ##     ##
 */

// HOME
Route::get('/', 'customer\HomeController@home')                                                                             ->middleware('cache.headers');
Route::get('/reservation', 'customer\HomeController@reservation');

/**
 *  ######  ##    ##  ######  ######## ######## ##     ##
 * ##    ##  ##  ##  ##    ##    ##    ##       ###   ###
 * ##         ####   ##          ##    ##       #### ####
 *  ######     ##     ######     ##    ######   ## ### ##
 *       ##    ##          ##    ##    ##       ##     ##
 * ##    ##    ##    ##    ##    ##    ##       ##     ##
 *  ######     ##     ######     ##    ######## ##     ##
 */

// LOGIN
Route::get('/account/login', 'system\AccountController@login');
Route::post('/account/login', 'system\AccountController@loginSubmit');
Route::get('/account/forgot-password', 'system\AccountController@forgotPassword');
Route::post('/account/forgot-password', 'system\AccountController@forgotPasswordSubmit');
Route::get('/account/logout', 'system\AccountController@logout');

// ADMINISTRATION
Route::get('/administration/dashboard', 'system\BackOfficeController@dashboard')                                            ->middleware('cache.headers');
