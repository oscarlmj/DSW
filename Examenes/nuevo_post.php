<?php
//Incluye la conexion a la bbdd
include("./connect.php");

//Consulta que devuelve los nombres de las tags ya creadas en la bbdd.
$consulta = $conn->prepare("SELECT Nombre FROM tags");
$consulta->execute();
$etiquetas = $consulta->fetchAll(PDO::FETCH_ASSOC);
$tagsCreadas=[];

foreach($etiquetas as $etiqueta)
{
    $nombre=$etiqueta['Nombre'];
    array_push($tagsCreadas,$nombre);
}

if(isset($_POST['tags']) && isset($_POST['contenido']) && isset($_POST['titulo']) && isset($_POST['categoria']) && isset($_POST['fecha']))
{
    $titulo=$_POST['titulo'];
    $contenido=$_POST['contenido'];
    $fecha=$_POST['fecha'];
    $categoriaID=$_POST['categoriaID'];
    $tagsBlog=explode(",",$_POST['tags']);

    $consulta=$conn->prepare("INSERT INTO entradasblog(Titulo, Contenido, FechaPublicacion, CategoriaID) VALUES ('$titulo','$contenido','$fecha','$categoriaID')");
    $consulta->execute();
    $idblog=$conn->lastInsertId();

    foreach($tagsBlog as $tag)
    {
        $tag=trim($tag);
        if(!in_array($tag,$tagsCreadas))
        {
            $consulta = $conn->prepare("INSERT INTO tags(Nombre) VALUES ('$tag')");
            $consulta->execute();
        }

        $consulta= $conn->prepare("SELECT ID FROM tags WHERE Nombre='$tag'");
        $consulta->execute();
        $idtag = $consulta->fetchAll(PDO::FETCH_ASSOC);
        $id=$idtag[0]['ID'];

        $entrada = $conn->prepare("INSERT INTO entradastags(EntradaID,TagID) VALUES ('$idblog','$id')");
        $entrada->execute();
        header('Location: ./listado_post.php');

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="./CSS/index.css">
</head>
<body>
    <form action="nuevo_post.php" method="POST" enctype="multipart/form-data" name="form" autocomplete="off">
        <fieldset>
            <legend>Blog</legend>
            <label for="titulo">
            Titulo del blog
            <input type="text" name="titulo" id="titulo">
            </label>
            <label for="fecha">
                <!--Crea un input deshabilitado donde se da la fecha de sistema-->
                Fecha de entrada
                <input type="datetime" name="fecha"  value="<?php echo date("Y-m-d");?>" required>
            </label>
            <label for="categoria">
                <?php $consulta = $conn->prepare("SELECT * FROM categorias");
                $consulta->execute();
                $categorias = $consulta->fetchAll(PDO::FETCH_ASSOC);?>
                <!--Muestra el nombre de los productos en el desplegable-->
                <?php foreach ($categorias as $categoria): ?>
                <input type="checkbox" name="categoria"><?php echo $categoria['Nombre']; ?>
                <input type="hidden" name="categoriaID" value="<?php echo $categoria['ID']?>">
                <?php endforeach; ?>
                </label>
                <label for="contenido">
                    Contenido
                    <input type="text" name="contenido" id="contenido">
                </label>
                <label for="tags">
                    Tags del blog
                    <textarea name="tags" id="tags" cols="30" rows="10"></textarea>
                </label>
            <input type="submit" name="submit" value="Insertar">
        </fieldset>
    </form>
</body>
</html>