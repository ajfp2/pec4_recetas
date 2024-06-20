<x-app-layout>


    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Página principal!") }}
                </div>
            </div>
        </div>
    </div>

    


    <!-- Container wrapper -->
<div class="container p-3">
    <figure class="figure">
        <img src="images/slider1.jpg" class="figure-img img-fluid rounded" alt="imagen principal">
        <figcaption class="figure-caption text-end">No sabes que cocinar??</figcaption>
    </figure>
    <h1 class="mt-2">Últimas 5 Recetas Añadidas!</h1>
    <div class="row">
        @foreach($recipes as $recipe)
        <!-- <pre> {{ var_dump($recipe->category); }}</pre> -->
            <div class="col">
                <div class="card">
                    <img src="{{ $recipe->imagen }}" class="card-img-top" alt="Imagen receta" style="max-width: 450px;">
                    <div class="card-body">
                        <h4 class="card-title"><a href="#">{{ $recipe->nombre }}--{{ $recipe->id }}</a></h4>
                        <p class="card-text text-muted text-end">                            
                            <small>Publicada el {{ date("d/m/Y H:i", strtotime($recipe->fecha)) }}</small>
                            <i class="fa fa-calendar-alt pl-1"></i>
                        </p>
                        <p class="card-text">
                        <?php
                                // $palabras_instrucciones = explode(" ", $item["instrucciones"]);
                                // $txt_mostar = implode(" ", array_slice($palabras_instrucciones, 0, 30));
                                // echo $txt_mostar . " ...";
                            ?>
                        {{ $recipe->instrucciones }}
                        </p>
                        <p class="card-text text-end"><small class="text-muted">Creada por {{ $recipe->users }}</small> </p>
                    </div>
                    <?php 
                        $colorBG_tmp = "primary";//($item["tiempo"] <= 45) ? "success": (($item["tiempo"] <= 60) ? "primary" : "warning");
                        $colorBG_Nivel = "warning";//($item["dificultad"] == "Baja") ? "success": (($item["dificultad"] == "Mediana") ? "primary" : "warning");
                    ?>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Categoria: {{ $recipe->categories }} <?php echo "<span class='badge bg-secondary float-right'>vegaaanaaa</span></li>"; ?>
                        <li class="list-group-item">Tiempo preparación: <?php echo "<span class='badge bg-$colorBG_tmp float-right'>150</span></li>"; ?>
                        <li class="list-group-item">Nivel dificultad: <?php echo "<span class='badge bg-$colorBG_Nivel float-right'>molta</span></li>"; ?>
                        <li class="list-group-item text-end">
                            <a href="#" class="btn btn-primary">Ir a la receta</a>
                        </li>
                    </ul>
                </div>
            </div>
            @endforeach 

    </div>
</div>
<!-- Container wrapper -->


</x-app-layout>
