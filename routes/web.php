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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/','PageController@home');
Route::get('/dashboard', 'PageController@dashboard');
Route::get('/admindashboard', 'PageController@admin');
Route::get('/profil', 'PageController@profil');
Route::get('/notification', 'NotificationController@index');
Route::get('/iklan', 'PageController@iklan');
Route::get('/manajemen', 'PageController@manajemen');

Route::get('/blacklist', 'BlacklistController@index');
Route::get('/tukang', 'TukangController@index');
Route::get('/toko', 'TokoController@index');

Route::get('/adminblacklist', 'BlacklistController@admin');
Route::get('/admintoko', 'TokoController@admin');
Route::get('/admintukang', 'TukangController@admin');
// Route::get('/user/verify/{token}/{id}', 'LoginController@verifyEmail');

//Route::get('/login', 'PageController@login');
//Route::get('/tentang', 'PageController@tentang')->name('profile');
//Route::get('/kontak', 'PageController@kontak');