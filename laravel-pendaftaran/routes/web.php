<?php

use App\Http\Controllers\KirimEmailController;
use App\Http\Controllers\PendaftarController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Mail\SendEmail;

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

Route::get('/ppdb', function () {
    return view('landingpage');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/formpendaftaran', 'KirimEmailController@index')->name('email.index');
Route::get('/formpendaftaran2', 'KirimEmailController@index2')->name('email.index2');
Route::get('/formpendaftaran3/{id}', 'KirimEmailController@index3')->name('email.index3');
Route::post('/kirim', 'KirimEmailController@kirim')->name('email.kirim');
Route::post('/kirim2', 'KirimEmailController@kirim2')->name('email.kirim2');
Route::post('/kirim3/{id}', 'KirimEmailController@kirim3')->name('email.kirim3');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::middleware('auth')->group(function() {
    Route::resource('basic', BasicController::class);
    Route::resource('pendaftar', PendaftarController::class);
    Route::get('search', 'PendaftarController@search')->name('search');
    Route::get('select', 'PendaftarController@select')->name('select');
});
