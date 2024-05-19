<?php

use App\Http\Controllers\InventarioController;
use App\Http\Controllers\MovimientosInventarioController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\UsuariosController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\AlmacenistaMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware('auth')->name('home');

Route::get('/login', [UsuariosController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login-user', [UsuariosController::class, 'login'])->name('login.user');
Route::post('/logout', [UsuariosController::class, 'logout'])->name('logout');

Route::get('/productos', [ProductosController::class, 'index'])->middleware('auth')->name('productos');
Route::get('/actualizar-estatus/{id}', [ProductosController::class, 'cambiarEstatus'])->middleware('auth')->name('estatus');
Route::post('/productos/guardar', [ProductosController::class, 'store'])->middleware('auth')->name('producto.guardar');
Route::post('/entrada-productos', [InventarioController::class, 'entradaProducto'])->middleware('auth')->name('entrada');

Route::get('/salida-productos', [InventarioController::class, 'salida'])->middleware(['auth',AlmacenistaMiddleware::class])->name('salida');

Route::get('/historial', [MovimientosInventarioController::class, 'index'])->middleware(['auth',AdminMiddleware::class])->name('historial');

