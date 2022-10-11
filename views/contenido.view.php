<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login PHP y MySQL</title>

    <link rel="stylesheet" href="css/estilos.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body style="background: #e9e9e9;">
    
    <div class="container contenido_view">
        <div class="row d-flex align-items-center h-100">
            <div class="col-12 contenedor">
                <div class="row mb-4">
                    <div class="col-8">
                        <h1>Contenido del Sitio</h1>
                    </div>
                    <div class="col-4">
                        <a href="cerrar.php">Cerrar Sesión</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <article>
                            <p>
                                <b>Tabla de Usuarios Registrados:</b> Se muestra la tabla de usuarios con el <b> único fin de mostrar la inserción de datos a la Base de datos</b>. Queda claro que no se deben mostrar los datos a cualquier usuario por seguridad de estos, sólo se muestran con el fin de ver su correcto funcionamiento.
                            </p>
                        </article>
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Usuario</th>
                                    <th scope="col">Contraseña</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    try {
                                        $conexion = new PDO('mysql:host=162.241.61.205; dbname=yalogics_portafolio', 'yalogics_usuario', '5879396658747323');
                                    } catch (PDOException $e) {
                                        Echo 'Ocurrió un error' .$e->getMessage();
                                    }

                                    $datos = $conexion -> query("SELECT Usuario, RIGHT(Contraseña,5) as Contraseña FROM login_usuarios");
                                ?>
                                <?php foreach($datos as $dato):?>
                                    <tr>
                                        <td><?php echo $dato['Usuario']; ?></td>
                                        <td><?php echo $dato['Contraseña']; ?></td>
                                    </tr>
                                    
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>