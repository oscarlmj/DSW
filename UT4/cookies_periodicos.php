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
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Periódicos</title>
</head>
<body>
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