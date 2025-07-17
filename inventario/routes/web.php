<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\SubCategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Middleware\UserController;

Route::get('/', function () {
    return redirect()->route('login');
});

//dasbhoard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::resource('categorias', CategoriaController::class);
Route::resource('subcategorias', SubCategoriaController::class);
Route::resource('productos', ProductoController::class);



Route::middleware('auth','admin')->group(function(){
    Route::resource('usuarios', UserController::class);
});

require __DIR__.'/auth.php';
