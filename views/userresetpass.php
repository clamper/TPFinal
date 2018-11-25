<div class="container  align-middle">

    <br>
    <br>
    <br>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Reseteo de su contraseña</h4>
            <div class="card-text text-center">

                <form method="post" id="ResetPassForm" action="/utn/TPFINALLAB4/user/resetPass">

                    <input type="hidden" name="mail" value="<?=$mail?>">
                    <input type="hidden" name="cod" value="<?=$cod?>">

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">nueva contraseña</span>
                        </div>
                        <input class="form-control" type="password" name="pass" id="pass" required>
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">reitere nueva contraseña</span>
                        </div>
                        <input class="form-control" type="password" name="pass2" id="pass2" required>
                    </div>
                    <br><br>
                    <button type="submit" class="btn btn-info">resetear</button>
                </form>

            </div>
        </div>
    </div>
</div>