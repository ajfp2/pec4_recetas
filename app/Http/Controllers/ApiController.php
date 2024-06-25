<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    //
    private function formato($code = 404, $req = false, $detalle="no encontrado", $datos = NULL){
        $json = array(
            'status' => $req,
            'message' => $detalle,
            'data' => $datos
        );
        return response()->json($json, $code);
    }

    /*==================================================================
     FUNCTION INDEX: Mostrar todos las recetas de 10 en 10 de la tabla recipes
    ==================================================================*/
    public function index(Request $request, int $page){
        $porPagina = 10;
        $paginaActual = $page ?? 1;
        $offset = ($paginaActual - 1) * $porPagina;

        
        $recipes = DB::select('SELECT id, nombre, fecha FROM recipes_pec4 ORDER BY id;');
        $total = Recipe::all()->count();

        $data_slice = array_slice($recipes, $offset, $porPagina, true);
        $data = new LengthAwarePaginator($data_slice, $total, $porPagina, $paginaActual, [
            'path' => $request->url(),
            'query' => $request->query()
        ]);
        return $this->formato(200, true, "Mostrando $porPagina recetas de $total en pagina $paginaActual", $data);
    }

    /*==================================================================
     FUNCTION SHOW: Mostrar todos los campos de una receta parametro ID
    ==================================================================*/
    public function show(Request $request, int $id){
        $recipe = Recipe::find($id);
        $recipe->user;
        $recipe->categories;
        return $this->formato(200, true, "Receta con id: $id", $recipe);
    }

    public function categories(Request $request, int $id, int $page){
        $porPagina = 10;
        $paginaActual = $page ?? 1;
        $offset = ($paginaActual - 1) * $porPagina;

        $recipes = DB::select("SELECT recipes_pec4.id, 
            recipes_pec4.nombre As receta, 
            recipes_pec4.fecha, 
            categories_pec4.id As id_cateogria, 
            categories_pec4.nombre As categoria
            FROM categories_pec4 
            INNER JOIN category_recipe ON category_recipe.category_id = categories_pec4.id 
            INNER JOIN recipes_pec4 ON category_recipe.recipe_id = recipes_pec4.id
            WHERE categories_pec4.id = $id;");
        $total = count($recipes);
        
        $data_slice = array_slice($recipes, $offset, $porPagina, true);
        $data = new LengthAwarePaginator($data_slice, $total, $porPagina, $paginaActual, [
            'path' => $request->url(),
            'query' => $request->query()
        ]);

        return $this->formato(200, true, "Recetas con Categoria con id: $id y $total recetas", $data);
    }

    
}
