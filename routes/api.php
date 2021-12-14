<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
Route::post('login','LoginController@login');
Route::post('register', 'LoginController@register');
//Route::get('profile', 'LoginController@profile')->name('profile');
Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::get('profile', 'LoginController@profile');
    Route::get('logout', 'LoginController@logout');
    
    Route::post('setBlacklist', 'BlacklistController@set');
    Route::get('getBlacklist', 'BlacklistController@get');    
    Route::put('validateBlacklist', 'BlacklistController@validateBlacklist');
    Route::post('updateBlacklist', 'BlacklistController@updateBlacklist');
    Route::delete('deleteBlacklist', 'BlacklistController@delete');

    Route::post('setTukang', 'TukangController@set');
    Route::put('validateTukang', 'TukangController@validateTukang');
    Route::put('updateTukang', 'TukangController@update');
    Route::get('getTukang', 'TukangController@get');
    Route::delete('deleteTukang', 'TukangController@delete');

    Route::post('setToko', 'TokoController@set');
    Route::put('validateToko', 'TokoController@validateToko');
    Route::put('updateToko', 'TokoController@update');
    Route::delete('deleteToko', 'TokoController@delete');
    Route::get('getToko', 'TokoController@get');
});
