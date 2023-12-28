<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FinanceiroController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [FinanceiroController::class, 'index'])->name('home');
Route::get('/financeiro', [FinanceiroController::class, 'index'])->name('financeiro.index');
Route::post('/financeiro/adicionar', [FinanceiroController::class, 'adicionarRegistro'])->name('financeiro.adicionar');
