<?php
include("./connect.php");

try{
    if(isset($_POST['correo']) && isset($_POST['psw']))
    {
        //Almacena el usuario que inicia sesion.
        $usuario=$_POST['correo'];
        session_start();
        $_SESSION['usuario']=$usuario;

        //Consulta para obtener el nombre del usuario
        $sql = $conn->prepare("SELECT nombre FROM usuarios WHERE correo_electronico ='$usuario'");
        $sql->execute();
        $consulta=$sql->fetch(PDO::FETCH_ASSOC);
        $nombre=$consulta['nombre'];

        //Consulta para obtener la contraseña encriptada.
        $sql = $conn->prepare("SELECT contrasena_hash FROM usuarios WHERE correo_electronico ='$usuario'");
        $sql->execute();
        $consulta=$sql->fetch(PDO::FETCH_ASSOC);
        $pass=$consulta['contrasena_hash'];
        
        //Consulta para obtener el color de fondo elegido por el usuario.
        $sql = $conn->prepare("SELECT color_fondo FROM usuarios WHERE correo_electronico ='$usuario'");
        $sql->execute();
        $consulta=$sql->fetch(PDO::FETCH_ASSOC);
        $color=$consulta['color_fondo'];


        //Si la contraseña es correcta accede a la pagina y crea una cookie con el nombre del usuario.
        if(password_verify($_POST['psw'],$pass))
        {
            //Si el color no esta establecido en la bbdd lo pone como gris.
            if($color==null)
            {  
                setcookie("color_fondo","gray",time() + 3600*24);
            }
            //Si esta establecido crea una cookie con el valor del color.
            else
            setcookie("color_fondo", $color, time() + 3600*24);

            setcookie("nombre",$nombre, time() + 1300);
            echo("Contraseña correcta");
            header('Location: ./nav.php');
        }
        else
        {
            if(!isset($_COOKIE['errores_login']))
            {
               setcookie("errores_login",1);
            }
            else
            {
                $errores_login=$_COOKIE['errores_login'];
                $errores_login++;
                setcookie("errores_login",$errores_login);
            }
            header('Location: ./form_login.php');
        }
    }
}catch (Exception $e) {
    echo $e->getMessage();
    die();
}
?>