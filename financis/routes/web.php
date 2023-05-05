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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rota para Dividas
Route::get('/dividas', [App\Http\Controllers\HomeController::class, 'dividas'])->name('dividas');
Route::post('/dividas', [App\Http\Controllers\HomeController::class, 'inserirDividas'])->name('dividas');
// Rota para Poupancas
Route::get('/poupancas', [App\Http\Controllers\HomeController::class, 'poupancas'])->name('poupancas');
Route::post('/poupancas', [App\Http\Controllers\HomeController::class, 'inserirPoupancas'])->name('poupancas');