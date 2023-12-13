<?php
    $servername="localhost";
    $username="mitiendaonline";
    $pass="Nc5OaSDMwOa*Dh)U";
    $db="repaso";

    try{
        $pdo = new PDO("mysql:host=$servername;dbname=$db" ,$username,$pass);

        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        echo "Conexion realizada con éxito";
    }catch(PDOException $e)
    {
        echo "Conexion fallida<br>".$e->getMessage();
    }


    function nueva_categoria($pdo){
        $nombre = rand(1,100);

        $consulta= "INSERT INTO categorias(nombre) value ('$nombre')";

        $pdo->exec($consulta);

        $nuevoId= $pdo->lastInsertId();

        return $nuevoId;
    }


    function nuevos_Tags($pdo){
        $tag1= rand(1,50);

        $consulta= "INSERT INTO tags(nombre) value ('$tag1')";
        $pdo->exec($consulta);
        $idTag1= $pdo ->lastInsertId();

        $tag2= rand(51,90);

        $consulta= "INSERT INTO tags(nombre) value ('$tag2')";
        $pdo->exec($consulta);
        $idTag2= $pdo ->lastInsertId();

        return [$idTag1, $idTag2];
    }

    function modifica_entrada($pdo, $categoria,$tag1,$tag2){


        //Actualizar la categoria.prepare
        try{
            $consulta="UPDATE entradasblog SET categoriaid=$categoria WHERE id=1;";
            $stmt=$pdo->prepare($consulta);
            $stmt->execute();
        }catch(PDOException $e)
        {
            echo $e->getMessage();
        }

        //Eliminamos de entradastags todo lo relacionado con la entrada.
        try{
            $consulta="DELETE FROM entradastags WHERE entradaid=1";
            $stmt=$pdo->prepare($consulta);
            $stmt->execute();
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }

        //Añadimos las nuevas tags relacionandolas con la entrada del blog.
        try{
            $consulta="INSERT INTO entradastags(entradaid,tagid) VALUES (1, :IdTag1),(1, :idTag2)";
            $stmt = $pdo->prepare($consulta);
            $stmt->bindParam(':IdTag1', $tag1);
            $stmt->bindParam(':idTag2', $tag2);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        //Modificamos el titulo de la entrada del blog.
        try{
            $consulta="UPDATE entradasblog SET titulo='entrada_modificada' WHERE id=1";
            $stmt = $pdo->prepare($consulta);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    $nuevoIdCategoria=nueva_categoria($pdo);
    echo "Nueva categoria añadida:".$nuevoIdCategoria;

    list($nuevoTag1,$nuevotag2) = nuevos_Tags($pdo);
    echo "Los nuevos tag son: ". $nuevoTag1." y ".$nuevotag2;

    modifica_entrada($pdo,$nuevoIdCategoria,$nuevoTag1,$nuevotag2);
?>