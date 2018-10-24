<?php

$username = "administrador";


?>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top sticky-top bg-dark">

        <div class="container-fluid">
            <div class="navbar-header text-white">
                <a class="navbar-brand">MI-EVENTO.COM</a>
            </div>

            <div class="btn-group navbar-right">
                <div class="btn-group dropleft">

                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                            <?=$username;?>
                    </button>
                    <div class="dropdown-menu" style="z-index: 1;">
                        <a class="dropdown-item" href="user/logout">salir</a>
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
                    <i class="fa fa-calendar"></i>Eventos
                </button>
                    <div class="dropdown-menu" style="z-index: 1;">
                        <a class="dropdown-item " href="#">ABM categorias</a>
                        <a class="dropdown-item " href="#">ABM plazas</a>
                        <a class="dropdown-item " href="#">ABM eventos/artistas</a>
                    </div>
                </div>

                <div class="btn-group">
                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-calendar"></i>Reportes
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