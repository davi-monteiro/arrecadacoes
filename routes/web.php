<?php

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


Route::prefix('/')->group(function () {
    Route::get('', 'App\Http\Controllers\SiteController@index')->name('index');
    Route::get('/instituicao/{id}',  'App\Http\Controllers\SiteController@instituicao')->name('instituicao');
    Route::get('/instituicoes',  'App\Http\Controllers\SiteController@instituicoes')->name('todas_insts');
    Route::get('/login',  'App\Http\Controllers\SiteController@login')->name('login');
    Route::post('/login',  'App\Http\Controllers\SiteController@login');
    Route::get('/criarConta', 'App\Http\Controllers\SiteController@login');
    Route::post('/criarConta', 'App\Http\Controllers\SiteController@criarConta')->name('criarConta');

    Route::get('/logout', function () {
        Auth::guard('usuario')->logout();
        return redirect()->route('index');
    })->name('logout');
});

Route::prefix('painel')->middleware('auth:usuario')->group(function () {
    Route::get('/', 'App\Http\Controllers\PainelController@index')->name('painel.index');
    Route::post('/doacao', 'App\Http\Controllers\PainelController@fazerDoacao')->name('painel.doacao');
    Route::get('/favorito/{id}', 'App\Http\Controllers\PainelController@favorito')->name('favorito');
    Route::post('/alterar', 'App\Http\Controllers\PainelController@alterarDados')->name('painel.alterarDados');
});
