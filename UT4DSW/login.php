<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario_form = $_POST["usuario"];
    $contrasena_form = $_POST["contrasena"];

    try {
        $dsn = "mysql:host=localhost;dbname=ut4";
        $usuario = "dsw";
        $contrasena = "Elrincon1234.";

        $conexion = new PDO($dsn, $usuario, $contrasena);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT contrasena_hash FROM usuarios WHERE usuario = '$usuario_form'";
        $resultado = $conexion->query($consulta);
        $fila = $resultado->fetch(PDO::FETCH_ASSOC);

        $contrasena_hash_db = $fila['contrasena_hash'];
    } catch (PDOException $e) {
        echo "Error al conectar con la base de datos: " . $e->getMessage();
    } finally {
        $conexion = null;
    }

    if (password_verify($contrasena_form, $contrasena_hash_db)) {
        echo "Inicio de sesión correcto. Bienvenido, $usuario_form!";

        $_SESSION['usuario'] = $usuario_form;

        header("Location: index.php");
        exit();
    } else {
        //Si la cookie no existe, la creamos iniciada a 1.
        if (!isset($_COOKIE['errores_login_' . $usuario_form])) {
            $num_errores = 1;
            setcookie("errores_login_" . $usuario_form, $num_errores, time() + 1800);
        } else {
            //Si la cookie existe aumentamos su valor.
            $num_errores = $_COOKIE['errores_login_' . $usuario_form];
            $num_errores++;
            setcookie("errores_login_" . $usuario_form, $num_errores, time() + 1800);
        }
        echo "Contraseña incorrecta. Por favor, inténtalo de nuevo. Te has equivocado $num_errores veces";
    }
}
