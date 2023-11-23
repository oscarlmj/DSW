<?php
session_start();
$periodicos = [
    "elpais" => "https://elpais.com",
    "elmundo" => "https://elmundo.es",
    "abc" => "https://abc.es",
    "lavanguardia" => "https://lavanguardia.com",
    "elperiodico" => "https://elperiodico.com"
];

foreach ($periodicos as $periodico) {
    // El valor de la cookie puede ser, por ejemplo, la fecha actual
    $valorCookie =0;
    $nombre=explode("//",$periodico);
    $nombreCookie = str_replace('_', '.', $nombre);

    // Establecemos la cookie con un tiempo de expiración de una hora (3600 segundos)
    setcookie($nombreCookie, $valorCookie, time() + 3600, '/');
}

print_r($_COOKIE);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Periodicos</title>
</head>
<body>
    <?php foreach ($periodicos as $periodico): ?>
        <?php $nombre= explode("//",$periodico)?>
        <a href="<?php echo $periodico; ?>"><?php echo $nombre[1];?></a>
        <span>Accedido: <?php $_COOKIE[$nombre[1]]?></span>
        <br>
    <?php endforeach; ?>
</body>
</html>

