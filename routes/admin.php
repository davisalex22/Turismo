<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\GraficasController;
use App\Http\Controllers\HistorialController;
Route::get('',[AdminController::class,'index']);
Route::resource('users', 'App\Http\Controllers\UserController');
Route::get('/archivos',[AdminController::class,'archivos']);
Route::get('/metricas',[AdminController::class,'metricas']);
Route::get('/editUser',[AdminController::class,'editUser']);
Route::get('/datosTabla',[AdminController::class,'datosTabla']);
Route::get('/hoteles',[AdminController::class,'hoteles']);

// Importacion de Archivos y datos en Tabla

Route::resource('datosTabla', 'App\Http\Controllers\HistorialController');

Route::resource('hoteles', 'App\Http\Controllers\HotelesController');


Route::resource('archivos', 'App\Http\Controllers\ArchivoController');

Route::post('archivos',[ArchivoController::class,'import'])->name('archivo.import');

Route::resource('graficas', 'App\Http\Controllers\GraficasController');


Route::post('/graficas/all',[GraficasController::class,'all']);


Route::post('/datosTabla',[HistorialController::class,'filtroHotel']);

Route::post('/graficas',[GraficasController::class,'filtroGrafica']);