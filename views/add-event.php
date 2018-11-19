<?php

/*
DEBE RECIBIR

ARRAY CATEGORIAS
ARRAY TIPO DE PLATEAS
ARRAY DE ARTISTAS

*/
$categories;
$artists;
$seats;

$categorias = ["show","musical","teatro","cine"];
$plate_types = ["general","palco","platea lateral","campo"];
$artist = ["popeye","xuxa","pato donald"];


?>
<div class="container">
    <br>
    <div class="alert alert-success">
        Datos del nuevo evento
    </div>

    <form action="/utn/TPFINALLAB4/event/save" method="POST" action="event/save">
        <div class="form-group">

            <div class="card">
                <div class="card-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Titulo</span>
                        </div>

                        <input type="text" class="form-control" name="name" placeholder="titulo del evento" maxlength="14"
                            required>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">descripci&oacute;n</span>
                        </div>
                        <input type="text" class="form-control" name="description" placeholder="descripcion" maxlength="200">
                    </div>

                </div>
            </div>


            <!-- categorias -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">categorias</h5>
                    <?php

                    // CATEGORIAS
                    foreach ($categories as $category) {
                        
                    ?>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="cat<?=$category->getIdCategory();?>"
                            name="categories[]" value="<?=$category->getIdCategory();?>">
                        <label class="custom-control-label" for="cat<?=$category->getIdCategory()?>">
                            <?=$category->getCategoryName()?></label>
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
                                <input type="date" class="form-control" name="days[]">
                                <input type="text" name="artist[]">
                                <button type="button" class="btn bg-info" id="select_artist" data-toggle="modal"
                                    data-target="#modal_artist">seleccionar artistas</button>
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
                                <input type="date" class="form-control" name="days[]">
                                <input type="text" name="artist[]">
                                <button type="button" class="btn bg-info" id="select_artist" data-toggle="modal"
                                    data-target="#modal_artist">seleccionar artistas</button>
                            </div>
                            <div class="input-group-prepend">
                                <input type="date" class="form-control" name="days[]">
                                <input type="text" name="artist[]">
                                <button type="button" class="btn bg-info" id="select_artist" data-toggle="modal"
                                    data-target="#modal_artist">seleccionar artistas</button>
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

                        // plateas
                        foreach ($seats as $seat) {
                        ?>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <?=$seat->getSeatName();?></span>
                            </div>
                            <input type="number" class="form-control" name="seat_total<?=$seat->getIdSeat();?>"
                                placeholder="lugares disponibles">
                            <input type="number" placeholder="costo" name="seat_cost<?=$seat->getIdSeat();?>">
                        </div>
                        <?php
                        }
                        ?>

                    </div>

                    <!-- costo por eventos de mas dias -->
                    <div id="more_days_cost" style="display: none;">

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


            <div class="modal" id="modal_artist">
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

                            // ARTISTAS

                            foreach ($artists as $artist) {
                            ?>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="artist<?=$artist->getIdArtist();?>">
                                            <label class="custom-control-label" for="artist<?=$artist->getIdArtist();?>">
                                                <?=$artist->getArtistName();?></label>
                                        </div>


                                        <?php
                            }
                            ?>

                                    </ul>
                                </div>
                            </div>

                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-info" data-dismiss="modal">Guardar</button>
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