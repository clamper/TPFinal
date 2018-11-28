<?php

//array de categorias, para no mostrar categorias q no poseen ningun show asignado

use dao\CategoryDao as CategoryDao;
use DAO\ShowDAO as ShowDAO;

$categoryDAO = new CategoryDAO();
$categoryList = $categoryDAO->GetAllCategoriesInUse();

$showDAO = new ShowDAO();

$dates = $showDAO->GetDatesByShows();

var_dump($dates);

?>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top sticky-top bg-dark">

    <div class="container-fluid">
        <div class="navbar-header text-white">
            <a class="navbar-brand" href="/utn/tpfinallab4">MI-EVENTO.COM</a>
        </div>

        <div class="navbar-right">
            <a href="/utn/TPFINALLAB4/user/viewRegistrationForm"> <button type="button" class="btn btn-info"><i class="fa fa-user-plus"></i> Registrarse</button></a>
            <a href="/utn/TPFINALLAB4/user/viewLoginForm"><button type="button" class="btn btn-info" id="btn_login_old"><i class="fa fa-user"></i> Entrar</button></a>
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
                    1/1/2018
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