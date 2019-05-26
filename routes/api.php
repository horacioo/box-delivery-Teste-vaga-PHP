<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::middleware(['auth'])->group(function () {
        Route::get("/filmes",'filmesCtrl@all');
        Route::get("/filmes/favoritar",'filmesCtrl@favoritar');
        Route::get('/filmes/favoritos','user_filmeCtrl@favoritosApi');
//});