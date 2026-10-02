<?php

use App\Http\Controllers\Admin\PedidoController as AdminPedidoController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\FlorController;
use App\Http\Controllers\GaleriaController;
use App\Http\Controllers\PedidoController;
use App\Models\Configuracion;
use App\Models\Flor;
use App\Models\Galeria;
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

    $flores = Flor::all();

    $imagenesGaleria = Galeria::orderBy('orden')->get();

    $configuracion = Configuracion::first();

    return view('inicio', compact('flores', 'imagenesGaleria', 'configuracion'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'es_admin'])->group(function () {

    // Rutas del Administrador
    Route::get('/admin', [FlorController::class, 'admin'])->name('admin');

    Route::get('/admin/flores', [FlorController::class, 'flores'])
        ->name('admin.flores');

    Route::get('/admin/flores/crear', [FlorController::class, 'crear'])
        ->name('admin.flores.crear');

    Route::post('/admin/flores', [FlorController::class, 'guardar'])
        ->name('admin.flores.guardar');

    Route::get('/admin/flores/{flor}/editar', [FlorController::class, 'editar'])
        ->name('admin.flores.editar');

    Route::put('/admin/flores/{flor}', [FlorController::class, 'actualizar'])
        ->name('admin.flores.actualizar');

    Route::delete('/admin/flores/{flor}', [FlorController::class, 'eliminar'])
        ->name('admin.flores.eliminar');

    Route::patch(
        '/admin/flores/{flor}/disponibilidad',
        [FlorController::class, 'cambiarDisponibilidad']
    )
        ->name('admin.flores.disponibilidad');

    Route::get('/admin/galeria', [GaleriaController::class, 'index'])
        ->name('admin.galeria');

    Route::post('/admin/galeria', [GaleriaController::class, 'guardar'])
        ->name('admin.galeria.guardar');

    Route::delete(
        '/admin/galeria/{galeria}',
        [GaleriaController::class, 'eliminar']
    )
        ->name('admin.galeria.eliminar');

    Route::patch(
        '/admin/galeria/{galeria}/subir',
        [GaleriaController::class, 'subir']
    )
        ->name('admin.galeria.subir');

    Route::patch(
        '/admin/galeria/{galeria}/bajar',
        [GaleriaController::class, 'bajar']
    )
        ->name('admin.galeria.bajar');

    // Admin Configuracion
    Route::get('/admin/configuracion', [ConfiguracionController::class, 'editar'])
        ->name('admin.configuracion');

    Route::put('/admin/configuracion', [ConfiguracionController::class, 'actualizar'])
        ->name('admin.configuracion.actualizar');

    // Ruta para ver pedidos de admin 
    Route::get('/admin/pedidos', [AdminPedidoController::class, 'index'])
        ->name('admin.pedidos');

    Route::get('/admin/pedidos/{pedido}', [AdminPedidoController::class, 'mostrar'])
        ->name('admin.pedidos.mostrar');

    // Estado del pedido
    Route::put('/admin/pedidos/{pedido}/estado', [AdminPedidoController::class, 'actualizarEstado'])
        ->name('admin.pedidos.estado');

    // Metodo de pago
    Route::put('/admin/pedidos/{pedido}/pago', [AdminPedidoController::class, 'actualizarPago'])
        ->name('admin.pedidos.pago');

    //Eviar estado del pedido
    Route::get('admin/pedidos/{pedido}/whatsapp', [AdminPedidoController::class, 'whatsapp'])
        ->name('admin.pedidos.whatsapp');

    // Eliminar pedido
    Route::delete('/admin/pedidos/{pedido}', [AdminPedidoController::class, 'eliminar'])
        ->name('admin.pedidos.eliminar');
});

// Ruta para el carrito de compras agregar
Route::post('/carrito/agregar/{flor}', [CarritoController::class, 'agregar'])
    ->name('carrito.agregar');

Route::get('/carrito', [CarritoController::class, 'index'])
    ->name('carrito.index');

// Ruta para aumentar la cantidad de flores en el carrito
Route::post('/carrito/aumentar/{id}', [CarritoController::class, 'aumentar'])
    ->name('carrito.aumentar');

// Ruta para disminuir la cantidad de flores en el carrito
Route::post('/carrito/disminuir/{id}', [CarritoController::class, 'disminuir'])
    ->name('carrito.disminuir');

// Eliminar directamente una flor
Route::post('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])
    ->name('carrito.eliminar');

// Rutas para hacer el pedido
Route::get('/pedido', [PedidoController::class, 'crear'])
    ->name('pedidos.crear');

// Ruta para guardar el pedido
Route::post('/pedido', [PedidoController::class, 'guardar'])
    ->name('pedidos.guardar');

// Route::get('/prueba-admin', function () {
//     return '¡Eres Administrador!';
// })->middleware(['auth', 'es_admin']);

require __DIR__ . '/auth.php';
