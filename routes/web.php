<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RecipeController::class, 'index'])->name('home');
Route::get('/home', [RecipeController::class, 'index'])->name('home');

Route::get('/dashboard', [RecipeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
