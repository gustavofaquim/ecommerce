<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
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


Route::get('/',[ProdutoController::class, 'index']);
Route::get('/produtos/create',[ProdutoController::class, 'create']);
Route::post('/produtos',[ProdutoController::class, 'store']);
Route::get('/add-imagem/{id}',[ProdutoController::class, 'addImagens']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
