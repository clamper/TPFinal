<?php

    use Models\Show as Show;
    use DAO\ShowDAO as ShowDAO;

    $DAO = new ShowDAO();

    //$showId = $_POST["showid"];

    $showId = 2;
    $show = null;

    $show = $DAO->GetShowByID($showId);

    if ($show == null){
        echo "El getShowById() no encontre el id enviado por POST!";
    }

?>



<div class="container" data-spy="scroll" data-target=".navbar" data-offset="50" style="z-index: 1;">

    <div id="section" class="container" style="padding-top:40px;padding-bottom:30px">

        <div class="card card-body bg-info text-white text-center"><?=$show->getShowName();?></div>
        <br>
        <br>

        
    </div>
</div>