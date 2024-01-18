<?php

function conectar()
{
    $servername="localhost";
    $username="examenut3";
    $pass="ACi@1Y2Wd2rH8FJk";
    $db="examenut3";

    try{
        $conn = new PDO("mysql:host=$servername;dbname=$db" ,$username,$pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        echo "Conexion realizada con éxito";
    }catch(PDOException $e)
    {
        echo "Conexion fallida<br>".$e->getMessage();
    }
}

function nueva_categoria($cat)
{
    $servername="localhost";
    $username="examenut3";
    $pass="ACi@1Y2Wd2rH8FJk";
    $db="examenut3";

    try{
        $conn = new PDO("mysql:host=$servername;dbname=$db" ,$username,$pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        echo "Conexion realizada con éxito";

        $consuta = $conn->prepare("INSERT INTO categorias(nombre) VALUES ('$cat')");
        $consuta->execute();
        $identrada=$conn->lastInsertId();
    }catch(PDOException $e)
    {
        echo "Conexion fallida<br>".$e->getMessage();
    }
}

function nuevos_tags($tag1,$tag2)
{
    $servername="localhost";
    $username="examenut3";
    $pass="ACi@1Y2Wd2rH8FJk";
    $db="examenut3";

    $tags;
    try{
        $conn = new PDO("mysql:host=$servername;dbname=$db" ,$username,$pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        echo "Conexion realizada con éxito";

        $consuta = $conn->prepare("INSERT INTO tags(nombre) VALUES ('$tag1')");
        $consuta->execute();
        $idtag=$conn->lastInsertId();
    }catch(PDOException $e)
    {
        echo "Conexion fallida<br>".$e->getMessage();
    }
}

function modificar_entrada($idcat,$idtags)
{
    $servername="localhost";
    $username="examenut3";
    $pass="ACi@1Y2Wd2rH8FJk";
    $db="examenut3";

    try{
        $conn = new PDO("mysql:host=$servername;dbname=$db" ,$username,$pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        echo "Conexion realizada con éxito";

        $categoria =$conn ->prepare("UPDATE `entradasblog` SET `categoriaid` = '$idcat' WHERE `entradasblog`.`id` = 1");
        $categoria->execute();

        $borrar= $conn->prepare("DELETE * FROM `entradastags` WHERE `entradaid`!='$idcat'");
        $borrar->execute();
    }catch(PDOException $e)
    {
        echo "Conexion fallida<br>".$e->getMessage();
    }
}

nueva_categoria("catExamen");
nuevos_tags("etiqueta1","etiqueta2");
modificar_entrada($idtag);
?>