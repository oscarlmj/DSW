<?php

session_start();

// Array que contiene la cesta de la compra del usuario
$array_cesta = array(
    "Portátil Lenovo IdeaPad 3" => 5,
    "Ratón Loitech MX Anywhere" => 2,
    "Procesador AMD Ryzen 7" => 1,
    "Monitor Samsung" => 1
);

if (!empty($_SESSION['usuario'])) {
    //Cargamos en la sesión el array_cesta;
    $_SESSION['productos'] = $array_cesta;
} else
    header('Location: login_form.php');

//Inlcuye el muestra_cesta.php para mostrar la tabla en lugar de una pagina en blanco.
echo "<a href='muestra_cesta.php'><button>Ver cesta de {$_SESSION['usuario']}</button></a>";
//echo "<pre>";
//print_r($array_cesta);
//echo "</pre>";
