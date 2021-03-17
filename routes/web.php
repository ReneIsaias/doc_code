<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\MedicosController;
use App\Http\Controllers\ConsultasController;

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


Route::group(['middleware' => ['auth']], function () {

    Route::get('home', [HomeController::class, 'index'])->name('home');

    Route::resource('citas', EventController::class)->names('citas');

    Route::resource('pacientes', PacientesController::class)->names('pacientes');

    Route::resource('medicos', MedicosController::class)->names('medicos');

    Route::resource('consultas', ConsultasController::class)->names('consultas');
});
