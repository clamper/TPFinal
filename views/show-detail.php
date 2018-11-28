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

<div class="container" data-spy="scroll" data-target=".navbar" data-offset="50" style="z-index: 1; margin-bottom:50px;" id="show_detail_content">

    <div id="section" class="container" style="padding-top:40px;padding-bottom:30px" >

        <div class="card card-body bg-info text-white text-center"><?=$show->getShowName();?></div>
        <br>
        <br>

        <div class="card-columns" id="card-colums-show">

            <div class="card">
                <div class="card-body">
                    <?php
                        if ( $show->getIdImage() == 0)
                            echo "<img class='card-img-top' src='/utn/tpfinallab4/views/img/prueba_evento.svg' alt='Card image'>";
                        else
                            echo "<img class='card-img-top' src='/utn/tpfinallab4/images/".$show->getIdImage()."' alt='Card image'>";
                    ?>
                </div>

                <?php

                if ($_SESSION['userType'] == "admin")
                {
                ?>
                    <div class="card-footer text-muted text-center">
                        <form method="POST" action="/utn/TPFINALLAB4/image/save" enctype="multipart/form-data">

                            <input type="hidden" value="<?=$show->getIdShow();?>" name="id">

                            <div class="custom-file" id="customFile" lang="es">
                                <input type="file" class="custom-file-input" name="fileToUpload" id="fileToUpload" accept="image/x-png,image/gif,image/jpeg" aria-describedby="fileHelp" required>
                                <label class="custom-file-label" for="fileToUpload">
                                    Seleccione su imagen
                                </label>
                                
                            </div>
                            <br><br>
                            <button type="submit" class='btn btn-primary' name="upload">subir nueva imagen</button>
                        </form>
                        
            
                    </div>
                <?PHP
                }
                ?>
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
                    <div class="d-flex justify-content-between">
                        <span><?=$value?> </span>
                        
                        <?php
                            //var_dump(date("d-m-y"));
                            //var_dump(date("d-m-y", strtotime($key_date) ));
                            //var_dump(date("d-m-y") > date("d-m-y", strtotime($key_date) ));
                            // si esta logeado como usuario

                            $fecha = strtotime($key_date);
                            $hoy = strtotime(date("d-m-Y"));

                            if ($_SESSION['userType'] == "user")
                                if (    $fecha  > $hoy )
                                    echo " <button type='button' class='btn btn-primary' data='".$presentationArray[$key_date]."' id='open_add_cart'>agregar al carrito </button>";



                        ?>

                    </div>
                </div>
            </div> 

        <?php
        }      
        ?>


        
        
    </div>
</div>

<div class="modal" id="modal_add_location_to_cart">
        <div class="modal-dialog">
        
            <form method="POST" action="/utn/TPFINALLAB4/user/addToCart" id="formAddCart" >
                <input type="hidden" name="idshow"  value="<?=$showid?>">
                <input type="hidden" name="idpresentation" value="">

                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">seleccione sus entradas</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <?php

                            foreach ($locationsList as $location) {

                                // $max = $locationsDAO->getabalibility($location->getIdLocation());
                                $max = $locationsDAO->GetAvailability($location->getIdLocation());

                                

                                $seat = $seatDAO->GetSeatbyID($location->getIdSeat()); 
                                //echo $seat->getSeatName() ." - $".$location->getLocationPrice();

                                echo "<div class='card card-body bg-info text-white'>".
                                        "<div class='d-flex justify-content-between'>";

                                        if ($max != 0)
                                        {
                                            echo "<span>".$seat->getSeatName() ." - $<span id='price".$location->getIdSeat()."'>".$location->getLocationPrice()."</span></span>".
                                            "<span><input data='".$location->getIdSeat()."' type='number' placeholder='cantidad' name='seat".$location->getIdSeat()."' id='location_cant' min=0 max=".$max."></span>".
                                            "<span id='total".$location->getIdSeat()."'>$0</span>";
                                        }
                                        else
                                        {
                                            echo "entradas agotadas";
                                        }


                                echo        "</div>".
                                    "</div>";
                            }

                            echo "<br><br><br>";

                            echo "<div class=' text-right' id='total'>total $0</div>";

                            ?> 
                            
                    </div>

                    <div class="modal-footer" id='modal_cart_footer'>
                        <button type="button" class="btn btn-warning" data-dismiss="modal" id="close">cancelar</button>
                        <button type="submit" class="btn btn-info" id="final_buy">comprar</button>
                    </div>

                </div>
            </form>
        </div>
    </div>