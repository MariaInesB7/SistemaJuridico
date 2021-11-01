<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AbogadoController;
use App\Http\Controllers\ExpedienteController;
use App\Http\Controllers\ProcuradorController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::post('store',['as'=>'abogado.store','uses'=> 'AbogadoController@store']);

Route::resource('abogado',App\Http\Controllers\AbogadoController::class);
Route::resource('expediente',App\Http\Controllers\ExpedienteController::class);
Route::resource('procurador',App\Http\Controllers\ProcuradorController::class);

