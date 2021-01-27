<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Internas\InternasController;
use App\Http\Controllers\CalculosController;
use App\Http\Controllers\HistorialController;
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


Route::get('/',[InternasController::class,'home']);
// Route::get('/estadisticas',[InternasController::class,'estadisticas']);
Route::get('/lugares',[InternasController::class,'lugares']);
Route::get('/contactos',[InternasController::class,'contactos']);
// ruta para pasar por el controlador
Route::get('/estadisticas', 'App\Http\Controllers\CalculosController@index');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::post('/estadisticas',[CalculosController::class,'filtros']);
