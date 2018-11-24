<?php

$username = $_SESSION['userName'];


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
                        <a class="dropdown-item" href="/utn/tpfinallab4/user/logout">salir</a>
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
                    <i class="fa fa-edit"></i> Eventos
                </button>
                    <div class="dropdown-menu" style="z-index: 1;">
                        <a class="dropdown-item " href="/utn/TPFINALLAB4">Ver todos</a>
                        <a class="dropdown-item " href="/utn/TPFINALLAB4/event/new">Nuevo evento</a>
                        <a class="dropdown-item " href="/utn/TPFINALLAB4/category">ABM categorias</a>
                        <a class="dropdown-item " href="/utn/TPFINALLAB4/seat">ABM plazas</a>
                        <a class="dropdown-item " href="/utn/TPFINALLAB4/artist">ABM artistas</a>
                    </div>
                </div>

                <div class="btn-group">
                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-table"></i> Reportes
                </button>
                    <div class="dropdown-menu" style="z-index: 1;">
                        <a class="dropdown-item " href="#">Ventas</a>
                        <a class="dropdown-item " href="#">Contaduria</a>
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