<?php
// ABM de artistas
// $array_artist  elementos a listar
// $message para mostrar un mensaje de error


$message = "";

//$array_artist
?>

    <div class="container" id="abm_container">
        <br>

        <div class="alert alert-success">
            Edici&oacute;n de artistas
        </div>

        <?php

        if ($message != "")
            echo "<div class='alert alert-danger'>".$message."</div>";
        ?>

            <form method="post" action="/utn/tpfinallab4/artist/new">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">insertar artista</span>
                    </div>
                    <input class="form-control" type="text" name="new">
                    <div class="input-group-append">
                        <button type="submit" class="btn bg-info">Guardar</button>
                    </div>
                </div>
            </form>


            <br>
            <br>





            <?php


            

            foreach ($array_artist as $artist) 
            {
            ?>

                    <div class="card" id="g">
                        <div class="card-body" id="j">
                            <span id="data"><?=$artist->getArtistName();?></span>



                            <button type="button" class="close" data-toggle="tooltip" data-placement="top" title="eliminar" id="btn_delete" data="<?=$artist->getIdArtist();?>">
                            <i class="fa fa-trash"></i>
                        </button>
                            <button type="button" class="close" data-toggle="tooltip" data-placement="top" title="editar" id="btn_edit" data="<?=$artist->getIdArtist();?>" style="padding-right: 15px;">
                            <i class="fa fa-edit"></i>
                        </button>

                        </div>

                    </div>

                    <?php
            }
            ?>


                    <div class="modal" id="modal_edit">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">edici&oacute;n</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>


                                <div class="modal-body">
                                    <form method="POST" action="/utn/tpfinallab4/artist/edit" id="form_edit">
                                        <input type="hidden" name="index" id="index_edit">
                                        <input type="text" name="edit_data" id="input_edit" value="" class="form-control">
                                    </form>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-warning" data-dismiss="modal" id="edit_save">Guardar</button>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="modal" id="modal_delete">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">eliminar</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>


                                <div class="modal-body">
                                    <form method="POST" action="/utn/tpfinallab4/artist/delete" id="form_delete">
                                        <input type="hidden" name="index" id="index_delete">
                                    </form>
                                    <h5>seguro que desea eliminar?</h5>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-warning" data-dismiss="modal" id="delete_save">Eliminar</button>
                                </div>

                            </div>
                        </div>
                    </div>
    </div>