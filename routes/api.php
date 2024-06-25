<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

//--> /api/recipes/1  
Route::get('recipes/{page}', [ApiController::class, 'index'])->name('api.recipes');

//--> /api/recipe/1  
Route::get('recipe/{id}', [ApiController::class, 'show'])->name('api.recipe');

//--> /api/category/1/1  
Route::get('category/{id}/{page}', [ApiController::class, 'categories'])->name('api.category');
