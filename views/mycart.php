<?php 

$items = 0;
$costoTotal = 0;
$entradasTotal = 0;

?>

<div class="container">

    <br><br>
    <div class="card card-body bg-info text-white text-center">mi carrito</div>
    <br>

    <?php
        foreach ($_SESSION['cart'] as $idLocation => $cant) {
            
            $items = $cant;
            
            if ($cant > 0)
            {
                $location = $locationsDAO->GetLocationById($idLocation);
                $presentation = $presentationDAO->GetPresentationById($location->getIdPres());
                $seat = $seatDAO->GetSeatbyID( $location->getIdSeat() );
                $show = $showDAO->GetShowByID($presentation->getIdShow() );

                $date = date("d-m-y", strtotime($presentation->getPresDate()));

                $precio = $location->getLocationPrice();
                $total = $precio * $cant;

                $entradasTotal = $entradasTotal + $cant;
                $costoTotal = $costoTotal + $total;

                ?>

                <div class="card">
                    <div class="card-header"><span><?PHP echo $show->getShowName()." - ".$date?></span></div>
                    
                    <div class="card-body">
                        <div class='d-flex justify-content-between'>
                            <span><?php echo $seat->getSeatName()."  $".$location->getLocationPrice();?></span>
                            <span><?php echo $cant." entradas x $".$precio." = $".$total; ?></span>
                        </div>
                    </div>
                </div>

                <?php
             }

        }


        if ($items == 0)
        {
            ?>
        
            <div class="card">
                <div class="card-body">
                    no hay ningun item en su carrito
                </div>
            </div>
        <?php
        }
        else
        {
        ?>
            <br>
            <div class="card card-body text-white text-center">
                <a href="/utn/TPFINALLAB4/ticket/ConfirmTransaction"> <button type="button" class="btn btn-primary">comprar <?=$entradasTotal?> entradas por $ <?=$costoTotal?></button></a>
            </div>
    
        <?php
        }
        ?>



</div>