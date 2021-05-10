<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('/instituicoes')->group(function () {
    Route::get('/', 'App\Http\Controllers\InstituicoesController@listar');
    Route::get('/{id}', 'App\Http\Controllers\InstituicoesController@listar');
    Route::post('insert', 'App\Http\Controllers\InstituicoesController@insert');
    Route::put('update/{id}', 'App\Http\Controllers\InstituicoesController@update');
    Route::delete('delete/{id}', 'App\Http\Controllers\InstituicoesController@delete');
});
