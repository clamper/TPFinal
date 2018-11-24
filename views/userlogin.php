<div class="container  align-middle">

    <br>
    <br>
    <br>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Log In</h4>
            <div class="card-text text-center">

                <form method="post" action="/utn/TPFINALLAB4/user/login">

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
                        <input class="form-control" type="password" name="pass" required>
                    </div>
                    
                    <?php
                    
                    if (isset($errormsg))
                        if ( $errormsg != "")
                        {
                            echo "<br><div class='alert alert-danger'>".$errormsg."</div>";
                            echo "<a href='/utn/TPFINALLAB4/user/viewRecoveryForm'><button type='button' class='btn btn-info'>recuperar contraseña</button></a>";
                        }   

                    ?>
                    <br><br>
                    <button type="submit" class="btn btn-info">Entrar</button>
                </form>

            </div>
        </div>
    </div>


</div>