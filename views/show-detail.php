<?php

    use Models\Show as Show;
    use DAO\ShowDAO as ShowDAO;
/*
    $DAO = new ShowDAO();

    $showId = 2;
    $show = null;

    $precioMenor = 599;

    $show = $DAO->GetShowByID($showId);    

    $arrayArtistas["27/10/18"] = "Artista1";
    $arrayArtistas["28/10/18"] = "Artista2, Artista1, Artista1";
    $arrayArtistas["29/10/18"] = "Artista3, Artista4";
    $arrayArtistas["30/10/18"] = "Artista4, Artista2, Artista3";
    $arrayArtistas["31/10/18"] = "Artista5, Artista4";
*/
    if ($show == null){
        echo "El show es null !!!";
    }

    /* 

    $Show: es un objeto show;    
    $artistArray: es una lista de strings, como clave usa el dia, como dato la lista de artistas separados por coma.
    $minPrice: es el precio desde para el SHOW.
    $presentationArray: es una lista de los IDS de las presentaciones, como clave usa el dia, como dato el ID de las presentaciones
    */

?>

<STYLE>
    @media (min-width: 600px) {
    #card-colums-show {
        column-count: 2;
    }
}

@media (max-width: 600px) {
    #card-colums-show {
        column-count: 1;
    }
}

</STYLE>

<div class="container" data-spy="scroll" data-target=".navbar" data-offset="50" style="z-index: 1; margin-bottom:50px;">

    <div id="section" class="container" style="padding-top:40px;padding-bottom:30px">

        <div class="card card-body bg-info text-white text-center"><?=$show->getShowName();?></div>
        <br>
        <br>

        <div class="card-columns" id="card-colums-show">

            <div class="card">
                <img class="card-img-top" src="/utn/tpfinallab4/views/img/prueba_evento.svg" alt="Card image">
            </div>

            <div class="card">
                <div class="card-body bg-light">
                    <?=$show->getDescription();?>
                </div>
                <div class="card-body bg-primary text-white text-center " >
                    Precios desde: $<?=$precioMenor;?>
                </div>
            </div>
        </div>

        <?php
        foreach ($artistArray as $key_date => $value)
        {?>
            <div class="card bg-light" style="margin-top:20px;">
            <div class="card-header">
                <span><?=$key_date?> </span>
                
            </div>

                <div class="card-body">
                    <div class=" d-flex justify-content-between">
                        <span><?=$value?> </span>
                        
                        <?php
                            // si esta logeado como usuario
                            if ($_SESSION['userType'] == "user")
                                echo " <button type='button' data='".$presentationArray[$key_date]."' id='open_add_cart'>agregar al carrito </button>"

                        ?>

                    </div>
                </div>
            </div> 

        <?php
        }      
        ?>


        
        
    </div>
</div>


<?php

// $locationsList;
foreach ($locationsList as $location) {
    $seat = $seatDAO->GetSeatbyID($location->getIdSeat()); 
    var_dump($seat);
    echo $seat->getSeatName() ." - $".$location->getLocationPrice()."<br>";
}


?>

<div class="modal" id="modal_add_location_to_cart">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">seleccione sus entradas</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form method="POST" action="/utn/TPFINALLAB4/seat/delete" id="form_delete">
                        <input type="hidden" name="index" id="index_delete">
                    </form>
                    <h5>seguro que desea eliminar?</h5>

                     <?php



                        // $locationsList;
                        foreach ($locationsList as $location) {
                            echo $seatDAO->GetSeatbyID($location->getIdSeat())->getSeatName ." - $".$location->getLocationPrice()."<br>";
                        }



                        ?> 
                </div>

                <div class="modal-footer" id='modal_cart_footer'>
                    <button type="button" class="btn btn-warning" data-dismiss="modal" id="close">cancelar</button>
                    <button type="button" class="btn btn-info" data-dismiss="modal" id="final_buy">comprar</button>
                </div>

            </div>
        </div>
    </div>