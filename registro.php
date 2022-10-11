<?php session_start();

if (isset($_SESSION['usuario'])) {
    header('Location: index.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // El contenido lo devolderá en minúsculas
    $usuario =  filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
    $password =  $_POST['password'];
    $password2 =  $_POST['password2'];

    $errores = '';

    if (empty($usuario) or empty($password) or empty($password2)) {
        $errores = $errores .'<li>Por favor rellena todos los datos correctamente</li>';
    }else {
        try {
            $conexion = new PDO('mysql:host=162.241.61.205; dbname=yalogics_portafolio', 'yalogics_usuario', '5879396658747323');
        } catch (PDOExcepton $e) {
            echo 'Error' .$e->getMessage();
        }
        
        // Comprobamos que no exista el usuario
        $statement = $conexion -> prepare('SELECT *FROM login_usuarios WHERE Usuario = :usuario LIMIT 1');
        $statement -> execute(array(':usuario' => $usuario));
        $resultado = $statement -> fetch();

        if ($resultado != false) {
            $errores .= '<li> El nombre de usuario ya existe </li>';
        }

        // hash de la contraseña, no es realmente encriptar pero es parecido.
        $password = hash('sha512', $password);
        $password2 = hash('sha512', $password2);  

        if ($password != $password2) {
            $errores .= '<li> Las contraseñas no coinciden </li>';
        }
    }

    if ($errores == '') {
        $statement = $conexion -> prepare('INSERT INTO login_usuarios (ID, Usuario, Contraseña) VALUES (null, :usuario, :pass)');
        $statement -> execute(array(':usuario' => $usuario, ':pass' => $password));

        header('Location: login.php');
    }

}

require('views/registrate.view.php');

?>