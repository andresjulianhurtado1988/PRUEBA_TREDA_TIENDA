<?php

use Illuminate\Support\Facades\Route;

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

// RUTAS TIENDA
Route::get('/listTienda', [App\Http\Controllers\TiendaController::class, 'listTienda'])->name('listTienda');
Route::get('/formTienda', [App\Http\Controllers\TiendaController::class, 'formTienda'])->name('formTienda');
Route::post('/registerTienda', [App\Http\Controllers\TiendaController::class, 'registerTienda'])->name('registerTienda');
Route::get('/editTienda/{id}', [App\Http\Controllers\TiendaController::class, 'editTienda'])->name('editTienda');
Route::post('/updateTienda/{id}', [App\Http\Controllers\TiendaController::class, 'updateTienda'])->name('updateTienda');
Route::get('/listProductosTienda/{id}', [App\Http\Controllers\TiendaController::class, 'listProductosTienda'])->name('listProductosTienda');

Route::get('/formProducto/{id}', [App\Http\Controllers\TiendaController::class, 'formProducto'])->name('formProducto');
Route::post('/registerProducto', [App\Http\Controllers\TiendaController::class, 'registerProducto'])->name('registerProducto');
Route::get('/editProducto/{id}', [App\Http\Controllers\TiendaController::class, 'editProducto'])->name('editProducto');
Route::post('/updateProducto', [App\Http\Controllers\TiendaController::class, 'updateProducto'])->name('updateProducto');


// RUTAAS PRUEBA DE LÓGICA
Route::get('/pruebaLogica', [App\Http\Controllers\logicaController::class, 'pruebaLogica'])->name('pruebaLogica');
Route::post('/punto1', [App\Http\Controllers\logicaController::class, 'punto1'])->name('punto1');
Route::post('/punto2', [App\Http\Controllers\logicaController::class, 'punto2'])->name('punto2');
Route::post('/punto3', [App\Http\Controllers\logicaController::class, 'punto3'])->name('punto3');
