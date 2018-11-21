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

<div class="container" data-spy="scroll" data-target=".navbar" data-offset="50" style="z-index: 1;">

    <div id="section" class="container" style="padding-top:40px;padding-bottom:30px">

        <div class="card card-body bg-info text-white text-center"><?=$show->getShowName();?></div>
        <br>
        <br>

        <div class="card-columns" id="card-colums-show">

            <div class="card">
                <img class="card-img-top" src="/utn/tpfinallab4/views/img/prueba_evento.svg" alt="Card image">
            </div>

            <div class="card">
                <div class="card-body bg-light"><?=$show->getDescription();?></div>                
                    <div class="card-body bg-primary text-white text-center">Precios desde: $<?=$precioMenor;?></div>
                </div>
            </div>
        </div>

        <?php
        foreach ($artistArray as $artistString => $value)
        {?>
            <div class="card bg-light" style="margin-top:20px;">
                <h6 class="card-title" style="padding-left:20px;">Día: <?=$artistString?></h6>
                <div class="card-body"><?=$value?></div>
            </div> 

        <?php
        }      
        ?>



        
        
    </div>
</div>