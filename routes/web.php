<?php

use App\Http\Controllers\ProdutoController;
use App\Models\Produto;
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
})->name('home');

Route::get('/produtos', 'ProdutoController@index')->name('produto.listar');
Route::get('/produto/{id}', 'ProdutoController@create')->name('produto.create');
Route::get('/produto', 'ProdutoController@create')->name('produto.create');

Route::delete('/produto/{id}', 'ProdutoController@delete')->name('produto.delete');
Route::put('/produto/{id}', 'ProdutoController@save')->name('produto.save');
Route::post('/produto', 'ProdutoController@save')->name('produto.save');

Route::get('/categorias', 'CategoriaController@index')->name('categoria.listar');
Route::get('/categoria/{id}', 'CategoriaController@create')->name('categoria.create');
Route::get('/categoria', 'CategoriaController@create')->name('categoria.create');

Route::delete('/categoria/{id}', 'CategoriaController@delete')->name('categoria.delete');
Route::put('/categoria/{id}', 'CategoriaController@save')->name('categoria.save');
Route::post('/categoria', 'CategoriaController@save')->name('categoria.save');
