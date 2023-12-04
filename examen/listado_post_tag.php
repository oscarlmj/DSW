<?php
//Hace uso del archivo connect.php para realizar la conexion.
include("./connect.php");
$id=$_GET['id'];

try {
    $consulta = $conn->prepare("SELECT EntradaID FROM entradastags WHERE TagID='$id'");
    $consulta->execute();
    $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error al recuperar los datos: " . $e->getMessage();
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado blogs</title>
    <link rel="stylesheet" href="./CSS/index.css">
</head>
<body>

    <div id="contenido">
        <!--Crea una tabla para mostrar los datos-->
    <table>
        <tr>
            <th>Post relacionados</th>
        </tr>
        <!-- Recorre cada elemento de la BBDD para mostrar toda la informacion en la tabla -->
        <?php foreach ($resultados as $blog) {





            echo"<tr>";
            $consulta = $conn->prepare("SELECT EntradaID FROM entradastags WHERE TagID='$id'");
            $consulta->execute();
            $blogs = $consulta->fetchAll(PDO::FETCH_ASSOC);
            foreach($blogs as $blog)
            {
                $id=$blog['EntradaID'];
                $consulta = $conn->prepare("SELECT Titulo FROM entradasblog WHERE ID='$id'");
                $consulta->execute();
                $titulo = $consulta->fetchAll(PDO::FETCH_ASSOC);
                
                echo "<td>{$titulo[0]['Titulo']}</td>";

            }
            echo"</tr>";
        }?>
    </table>
    </div>
</body>
</html>