<?php


use App\Http\Controllers\clientesController;
use App\Http\Controllers\facturasController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\inventarioController;
use App\Http\Controllers\ventaController;
use Illuminate\Support\Facades\Route;


Route::get('/', homeController::class);
Route::get('/', homeController::class)->name('welcome');


Route::get('/venta', [VentaController::class, 'create'])->name('venta.create');
Route::post('/venta/temp', [VentaController::class, 'temp'])->name('venta.temp');
Route::post('/venta/store', [VentaController::class, 'store'])->name('venta.store');
Route::post('/venta/limpiar', [VentaController::class, 'limpiar'])->name('venta.limpiar');

Route::get('/facturas', [FacturasController::class, 'index'])->name('facturas.index');
Route::post('/facturas/detalle', [FacturasController::class, 'show'])->name('facturas.show');

Route::get('/inventario', [InventarioController::class, 'index'])->name('inventario.index');
Route::get('/inventario/create', [InventarioController::class, 'create'])->name('inventario.create');
Route::post('/inventario', [InventarioController::class, 'store'])->name('inventario.store');
Route::get('/inventario/{productos}/edit', [InventarioController::class, 'edit'])->name('inventario.edit');
Route::put('/inventario/{productos}', [InventarioController::class, 'update'])->name('inventario.update');

Route::get('/clientes', [clientesController::class, 'index'])->name('clientes.index');
Route::get('/clientes/create', [ClientesController::class, 'create'])->name('clientes.create');
Route::post('/clientes', [ClientesController::class, 'store'])->name('clientes.store');
Route::get('/clientes/{clientes}/edit', [ClientesController::class, 'edit'])->name('clientes.edit');
Route::put('/clientes/{clientes}', [ClientesController::class, 'update'])->name('clientes.update');
