<div class="container  align-middle">

    <br>
    <br>
    <br>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Registro por mail</h4>
            <div class="card-text text-center">

                <form method="post" id="registerForm" action="/utn/TPFINALLAB4/user/register">

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">nombre</span>
                        </div>
                        <input class="form-control" type="text" name="name" minlength="3" required>
                    </div>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">correo</span>
                        </div>
                        <input class="form-control" type="email" name="mail" required>
                    </div>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">contraseña</span>
                        </div>
                        <input class="form-control" type="password" name="pass" id="pass" required>
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">contraseña</span>
                        </div>
                        <input class="form-control" type="password" name="pass2" id="pass2" required>
                    </div>
                    <br><br>
                    <button type="submit" class="btn btn-info">registrarse</button>
                </form>

            </div>
        </div>
    </div>
</div>