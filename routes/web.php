<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

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

Route::get('/', function () {
    return view('layout');
});

Route::get('/list', 'App\Http\Controllers\ClientController@show');
Route::resource('clients', ClientController::class);

Route::get('clients/{client}/wallet', 'App\Http\Controllers\ClientController@wallet')->name('clients.wallet');
Route::post('clients/{client}/recharge', 'App\Http\Controllers\ClientController@recharge')->name('clients.recharge');

Route::get('clients/{client}/history', 'App\Http\Controllers\ClientController@history')->name('clients.history');
Route::post('clients/{client}/updateTransaction', 'App\Http\Controllers\ClientController@updateTransaction')->name('clients.updateTransaction');


