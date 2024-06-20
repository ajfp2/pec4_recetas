<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    //Home
    public function index(){

        $recipes = Recipe::take(5)->orderBy('fecha', 'desc')->get();
        // foreach($recipes as $rec){
        //     $rec['category']=$rec->categories();
        // }
        // $recipes3 = Recipe::take(3)->latest()->get();
        // $recipes = array_merge($recipes2, $recipes3);
        return view('home')->with(compact('recipes'));
    }
}
