<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\SubCategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;

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

Route::middleware('auth')->group(function () {
    Route::resource('categorias', CategoriaController::class)->except(['destroy']);
    Route::delete('/categorias/{categoria}', [CategoriaController::class, 'destroy'])->name('categorias.destroy')->middleware('admin');
    Route::resource('subcategorias', SubCategoriaController::class)->except(['destroy']);
    Route::delete('/subcategorias/{subcategoria}', [SubCategoriaController::class, 'destroy'])->name('subcategorias.destroy')->middleware('admin');
    Route::resource('productos', ProductoController::class)->except(['destroy']);
    Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy')->middleware('admin');
    Route::resource('usuarios', UserController::class)->except(['destroy']);
    Route::delete('/usuarios/{usuario}', [UserController::class, 'destroy'])->name('usuarios.destroy')->middleware('admin');
});

Route::get('/api/subcategorias/{categoria_id}', [ProductoController::class, 'getSubcategorias'])->name('api.subcategorias');

require __DIR__.'/auth.php';
