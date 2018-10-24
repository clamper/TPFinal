<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top sticky-top bg-dark">

    <div class="container-fluid">
        <div class="navbar-header text-white">
            <a class="navbar-brand">MI-EVENTO.COM</a>
        </div>

        <div class="btn-group navbar-right">
            <a href="user/registerPage"> <button type="button" class="btn btn-info"><i class="fa fa-user-plus"></i> Registrarse</button></a>
            <button type="button" class="btn btn-info" id="btn_login"><i class="fa fa-user"></i> Entrar</button>
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
                    mostrar aqui un calendario?<br> proximas fecha? <br> nose
                </div>

            </div>
            <div class="btn-group">

                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-grip-horizontal"></i>
            </button>
                <div class="dropdown-menu" style="z-index: 1;">
                    <div class="alert alert-primary">
                        catagorias
                    </div>
                    <a class="dropdown-item " href="#">Conciertos</a>
                    <a class="dropdown-item" href="#">Obras de teatro</a>
                    <a class="dropdown-item" href="#">Exposiciones</a>
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