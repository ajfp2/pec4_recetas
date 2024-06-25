<x-app-layout>




<!-- Container wrapper -->
<div class="container p-3">
    <figure class="figure">
        <img src="images/slider1.jpg" class="figure-img img-fluid rounded" alt="imagen principal">
        <figcaption class="figure-caption text-bold text-end">No sabes que cocinar??</figcaption>
    </figure>
    <h1 class="my-2 h1">Últimas 5 Recetas Añadidas!</h1>
    <div class="row">
        @foreach($recipes as $recipe)
            <div class="col">
                <div class="card">
                    <img src="{{ $recipe->imagen }}" class="card-img-top" alt="Imagen receta" style="max-width: 450px;">
                    <div class="card-body">
                        <h4 class="h4"><a href="{{url('recipe', $recipe->id)}}">{{ $recipe->nombre }}</a></h4>
                        <p class="card-text text-muted text-end pb-2">                            
                            <small>Publicada el {{ date("d/m/Y H:i", strtotime($recipe->fecha)) }}</small>
                            <i class="fa fa-calendar-alt pl-1"></i>
                        </p>
                        <p class="card-text">
                        <?php
                            $palabras_instrucciones = explode(" ", $recipe->instrucciones);
                            $txt_mostar = implode(" ", array_slice($palabras_instrucciones, 0, 25));
                            echo $txt_mostar . " ...";
                        ?>
                        </p>
                        <p class="card-text text-end"><small class="text-muted">Creada por {{ $recipe->user->name }}</small> </p>
                    </div>
                    <?php 
                        $colorBG_tmp = ($recipe->tiempo <= 45) ? "success": (($recipe->tiempo <= 60) ? "primary" : "warning");
                        $colorBG_Nivel = ($recipe->dificultad == "bajo") ? "success": (($recipe->dificultad == "medio") ? "primary" : "warning");
                    ?>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Categoria:
                            @foreach($recipe->categories as $cat)
                                <span class='badge bg-secondary'>{{ $cat->nombre }}</span><br />
                            @endforeach
                        </li>
                        <li class="list-group-item">Tiempo preparación: <?php echo "<span class='badge bg-$colorBG_tmp text-end'>$recipe->tiempo</span></li>"; ?>
                        <li class="list-group-item">Nivel dificultad: <?php echo "<span class='badge bg-$colorBG_Nivel pull-right'>".ucfirst($recipe->dificultad)."</span></li>"; ?>
                        <li class="list-group-item text-end">
                            <a href="{{route('recipe.show', ['id' => $recipe->id])}}" class="btn btn-primary">Ir a la receta</a>
                        </li>
                    </ul>
                </div>
            </div>
            @endforeach 

    </div>
</div>
<!-- Container wrapper -->


</x-app-layout>
