<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro | PHP y MySQL</title>

    <link rel="stylesheet" href="css/estilos.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body style="background: #44A08D;">
    
    <div class="container registro_vista">
        <div class="row re justify-content-center align-items-md-center">
            <div class="col-12 col-md-5 p-0 bg-light h-75 d-none d-md-block">
                <img src="img/fondo.jpg" alt="">
            </div>
            <div class="col-12 p-0 bg-light d-block d-md-none">
                <img src="img/fondo mobile.jpg" alt="">
            </div>
            <div class="col-12 col-md-5 formulario h-75">
                <p>Bienvenido</p>
                <h3>Regístrate</h3>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" name="login">
                    <label for="usuario">Usuario</label>
                    <input type="text" id="usuario" class="form-control" name="usuario">
                    
                    <label for="contraseña">Contraseña</label>
                    <input type="password" id="contraseña" class="form-control" name="password">

                    <label for="contraseña2">Confirmar contraseña</label>
                    <input type="password" id="contraseña2" class="form-control" name="password2">

                    <input type="submit" value="Registrarse">

                    <?php if(!empty($errores)):?>
                        <div class="error">
                            <ul>
                                <?php echo $errores; ?>
                            </ul>
                        </div>
                    <?php endif;?>
                </form>
                <p class="text-center">
                    ¿Ya tienes cuenta? <a href="login.php">Inicia Sesión</a>
                </p>
            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>