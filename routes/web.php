<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;

// Route::get('/api', function ($id=3) {
//     return $id;
// });

Route::get('', [RecipeController::class, 'index'])->name('home');

Route::get('/', [RecipeController::class, 'index'])->name('home');

Route::get('/home', [RecipeController::class, 'index'])->name('home');

Route::get('/dashboard', [RecipeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/recipe/{id}', [RecipeController::class, 'show'])->name('recipe.show');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
