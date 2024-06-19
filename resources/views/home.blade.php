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

    

<!-- 
    <div class="flex flex-wrap justify-center mt-10">
        @foreach($recipes as $recipe)
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg" src="{{ $recipe->imagen }}" alt="" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $recipe->nombre }}</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                    <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Read more
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>

        @endforeach        
    </div> -->

    <!-- Container wrapper -->
<div class="container-fluid p-3 main">
    <figure class="figure">
        <img src="views/images/slider1.jpg" class="figure-img img-fluid rounded" alt="imagen principal">
        <figcaption class="figure-caption text-end">No sabes que cocinar??</figcaption>
    </figure>
    <h1 class="mt-2">Últimas 5 Recetas Añadidas!</h1>
    <div class="row">
        @foreach($recipes as $recipe)
            <div class="col">
                <div class="card">
                    <img src="{{ $recipe->imagen }}" class="card-img-top" alt="Imagen receta" style="max-width: 450px;">
                    <div class="card-body">
                        <h4 class="card-title"><a href="#">{{ $recipe->nombre }}</a></h4>
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
                        <p class="card-text text-end"><small class="text-muted">Creada por yooooooooo</small> </p>
                    </div>
                    <?php 
                        $colorBG_tmp = "primary";//($item["tiempo"] <= 45) ? "success": (($item["tiempo"] <= 60) ? "primary" : "warning");
                        $colorBG_Nivel = "warning";//($item["dificultad"] == "Baja") ? "success": (($item["dificultad"] == "Mediana") ? "primary" : "warning");
                    ?>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Categoria: <?php echo "<span class='badge bg-secondary float-right'>vegaaanaaa</span></li>"; ?>
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
