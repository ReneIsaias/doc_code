<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Apis\AuthController;
use App\Models\Unidade;
use App\Models\User;
use App\Models\Antecedente;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/unidades', function () {
    $unidades = Unidade::all();
    return $unidades;
});

Route::get('/usuarios', function () {
    $usuarios = User::with('roles')->get();
    return $usuarios;
});

Route::get('/antecedentes', function () {
    $antecedentes = Antecedente::with('enfermedades')->get();
    return $antecedentes;
});

Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

Route::post('/userInfo', [AuthController::class, 'infoUser'])->middleware('auth:sanctum');
