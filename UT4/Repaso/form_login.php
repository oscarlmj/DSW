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
<body background="<?php echo("{$_COOKIE['color_fondo']}")?>">
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
                <input type="submit" id="env">
            </fieldset>
        </form>
    </div>
</body>
</html>