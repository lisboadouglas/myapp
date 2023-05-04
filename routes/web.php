<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\FornecedoresController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Obrigado;
use App\Http\Controllers\ProdutosController;
use App\Http\Middleware\LogAccessMiddleware;
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

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::get('/', [PrincipalController::class, 'index'])->name('base');
Route::get('/sobre-nos', [SobreController::class, 'index'])->name('sobre-nos');
Route::get('/contato', [ContatoController::class, 'index'])->name('contato');
Route::get('/obrigado', [Obrigado::class, 'index'])->name('obrigado');

Route::get('/login/{error?}', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');

Route::middleware('authenticate:default,visitor')->prefix('/app')->group(function(){
    Route::get('/home', [HomeController::class, 'index'])->name('app.home');
    Route::get('/clientes', [ClientesController::class, 'index'])->name('app.clientes');
    Route::get('/fornecedores', [FornecedoresController::class, 'index'])->name('app.fornecedores');
    Route::get('/fornecedores/listar', [FornecedoresController::class, 'list'])->name('app.fornecedores.listar');
    Route::get('fornecedores/novo', [FornecedoresController::class, 'new'])->name('app.fornecedores.novo');
    Route::get('/produtos', [ProdutosController::class, 'index'])->name('app.produtos');
    Route::get('/sair', [LoginController::class, 'logout'])->name('app.sair');
});

Route::get('user/{user}', [UserController::class, 'show'])->name('user.show');
Route::get('/users', [UserController::class, 'index'])->name('users');

/**
 * Rotas para POST
 */
Route::post('/contato', [ContatoController::class, 'formSend'])->name('contato');