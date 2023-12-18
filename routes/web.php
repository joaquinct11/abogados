<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PropiedadesController;
use App\Http\Controllers\JudicialesController;
use App\Http\Controllers\Juridicas_NaturalesController;
use App\Http\Controllers\PagosController;
use App\Http\Controllers\Pagos1Controller;
use App\Http\Controllers\DetallesPagosController;
use App\Http\Controllers\Pagos2Controller;
use App\Http\Controllers\DetallesPagos2Controller;
use App\Http\Controllers\DetallesPagos1Controller;
use App\Http\Controllers\SubActosController;
use App\Http\Controllers\SubActos1Controller;
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
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/principal', function () {
        return view('principal.index');
    })->name('principal');
});

Route::resource('clientes', ClienteController::class);
Route::resource('usuarios', UsuarioController::class);
Route::resource('propiedades', PropiedadesController::class);
Route::resource('pagos', PagosController::class);
Route::resource('pagos2', Pagos2Controller::class);
Route::resource('judiciales', JudicialesController::class);
Route::resource('juridicas_naturales', Juridicas_NaturalesController::class);
Route::post('/agregar-detalle-pago/{pago}', [DetallesPagosController::class, 'agregarDetallePago'])->name('agregar.detalle.pago');
Route::post('/agregar-detalle-pago2/{pago}', [DetallesPagos2Controller::class, 'agregarDetallePago2'])->name('agregar.detalle.pago2');
Route::delete('/eliminar-detalle-pago2/{detalleId}', [DetallesPagos2Controller::class, 'eliminar'])->name('eliminar.detalle.pago2');
Route::resource('pagos1', Pagos1Controller::class);
Route::resource('judiciales', JudicialesController::class);
Route::resource('juridicas_naturales', Juridicas_NaturalesController::class);
Route::post('/agregar-detalle-pago/{pago}', [DetallesPagosController::class, 'agregarDetallePago'])->name('agregar.detalle.pago');
Route::post('/agregar-detalle-pago1/{pago}', [DetallesPagos1Controller::class, 'agregarDetallePago1'])->name('agregar.detalle.pago1');

Route::delete('/eliminar-detalle-pago/{detalleId}', [DetallesPagosController::class, 'eliminar'])->name('eliminar.detalle.pago');
Route::delete('/eliminar-detalle-pago1/{detalleId}', [DetallesPagos1Controller::class, 'eliminar'])->name('eliminar.detalle.pago1');
Route::post('/agregar-detalle-subacto/{propiedad}', [SubActosController::class, 'agregarDetallePago'])->name('agregar.detalle.subacto');
Route::post('/agregar-detalle-subacto1/{judicial}', [SubActos1Controller::class, 'agregarDetallePago1'])->name('agregar.detalle.subacto1');

Route::delete('/eliminar-detalle-subacto/{detalleId}', [SubActosController::class, 'eliminar'])->name('eliminar.detalle.subacto');
Route::delete('/eliminar-detalle-subacto1/{detalleId}', [SubActos1Controller::class, 'eliminar'])->name('eliminar.detalle.subacto1');





