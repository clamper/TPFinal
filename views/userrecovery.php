<div class="container  align-middle">

    <br>
    <br>
    <br>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Recuperacion de su clave</h4>
            <div class="card-text text-center">

                <form method="post" action="/utn/TPFINALLAB4/user/viewRecoveryForm">

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">ingrese su correo</span>
                        </div>
                        <input class="form-control" type="email" name="mail" required>
                    </div>

                    <?php
                    
                    if ( $msg != "")
                    {
                        echo "<br><div class='alert alert-succes'>".$msg."</div>";
                    }   

                    ?>

                    <br><br>
                    <button type="submit" class="btn btn-info">Enviar clave</button>
                </form>

            </div>
        </div>
    </div>


</div>