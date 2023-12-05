<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PropiedadesController;
use App\Http\Controllers\JudicialesController;
use App\Http\Controllers\Juridicas_NaturalesController;
use App\Http\Controllers\PagosController;
use App\Http\Controllers\DetallesPagosController;
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
Route::resource('judiciales', JudicialesController::class);
Route::resource('juridicas_naturales', Juridicas_NaturalesController::class);
Route::post('/agregar-detalle-pago/{pago}', [DetallesPagosController::class, 'agregarDetallePago'])->name('agregar.detalle.pago');





