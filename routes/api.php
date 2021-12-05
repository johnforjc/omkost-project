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

    Route::post('setTukang', 'TukangController@set');
    Route::get('getTukang', 'TukangController@get');

    Route::post('setToko', 'TokoController@set');
    Route::get('getToko', 'TokoController@get');
});
