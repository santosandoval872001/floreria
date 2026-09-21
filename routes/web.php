<?php

use App\Http\Controllers\FlorController;
use App\Http\Controllers\GaleriaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('inicio');
});

// Index
Route::get('/', [FlorController::class, 'index']);

// Index admin
Route::get('/admin', [FlorController::class, 'admin'])->name('admin');

// Crear flor
Route::get('/admin/flores/crear', [FlorController::class, 'crear'])
    ->name('admin.flores.crear');

// Guardar flor
Route::post('/admin/flores}', [FlorController::class, 'guardar'])
    ->name('admin.flores.guardar');

// Ediar flor
Route::get('/admin/flores/{flor}/editar', [FlorController::class, 'editar'])
    ->name('admin.flores.editar');

// Enviar cambios
Route::put('/admin/flores/{flor}', [FlorController::class, 'actualizar'])
    ->name('admin.flores.actualizar');

// Eliminar flor
Route::delete('/admin/flores/{flor}', [FlorController::class, 'eliminar'])
    ->name('admin.flores.eliminar');

// Disponibilidad de las flores
Route::patch('/admin/flores/{flor}/disponibilidad', [FlorController::class, 'cambiarDisponibilidad'])
    ->name('admin.flores.disponibilidad');

// Flores
Route::get('/admin/flores', [FlorController::class, 'flores'])
    ->name('admin.flores');

// Grupo de rutas de galeria

// Index de galeria
Route::get('/admin/galeria', [GaleriaController::class, 'index'])
    ->name('admin.galeria');

// Guardar imagen galeria
Route::post('/admin/galeria', [GaleriaController::class, 'guardar'])
    ->name('admin.galeria.guardar');

// Eliminar imagen de galeria
Route::delete('/admin/galeria/{galeria}', [GaleriaController::class, 'eliminar'])
    ->name('admin.galeria.eliminar');

// Rutas para ordenar las imganes subir y bajar
Route::patch('/admin/galeria/{galeria}/subir', [GaleriaController::class, 'subir'])
    ->name('admin.galeria.subir');

Route::patch('/admin/galeria/{galeria}/bajar', [GaleriaController::class, 'bajar'])
    ->name('admin.galeria.bajar');
