<?php

$username = $_SESSION['userName'];

//array de categorias, para no mostrar categorias q no poseen ningun show asignado

use dao\CategoryDao as CategoryDao;

$categoryDAO = new CategoryDAO();
$categoryList = $categoryDAO->GetAllCategoriesInUse();


?>


    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top sticky-top bg-dark">

        <div class="container-fluid">
            <div class="navbar-header text-white">
            <a class="navbar-brand" href="/utn/tpfinallab4">MI-EVENTO.COM</a>
            </div>

            <div class="btn-group navbar-right">
                <div class="btn-group dropleft">

                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                            <?=$username;?>
                    </button>
                    <div class="dropdown-menu" style="z-index: 1;">

                        <a class="dropdown-item " href="/utn/TPFINALLAB4/user/myTickets">mis tickets</a>
                        <a class="dropdown-item" href="/utn/TPFINALLAB4/user/logout">salir</a>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </nav>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top sticky-top bg-dark" style="z-index: 1;">

        <div class="container-fluid text-center">
            <div class="btn-group">


                <div class="btn-group">
                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-calendar"></i>
            </button>
                    <div class="dropdown-menu" style="z-index: 1;">
                        <div class="alert alert-primary">
                            proximas fechas
                        </div>
                        mostrar aqui un calendario?<br> proximas fecha? <br>
                    </div>

                </div>
                <div class="btn-group">

                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-grip-horizontal"></i>
            </button>
                    <div class="dropdown-menu" style="z-index: 1;">
                        <div class="alert alert-primary">
                            categorias
                        </div>
                        <?php

                    foreach ($categoryList as $category) {
                        echo "<a class='dropdown-item' href='/utn/tpfinallab4/event/showAllEventsByCategory/?categoy=".$category->getIdCategory()."'>".$category->getCategoryName()."</a>";
                    }
                    
                    ?>
                    </div>
                </div>
            </div>
        </div>

        <form method="post" action="">
        <form class="form-inline" method="POST" action="event/search">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="buscador" aria-label="Recipient's username with two button addons" aria-describedby="button-addon4" name="search">
                <div class="input-group-append" id="button-addon4">
                    <button class="btn btn-info" type="button">Buscar</button>
                </div>
            </div>
        </form>

    </form>


    </nav>