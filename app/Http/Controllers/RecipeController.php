<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    // Password ajfp2: @jfp2024
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

    public function list($page){
        $items = 10;
        $recipes = Recipe::paginate($items);
    }

    public function show($id){
        $receta = Recipe::find($id);
        return view('recipe')->with(compact('receta'));
    }

    public function create(){
        return view (''); // form nueva receta
    }

    public function store(){
        return view (''); // registrar en BD nueva receta
    }
}
