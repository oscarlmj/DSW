<?php
session_start();
//Si la sesió está iniciada muestra la tabla.
if (!empty($_SESSION['usuario'])) {
    // Mostramos la cesta de la compra del usuario
    //Creamos un array a partir de $_SESSION['productos'], donde previamente almacenamos el array_cesta.
    $producto = array_keys($_SESSION['productos']);
    //Mostramos el mensaje "Cesta de " acompañado del nombre del user.
    echo "<h3>Cesta de {$_SESSION['usuario']}</h3>";
    //Creamos el encabezado de la tabla.
    echo "<table>
    <tr>
        <th>Producto</th>
        <th>Cantidad</th>
    </tr>";

    //Por cada producto que tengamos en la cesta se crea una fila en la tabla con su nombre y cantidad.
    for ($i = 0; $i < sizeof($producto); $i++) {
        echo "<tr>    
            <td>{$producto[$i]}</td>
            <td>{$_SESSION['productos'][$producto[$i]]}</td>
        </tr>";
    }

    //Cerramos la tabla.
    echo "</table>";
    //Boton para cerrar la sesion.
    echo "<a href='logout.php'><button>Cerrar</button></a>";
} else
    //Si no está iniciada la sesión redirige al login.
    header('Location: login_form.php');
