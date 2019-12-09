<?php

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

Route::resource('produtos','ProdutoController')->middleware('auth');
Route::patch('/produto/update/{produto}', 'ProdutoController@update')->middleware('auth');
Route::get('/produto/{produto}/destroy', 'ProdutoController@destroy')->middleware('auth');

Route::resource('clientes','ClienteController')->middleware('auth');
Route::patch('/cliente/update/{cliente}', 'ClienteController@update')->middleware('auth');
Route::get('/cliente/{cliente}/destroy', 'ClienteController@destroy')->middleware('auth');
Route::get('/cliente/lista/{letra}', 'ClienteController@lista')->middleware('auth');
Route::get('/cliente/busca', 'ClienteController@busca')->middleware('auth');

Route::resource('pedidos','PedidoController')->middleware('auth');
Route::patch('/pedido/update/{pedido}', 'PedidoController@update')->middleware('auth');
Route::get('/pedido/{pedido}/destroy', 'PedidoController@destroy')->middleware('auth');
Route::get('/pedido/lista/{letra}', 'PedidoController@lista')->middleware('auth');
Route::get('/pedido/busca', 'PedidoController@busca')->middleware('auth');

Route::resource('contas','ContaController')->middleware('auth');
Route::patch('/conta/update/{conta}', 'ContaController@update')->middleware('auth');
Route::get('/conta/lista/{letra}', 'ContaController@lista')->middleware('auth');
Route::get('/conta/show/{cliente}','ContaController@show')->middleware('auth');
Route::get('/conta/showAll/{cliente}', 'ContaController@showAll')->middleware('auth');
Route::get('/conta/showData/{cliente}', 'ContaController@showData')->middleware('auth');
Route::get('/conta/busca', 'ContaController@busca')->middleware('auth');

Route::get('/pagamento/store/{conta}', 'PagamentoController@store')->middleware('auth');
Route::get('/pagamento/parcial/{conta}', 'PagamentoController@parcial')->middleware('auth');
Route::get('/pagamento/{pagamento}/destroy', 'PagamentoController@destroy')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
