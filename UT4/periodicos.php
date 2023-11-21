<?php
session_start();

$periodicos = [
    "elpais" => "https://elpais.com",
    "elmundo" => "https://elmundo.es",
    "abc" => "https://abc.es",
    "lavanguardia" => "https://lavanguardia.com",
    "elperiodico" => "https://elperiodico.com"
];

foreach ($periodicos as $clave => $url) {
    // Establece un contador para cada periódico en la sesión
    if (!isset($_SESSION[$clave])) {
        $_SESSION[$clave] = 0;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verifica si se ha enviado un formulario
    foreach ($periodicos as $clave => $url) {
        if (isset($_POST[$clave])) {
            // Aumenta el contador correspondiente en la sesión
            $_SESSION[$clave]++;
            header('Location: ' . $url); // Redirige al enlace del periódico
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Periódicos</title>
</head>
<body>
    <form method="post">
        <?php foreach ($periodicos as $clave => $url): ?>
            <?php $nombre = explode("//", $url) ?>
            <button type="submit" name="<?php echo $clave; ?>"><?php echo $nombre[1]; ?></button>
            <span>Accedido: <?php echo $_SESSION[$clave]; ?> veces</span>
            <br>
        <?php endforeach; ?>
    </form>
</body>
</html>


