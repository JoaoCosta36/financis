<?php
use Illuminate\Support\Facades\Route;

// HOME
Route::get('/', function () {
    return view('home');
});
// Rota para Dividas
Route::get('/dividas', [App\Http\Controllers\HomeController::class, 'dividas'])->name('dividas');
Route::post('/dividas', [App\Http\Controllers\HomeController::class, 'inserirDividas'])->name('dividas');
// Rota para Poupancas
Route::get('/poupancas', [App\Http\Controllers\HomeController::class, 'poupancas'])->name('poupancas');
Route::post('/poupancas', [App\Http\Controllers\HomeController::class, 'inserirPoupancas'])->name('poupancas');
//Rita para Wishlist
Route::get('/wishlist', [App\Http\Controllers\HomeController::class, 'wishlist'])->name('wishlist');
Route::post('/wishlist', [App\Http\Controllers\HomeController::class, 'inserirWishlist'])->name('wishlist');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

