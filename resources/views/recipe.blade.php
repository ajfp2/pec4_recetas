<x-app-layout>
    <div class="container p-3">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-lg-6 col-md-4 col-xs-12 text-center">
                    <img src="../{{ $receta->imagen }}" class="img-fluid rounded-start text-center" alt="thumbnail imagen de la receta">
                </div>
                <div class="col-lg-6 col-md-8 col-xs-12">
                    <div class="card-body">
                        <h2 class="h2 mb-2">{{ $receta->nombre }}</h2>
                        <h6 class="h6 text-muted">Creada por {{ $receta->user->name }}</h6>
                        <p class="text-small text-muted text-end">                            
                            <small>Publicada el {{ date("d/m/Y H:i:s", strtotime( $receta->fecha )) }}</small>
                            <i class="fa fa-calendar-alt pl-1"></i>
                        </p>

                        <?php 
                            $colorBG_tmp = ($receta->tiempo <= 45) ? "success": (($receta->tiempo <= 60) ? "primary" : "warning");
                            $colorBG_Nivel = ($receta->dificultad == "bajo") ? "success": (($receta->dificultad == "medio") ? "primary" : "warning");
                        ?>
                        <h6 class="h6">Categoría: 
                        @foreach($receta->categories as $cat)
                                <span class='badge bg-secondary float-right'>{{ $cat->nombre }}</span>
                        @endforeach
                        </h6>
                        <h6 class="h6">Dificultad <span class="badge bg-<?= $colorBG_tmp; ?>">{{ ucfirst($receta->dificultad) }}</span></h6>
                        <h6 class="h6">Tiempo Preparación <span class="badge bg-<?= $colorBG_Nivel; ?>">{{ $receta->tiempo }}</span></h6>
                        <h5 class="mt-3 text-decoration-underline">Ingredientes:</h5>
                        <p class="card-text ms-3">
                            <?php
                                $ingredientes = explode(",", $receta->ingredientes);
                                foreach($ingredientes as $in){
                                    echo $in . "<br />";
                                }
                            ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row mx-3 pb-5">
                <div class="col-md-12">
                    <h4>Preparación</h4><hr />
                    <p class="card-text text-justify lh-base"> {{ $receta->instrucciones }}</p>
                </div>
            </div>
            <a href="{{ url('/') }}" role="button" class="btn btn-secondary m-3">Volver</a>
        </div>
    </div>


</x-app-layout>
