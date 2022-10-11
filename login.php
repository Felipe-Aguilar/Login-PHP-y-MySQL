<?php session_start();

    if (isset($_SESSION['usuario'])) {
        header('Location: index.php');
    }

    $errores = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
        $password = $_POST['password'];
        $password = hash('sha512', $password);

        try {
            $conexion = new PDO('mysql:host=162.241.61.205; dbname=yalogics_portafolio', 'yalogics_usuario', '5879396658747323');
        } catch (PDOException $e) {
            echo 'Error' .$e->getMessage();
        }

        $statement = $conexion -> prepare('SELECT *FROM login_usuarios WHERE Usuario = :usuario AND Contraseña = :pass');
        $statement -> execute(array(':usuario' => $usuario, ':pass' => $password));

        $resultado = $statement -> fetch();

        var_dump($resultado);

        if ($resultado != false) {
            $_SESSION['usuario'] = $usuario;
            header('Location: index.php');
        }else {
            $errores .= '<li>Usuario o contraseña son incorrectos</li>';
        }
    }

    require('views/login.view.php');
?>