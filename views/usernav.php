<?php

$username = $_SESSION['userName'];

//array de categorias, para no mostrar categorias q no poseen ningun show asignado

use dao\CategoryDao as CategoryDao;

$categoryDAO = new CategoryDAO();
use DAO\ShowDAO as ShowDAO;
$categoryList = $categoryDAO->GetAllCategoriesInUse();

$showDAO = new ShowDAO();

$dates = $showDAO->GetDatesByShows();

// a modo muestra y prueba
//$_SESSION['cart'] = Array();


//  CART GUARDA UN ARRAY CON INDICEN DE LOS IDS DE LAS LOCACIONES Y COMO VALOR LA CANTIDAD DE ENTRADAS COMPRADAS
//$_SESSION['cart']['idlocation'] = CANTIDAD;


/*
$_SESSION['cart']['1'] = 1;
$_SESSION['cart']['16'] = 5;
$_SESSION['cart']['24'] = 2;
*/


// SUMA LOS VALORES PARA PONER EL NUMERO SOBRE EL CARRITO
$cant = 0;

foreach ($_SESSION['cart'] as $idlocation => $value) {
    $cant = $cant + $value;
}

?>


    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top sticky-top bg-dark">

        <div class="container-fluid">
            <div class="navbar-header text-white">
                <a class="navbar-brand" href="/utn/tpfinallab4">MI-EVENTO.COM</a>
            </div>

            <div class="navbar-right">

                <a href="/utn/TPFINALLAB4/user/myCart">
                    <button type="button" class="btn btn-info">
                        <i class="fas fa-shopping-cart fa-lg"> </i> <span class="badge badge-light" style="transform: translate(30%, -0%);"><?=$cant?></span>
                    </button>
                </a>

                <div class="btn-group dropleft">



                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                            <?=$username;?>
                    </button>
                    <div class="dropdown-menu" style="z-index: 1;">
                        <a class="dropdown-item " href="/utn/TPFINALLAB4/ticket/ViewMyTickets">mis tickets</a>
                        <a class="dropdown-item" href="/utn/TPFINALLAB4/user/logout">salir</a>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </nav>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top sticky-top bg-dark" style="z-index: 1;">

        <div class="container-fluid text-center">
            <div class="navbar-header">


                <div class="btn-group">
                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-calendar"></i> fechas
                    </button>
                <div class="dropdown-menu" style="z-index: 1;">
                <?php
                    foreach ($dates as $date) {
                        echo "<a class='dropdown-item' href='/utn/tpfinallab4/event/showAllEventsByDate/?date=".date("y/m/d", strtotime($date))."'>".date("d/m/y", strtotime($date) )."</a>";
                        
                    }
                ?>
                </div>
            </div>

                <div class="btn-group">
                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-grip-horizontal"></i> categorias
                    </button>
                    <div class="dropdown-menu" style="z-index: 1;">
                        <?php

                        foreach ($categoryList as $category) {
                            echo "<a class='dropdown-item' href='/utn/tpfinallab4/event/showAllEventsByCategory/?categoy=".$category->getIdCategory()."'>".$category->getCategoryName()."</a>";
                        }
                            
                        ?>
                    </div>
                </div>
                
            </div>
        </div>


        <form class="form-inline" method="POST" action="event/search">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="buscador" name="search" required>
                <div class="input-group-append" id="button-addon4">
                    <button class="btn btn-info" type="submit">Buscar</button>
                </div>
            </div>
        </form>


    </nav>




    <div class="modal" id="modal_cart">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">mi carrito</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>


                <div class="modal-body">
                    <form method="POST" action="/utn/TPFINALLAB4/seat/delete" id="form_delete">
                        <input type="hidden" name="index" id="index_delete">
                    </form>
                    <h5>seguro que desea eliminar?</h5>

                </div>

                <div class="modal-footer" id='modal_cart_footer'>
                    <button type="button" class="btn btn-info" data-dismiss="modal" id="close">continuar comprando</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal" id="final_buy">finalizar compra</button>
                </div>

            </div>
        </div>
    </div>