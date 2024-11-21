<?php

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

use App\Http\Controllers\GraficosController;
use App\Http\Controllers\TabelaController;

Route::prefix('metricas')
// ->middleware('wp.auth')
->group(function () {
    Route::controller(TabelaController::class)->group(function () {
        Route::get('/', 'dados_mongodb_api')->name("tabelas.resultados")->defaults('tipo', 'busca-resultado');
        // Rota específica para imóveis com tipo "imovel"
        Route::get('/imovel', 'dados_mongodb_api')->name("tabelas.resultados_imovel")->defaults('tipo', 'imovel-detalhe');
         // Rota específica para imóveis com tipo "conversão"
        Route::get('/imovel-conversao', 'dados_mongodb_api')->name("tabelas.resultados_conversao")->defaults('tipo', 'lead-form-imovel-contato');
    });

    Route::controller(GraficosController::class)->group(function () { 
        Route::get('/graficos-busca', 'dados_graficos')->name("graficos.busca")->defaults('tipo', 'busca-resultado');
        Route::get('/graficos-imovel', 'dados_graficos')->name("graficos.imovel")->defaults('tipo', 'imovel-detalhe');
        Route::get('/graficos-conversao', 'dados_graficos')->name("graficos.conversao")->defaults('tipo', 'lead-form-imovel-contato');
        Route::get('/recarrega-graficos/{tipo}', 'recarrega_graficos')->name('partials.iframes');
    });
});
