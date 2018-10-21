<?php

/*
DEBE RECIBIR

ARRAY CATEGORIAS
ARRAY TIPO DE PLATEAS
ARRAY DE ARTISTAS

*/

$categorias = ["show","musical","teatro","cine"];
$plate_types = ["general","palco","platea lateral","campo"];
$artist = ["popeye","xuxa","pato donald"];


?>
<div class="container">
    <br>
    <div class="alert alert-success">
        Datos del nuevo evento
    </div>

    <form action="events/saveNew" method="POST" action="event/save">
        <div class="form-group">

            <div class="card">
                <div class="card-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Titulo</span>
                        </div>
                        <input type="text" class="form-control" name="mainTitle" placeholder="titulo completo del evento"
                            required>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">titulo de tarjeta</span>
                        </div>
                        <input type="text" class="form-control" name="subTitle" placeholder="titulo que aparecera sobre las tarjetas"
                            maxlength="14" required>
                    </div>

                </div>
            </div>


            <!-- categorias -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">categorias</h5>
                    <?php

                    // CATEGORIAS
                    for ($x = 0; $x < count($categorias); $x++)
                    {
                    ?>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="cat<?=$x?>" name="cat<?=$x?>">
                        <label class="custom-control-label" for="cat<?=$x?>">
                            <?=$categorias[$x]?></label>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>


            <!-- dias -->

            <div class="card">
                <div class="card-body" id="days">
                    <h5 class="card-title">duracion del evento</h5>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="customRadio" name="days_radio" value="only"
                            checked>
                        <label class="custom-control-label" for="customRadio">un solo dia</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="customRadio2" name="days_radio" value="more">
                        <label class="custom-control-label" for="customRadio2">varios dias</label>
                    </div>

                    <br>
                    <br>

                    <!-- un solo dia-->
                    <div id="only_day">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">dia del evento</h5>
                            </div>
                            <div class="input-group-prepend">
                                <input type="date" class="form-control" name="days">
                                <input type="text" name="artist">
                                <button type="button" class="btn bg-info" id="select_artist" data-toggle="modal"
                                    data-target="#myModal">seleccionar artistas</button>
                            </div>
                        </div>
                    </div>

                    <!-- multiples dias-->
                    <div id="more_days" style="display: none;">
                        <div class="card" id="list_days">
                            <div class="card-body">
                                <h5 class="card-title">dias del evento</h5>
                                <button type="button" id="add_day" class="btn bg-info">Agregar dias</button>
                            </div>
                            <div class="input-group-prepend">
                                <input type="date" class="form-control" name="days">
                                <input type="text" name="artist">
                                <button type="button" class="btn bg-info" id="select_artist" data-toggle="modal"
                                    data-target="#myModal">seleccionar artistas</button>
                            </div>
                            <div class="input-group-prepend">
                                <input type="date" class="form-control" name="days">
                                <input type="text" name="artist">
                                <button type="button" class="btn bg-info" id="select_artist" data-toggle="modal"
                                    data-target="#myModal">seleccionar artistas</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PLATEAS -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">plateas y precios</h5>

                    <div id="only_day_cost">
                        <!-- cada tipo de platea-->
                        <?php

                        // CATEGORIAS
                        for ($x = 0; $x < count($plate_types); $x++)
                        {
                        ?>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <?=$plate_types[$x]?></span>
                            </div>
                            <input type="number" class="form-control" name="plate<?=$x?>" placeholder="lugares disponibles">
                            <input type="number" placeholder="costo" name="plate_cost<?=$x?>">
                        </div>
                        <?php
                        }
                        ?>

                    </div>

                    <!-- costo por eventos de mas dias -->
                    <div id="more_days_cost" style="display: none;">

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">por dia</span>
                            </div>
                            <input type="number" class="form-control" name="plate_day" placeholder="lugares disponibles">
                            <input type="number" placeholder="costo" name="plate_day_cost">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">todos los dias</span>
                            </div>
                            <input type="number" class="form-control" name="plate_all" placeholder="lugares disponibles">
                            <input type="number" placeholder="costo" name="plate_all_cost">
                        </div>

                    </div>




                </div>




            </div>


            <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Seleccione los artistas</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>


                        <div class="modal-body">

                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">artistas</h5>
                                    <ul class="list-group" id="myList">
                                        <?php

                            // artistas
                            for ($x = 0; $x < count($artist); $x++)
                            {
                            ?>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="artist<?=$x?>" name="artist<?=$x?>">
                                            <label class="custom-control-label" for="artist<?=$x?>">
                                                <?=$artist[$x]?></label>
                                        </div>


                                        <?php
                            }
                            ?>

                                    </ul>
                                </div>
                            </div>

                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        </div>

                    </div>
                </div>
            </div>


            <br><br>
            <button type="submit" class="btn bg-info"> guardar envento</button>
            <br><br>
            <br><br>
    </form>
</div>