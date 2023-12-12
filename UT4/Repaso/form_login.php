<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="./CSS/index.css">
</head>
<body bgcolor=<?php echo $_COOKIE['color_fondo']?>>
    <div id="opciones">
        <form action="form.php" method="post">
            <fieldset>
                <legend>Inicio de sesion</legend>
                <label for="correo">
                    Email
                    <input type="email" name="correo">
                </label>
                <label for="psw">
                    Contraseña
                    <input type="password" name="psw">
                </label>
                <br>
                <?php if(!empty($_COOKIE['errores_login']))
                    {
                        echo("<span>Intentos fallidos: {$_COOKIE['errores_login']} A los 5 se bloquea el login</span>");
                    }?>
                <input type="submit" id="env" <?php
                if ($_COOKIE['errores_login'] == 5) {
                    $tiempo_actual = time();
                    $tiempo_limite = $_COOKIE['tiempo_limite'] ?? 0; // Obtiene el tiempo límite de la cookie o establece 0 si no existe

                    // Verifica si ha pasado 1 minuto desde el último bloqueo
                    if ($tiempo_actual - $tiempo_limite >= 60) {
                        // Tu lógica aquí

                        // Después de realizar la acción, actualiza la marca de tiempo en la cookie
                        setcookie('tiempo_limite', $tiempo_actual, $tiempo_actual + 60); // La cookie expirará en 1 minuto
                    } else {
                        echo "disabled"; // Acción deshabilitada porque no ha pasado el tiempo requerido
                    }
                }
                ?>>
            </fieldset>
        </form>
    </div>
</body>
</html>