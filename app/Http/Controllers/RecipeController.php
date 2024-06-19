<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    //Home
    public function index(){
        $recipes = Recipe::latest()->take(5)->get();
        return view('home')->with(compact('recipes'));
    }
}
