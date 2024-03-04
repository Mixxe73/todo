<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/todos', [TodoController::class, 'index'])->name('todos.index');
    Route::get('/todos/create', [TodoController::class, 'create'])->name('todos.create');
    Route::get('/todos/{id}/edit', [TodoController::class, 'edit'])->name('todos.edit');
    Route::post('/todos/store', [TodoController::class, 'store'])->name('todos.store');
    Route::put('/todos/update', [TodoController::class, 'update'])->name('todos.update');
    Route::put('/todos/{id}/toggle-status', [TodoController::class, 'toggleStatus'])->name('todos.toggle-status');
    Route::put('/todos/{id}/toggle-favorite', [TodoController::class, 'toggleFavorite'])->name('todos.toggle-favorite');
    Route::delete('/todos/{id}/destroy', [TodoController::class, 'destroy'])->name('todos.destroy');
});

Route::get('/', function () {
    return view('home');
});

require __DIR__ . '/auth.php';
