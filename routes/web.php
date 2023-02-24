<?php

use App\Http\Controllers\PlanController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ZonaController;
use App\Http\Controllers\AntenaController;
use App\Http\Controllers\PagosController;
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
Route::get('/servicios', function () {
    return view('servicios');
});
Route::get('/portafolio', function () {
    return view('portafolio');
});
Route::get('/acercade', function () {
    return view('acercade');
});
Route::get('/blog', function(){
    return view('blog');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('plans', PlanController::class);

Route::resource('empresa', EmpresaController::class);

Route::resource('zonas', ZonaController::class);

Route::resource('perfil', PerfilController::class);

Route::resource('clientes', ClienteController::class);

Route::resource('antenas', AntenaController::class);

Route::resource('pagos', PagosController::class);