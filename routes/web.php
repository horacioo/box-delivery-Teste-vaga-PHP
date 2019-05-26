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

Auth::routes();

/*
Route::get('/home', 'HomeController@index')->name('home');
///Route::get('/filmes','filmesCtrl@lista');
Route::get('/filmes','filmesCtrl@index');
Route::get('/filmes/cria','filmesCtrl@cria');
Route::post('/filmes/cadastrar','filmesCtrl@cadastrar');
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/filmes','filmesCtrl@index');
    Route::get('/filmes/cria','filmesCtrl@cria');
    Route::post('/filmes/cadastrar','filmesCtrl@cadastrar');
    Route::get('/filmes/favoritos','user_filmeCtrl@favoritos');
    Route::get('/filmes/generos','generoCtrl@cria');
    Route::post('/filmes/generos/criar','generoCtrl@CriaGenero');
    Route::get('/user',function(){return Auth::user();});
});