<?php
// Inicia la sesión para manejar cookies
session_start();
$periodicos = [
    "elpais" => "https://elpais.com",
    "elmundo" => "https://elmundo.es",
    "abc" => "https://abc.es",
    "lavanguardia" => "https://lavanguardia.com",
    "elperiodico" => "https://elperiodico.com"
];

<<<<<<< HEAD:UT4/periodicos.php
foreach ($periodicos as $periodico) {
    // El valor de la cookie puede ser, por ejemplo, la fecha actual
    $valorCookie =0;
    $nombre=explode("//",$periodico);
    $nombreCookie = str_replace('_', '.', $nombre);

    // Establecemos la cookie con un tiempo de expiración de una hora (3600 segundos)
    setcookie($nombreCookie, $valorCookie, time() + 3600, '/');
}

print_r($_COOKIE);
=======
foreach ($periodicos as $clave => $url) {
    // Establece un contador para cada periódico en las cookies
    if (!isset($_COOKIE[$clave])) {
        setcookie($clave, 0, time() + 10); // Expira en 10 segundos
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verifica si se ha enviado un formulario
    foreach ($periodicos as $clave => $url) {
        if (isset($_POST[$clave])) {
            // Aumenta el contador correspondiente en las cookies
            $contador = $_COOKIE[$clave] + 1;
            setcookie($clave, $contador, time() + 10); // Actualiza la cookie con el nuevo valor y extiende la expiración a 10 segundos
            header('Location: ' . $url); // Redirige al enlace del periódico
            exit();
        }
    }
}
>>>>>>> 1b31d3e8796b91ebfb3924ac7d3bcab3727c0c00:UT4/cookies_periodicos.php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Periodicos</title>
</head>
<body>
<<<<<<< HEAD:UT4/periodicos.php
    <?php foreach ($periodicos as $periodico): ?>
        <?php $nombre= explode("//",$periodico)?>
        <a href="<?php echo $periodico; ?>"><?php echo $nombre[1];?></a>
        <span>Accedido: <?php $_COOKIE[$nombre[1]]?></span>
        <br>
    <?php endforeach; ?>
</body>
</html>

=======
    <h2>Enlaces a Periodicos</h3>
    <form method="post">
        <?php foreach ($periodicos as $clave => $url): ?>
            <?php $nombre = explode("//", $url) ?>
            <button type="submit" name="<?php echo $clave; ?>"><?php echo $nombre[1]; ?></button>
            <span>Accedido: <?php echo isset($_COOKIE[$clave]) ? $_COOKIE[$clave] : 0; ?> veces</span>
            <br>
        <?php endforeach; ?>
    </form>
</body>
</html>
>>>>>>> 1b31d3e8796b91ebfb3924ac7d3bcab3727c0c00:UT4/cookies_periodicos.php
