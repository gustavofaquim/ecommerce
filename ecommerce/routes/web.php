<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;

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

//Produto
Route::get('/',[ProdutoController::class, 'index']);
Route::get('/produtos/list', [ProdutoController::class, 'list'])->middleware('auth');
Route::get('/produtos/create',[ProdutoController::class, 'create'])->middleware('auth');
Route::post('/produtos',[ProdutoController::class, 'store']);
Route::get('/produtos/edit/{id}', [ProdutoController::class, 'edit'])->middleware('auth');
Route::put('/produtos/update/{id}', [ProdutoController::class, 'update'])->middleware('auth');
Route::get('/produtos/{id}', [ProdutoController::class, 'show']);


//Adm
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



//Categoria
Route::get('/categorias/create', [CategoriaController::class, 'create'])->middleware('auth');
Route::post('/categorias', [CategoriaController::class, 'store'])->middleware('auth');

//Clientes
Route::get('/clientes/create', [ClienteController::class, 'create']);

