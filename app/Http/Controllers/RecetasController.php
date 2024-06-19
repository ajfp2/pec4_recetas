<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecetasController extends Controller
{
    //
    public function index(){
        $recipes = Recipe::all();
        return view('home')->with(compact('recipes'));
    }
}
