<?php

/*

main title
subTitle


*/

?>
    <div class="container">
        <div class="alert alert-success">
            Datos del nuevo evento
        </div>

        <form action="events/saveNew">
            <div class="form-group">

                <div class="card">
                    <div class="card-body">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Titulo</span>
                            </div>
                            <input type="text" class="form-control" name="mainTitle" placeholder="titulo completo del evento" required>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">titulo de tarjeta</span>
                            </div>
                            <input type="text" class="form-control" name="subTitle" placeholder="titulo que aparecera sobre las tarjetas" maxlength="14" required>
                        </div>

                    </div>
                </div>


                <!-- categorias -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">categorias</h5>

                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="cat1" name="example1">
                            <label class="custom-control-label" for="cat1">categoria 1</label>
                        </div>

                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="cat2" name="example1">
                            <label class="custom-control-label" for="cat2">categoria 2</label>
                        </div>

                    </div>
                </div>


                <!-- dias -->

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">duracion del evento</h5>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="customRadio" name="days" value="only" checked>
                            <label class="custom-control-label" for="customRadio">un solo dia</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="customRadio2" name="days" value="more">
                            <label class="custom-control-label" for="customRadio2">varios dias</label>
                        </div>

                        <br>
                        <br>
                        <div id="only_day">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">un solo dia</span>
                                </div>
                                <input type="date" class="form-control" name="mainTitle" placeholder="titulo completo del evento" required>
                            </div>
                        </div>




        </form>
        </div>