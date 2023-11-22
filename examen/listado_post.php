<?php
//Hace uso del archivo connect.php para realizar la conexion.
include("./connect.php");

try {
    $consulta = $conn->prepare("SELECT * FROM entradasblog");
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
            <th>ID</th>
            <th>Titulo</th>
            <th>Contenido</th>
            <th>Fecha</th>
            <th>Categoría</th>
            <th>Tags</th>

        </tr>
        <!-- Recorre cada elemento de la BBDD para mostrar toda la informacion en la tabla -->
        <?php foreach ($resultados as $blog) {
            $categoria=$blog['CategoriaID'];
            $id=$blog['ID'];

            echo"<tr>";
                echo"<td>{$blog['ID']}</td>";
                echo"<td>{$blog['Titulo']}</td>";
                echo"<td>{$blog['Contenido']}</td>";
                echo"<td>{$blog['FechaPublicacion']}</td>";

                $consulta = $conn->prepare("SELECT Nombre FROM Categorias WHERE ID='$categoria'");
                $consulta->execute();
                $categoria = $consulta->fetchAll(PDO::FETCH_ASSOC);
                
                echo"<td>{$categoria[$blog['CategoriaID']-1]['Nombre']}</td>";

                $consulta = $conn->prepare("SELECT TagID FROM entradastags WHERE EntradaID='$id'");
                $consulta->execute();
                $tags = $consulta->fetchAll(PDO::FETCH_ASSOC);

                

                foreach($tags as $tag)
                {
                    $id=$tag['TagID'];
                    $consulta = $conn->prepare("SELECT Nombre FROM tags WHERE ID='$id'");
                    $consulta->execute();
                    $nombretag = $consulta->fetchAll(PDO::FETCH_ASSOC);

                    foreach($nombretag as $nombre)
                    {
                        echo "<td><a href='./listado_post_tag.php?id=$id'>{$nombre['Nombre']}</a></td>";
                    }
                }
            echo"</tr>";
        }?>
    </table>
    </div>
</body>
</html>