<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserAdminController;

Route::get('/', function () {
    return view('welcome');
});

// Rutas para Productos (CRUD completo)
Route::resource('products', ProductController::class);

// Rutas para Categorías (index y store)
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');

// Rutas para Usuarios Internos (index y create)
Route::get('/users', [UserAdminController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserAdminController::class, 'create'])->name('users.create');
Route::post('/users', [UserAdminController::class, 'store'])->name('users.store');
