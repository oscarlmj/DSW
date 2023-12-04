<?php

$periodicos = [
    "elpais" => "https://elpais.com",
    "elmundo" => "https://elmundo.es",
    "abc" => "https://abc.es",
    "lavanguardia" => "https://lavanguardia.com",
    "elperiodico" => "https://elperiodico.com"
];

foreach ($periodicos as $periodico => $url) {
    // Establece un contador para cada periódico en las cookies
    if (!isset($_COOKIE[$periodico])) {
        setcookie($periodico, 0, time() + 180);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verifica si se ha enviado un formulario
    foreach ($periodicos as $periodico => $url) {
        if (isset($_POST[$periodico])) {
                        // Aumenta el contador correspondiente en las cookies
            $contador = $_COOKIE[$periodico] + 1;
            setcookie($periodico, $contador, time() + 180); // Actualiza la cookie con el nuevo valor y extiende la expiración a 10 segundos
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
    <form method="POST">
        <?php foreach ($periodicos as $periodico => $url) : ?>
            <?php $nombre = explode("//", $url) ?>
            <button type="submit" name="<?php echo $periodico; ?>"><?php echo $nombre[1]; ?></button>
            <span>Veces visitadas: <?php echo isset($_COOKIE[$periodico]) ? $_COOKIE[$periodico] : 0; ?> veces</span>
            <br>

        <?php endforeach; ?>
    </form>
</body>

</html>