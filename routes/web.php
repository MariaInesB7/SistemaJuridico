<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AbogadoController;
use App\Http\Controllers\ExpedienteController;
use App\Http\Controllers\ProcuradorController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\DefiendeController;
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
    return view('welcome');
});
Route::get('login', function () {
    return view('login');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::post('store',['as'=>'abogado.store','uses'=> 'AbogadoController@store']);
Route::resource('users',App\Http\Controllers\Auth\RegisterController ::class);

Route::resource('abogado',App\Http\Controllers\AbogadoController::class);
Route::resource('expediente',App\Http\Controllers\ExpedienteController::class);
Route::resource('procurador',App\Http\Controllers\ProcuradorController::class);
Route::resource('cliente',App\Http\Controllers\ClienteController::class);
Route::resource('archivo',App\Http\Controllers\ArchivoController::class);
Route::resource('defiende',App\Http\Controllers\DefiendeController::class);

