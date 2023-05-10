<?php
use Illuminate\Support\Facades\Route;

// Rota para Dividas
Route::get('/dividas', [App\Http\Controllers\HomeController::class, 'dividas'])->name('dividas');
Route::post('/dividas', [App\Http\Controllers\HomeController::class, 'inserirDividas'])->name('dividas');
// Rota para Poupancas
Route::get('/poupancas', [App\Http\Controllers\HomeController::class, 'poupancas'])->name('poupancas');
Route::post('/poupancas', [App\Http\Controllers\HomeController::class, 'inserirPoupancas'])->name('poupancas');
Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

