<?php
// ABM de multiples elementos
// $title que tipo de elementos son
// $array_elements  elementos a listar

$array_indexs = [0,1,2,3];
$array_elements = ["show","musical","teatro","cine"];


$element = "categoria";




?>

    <div class="container" id="abm_container">
        <br>

        <div class="alert alert-success">
            Edici&oacute;n de
            <?=$element;?>
                <button type="button" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
        </div>


        <form method="post" action="<?=$element;?>/new">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">insertar <?=$element;?></span>
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

        for ($x = 0; $x < count($array_elements); $x++)
        {
        ?>

            <div class="card">
                <div class="card-body">
                    <?=$array_elements[$x];?>

                        <button type="button" class="close" data-toggle="tooltip" data-placement="top" title="eliminar" id="btn_delete" data="<?=$array_indexs[$x];?>">
                            <i class="fa fa-trash"></i>
                        </button>
                        <button type="button" class="close" data-toggle="tooltip" data-placement="top" title="editar" id="btn_edit" data="<?=$array_indexs[$x];?>" style="padding-right: 15px;">
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

                                <input type="text" name="edit_text" value="">

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-warning" data-dismiss="modal">Guardar</button>
                            </div>

                        </div>
                    </div>
                </div>