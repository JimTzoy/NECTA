<?php

use App\Http\Controllers\PlanController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ZonaController;
use App\Http\Controllers\AntenaController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\GastosController;
use App\Http\Controllers\IngresosController;
use App\Http\Controllers\PagoClientesController;
use App\Http\Controllers\PagosController;
use App\Http\Controllers\TipoBancoController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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
Route::get('/asociados', function(){
    $emp = Db::table('empresas')->get();
    return view('asociados',compact('emp'));
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

Route::resource('empleados', EmpleadoController::class);

Route::resource('usuarios', UsuariosController::class);

Route::resource('pclient', PagoClientesController::class);
Route::resource('ingresos', IngresosController::class);
Route::resource('gastos', GastosController::class);
Route::resource('bancos', TipoBancoController::class);



Route::get('pclient/index/{id}', [
    'as' => 'index', 'uses' => 'App\Http\Controllers\PagoClientesController@index'
]);
Route::post('pclient/buscador/', [
    'as' => 'buscador', 'uses' => 'App\Http\Controllers\PagoClientesController@buscador'
]);
Route::get('clientes/formato/{id}', [
    'as' => 'formato', 'uses' => 'App\Http\Controllers\ClienteController@formato'
]);
Route::get('clientes/LISTA_CLIENTES/{id}', [
    'as' => 'LISTA_CLIENTES', 'uses' => 'App\Http\Controllers\ClienteController@LISTA_CLIENTES'
]);
Route::get('empleados/detalles/{arr}/{psw}', [
    'as' => 'detalles', 'uses' => 'App\Http\Controllers\EmpleadoController@detalles'
]);

Route::name('print')->get('/clientess/imprimir/{id}', [
    'as' =>'imprimir','uses'=>'App\Http\Controllers\ClienteController@imprimir'
]);

Route::get('pagos/ticket/{id}', [
    'as' => 'ticket', 'uses' => 'App\Http\Controllers\PagosController@ticket'
]);

Route::name('print')->get('/pagos/imprimirticket/{id}', [
    'as' =>'imprimirticket','uses'=>'App\Http\Controllers\PagosController@imprimirticket'
]);