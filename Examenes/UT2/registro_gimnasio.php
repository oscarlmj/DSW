<?php
print_r($_POST);

//Valida la longitud del DNI y del nombre.
function validarDniNombre()
{
    if(!empty($_POST['dni']) && !empty($_POST['nombre']))
    {
        $nombre=$_POST['nombre'];
        $dni=$_POST['dni'];

        if(strlen($dni)<=9 && strlen($nombre)<=25)
        return true;
        else
        return false;
    }
}

//Valida que el formato de la imagen sea jpg.
function validarImagen()
{
    $dni=$_POST['dnifichero'];
    $ext=explode(".",$dni);

    if($ext[1]=="jpg")
    return true;
    else
    return false;
}

//Valida que el formato del documento sea pdf
function validarCertificado()
{
    $certificado=$_POST['certificado'];
    $ext=explode(".",$certificado);

    if($ext[1]=="pdf")
    return true;
    else
    return false;
}


if(validarCertificado() && validarImagen() && validarDniNombre())
echo("Validaciones correctas");
else
echo("Validaciones incorrectas");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Registro</title>
<link rel="stylesheet" type="text/css" href="https://www3.gobiernodecanarias.org/educacion/cau_ce/cookies/cookieconsent.min.css"/><script  type="text/javascript" src="https://www3.gobiernodecanarias.org/educacion/cau_ce/cookies/cookieconsent.min.js"></script><script type="text/javascript" src="https://www3.gobiernodecanarias.org/educacion/cau_ce/cookies/cauce_cookie.js"></script><script type="text/javascript" src="https://www3.gobiernodecanarias.org/educacion/cau_ce/estadisticasweb/scripts/piwik-base.js"></script><script type="text/javascript" src="https://www3.gobiernodecanarias.org/educacion/cau_ce/estadisticasweb/scripts/piwik-eforma.js"></script></head>
<body>
    <form action="./registro_gimnasio.php" method="POST">
        <label for="dni">DNI:</label>
        <input type="text" id="dni" name="dni"><br><br>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre"><br><br>

        <label for="franjaHoraria">Franjas horarias de entrenamiento:</label><br>
        <input type="checkbox" id="franja1" value="7-14" name="franja">
        <label for="franja1">De 7:00 a 14:00</label><br>
        <input type="checkbox" id="franja2" value="14:01-19" name="franja">
        <label for="franja2">De 14:01 a 19:00</label><br>
        <input type="checkbox" id="franja3" value="19:01-23" name="franja">
        <label for="franja3">De 19:01 a 23:00</label><br><br>

        <label for="dniFichero">DNI (Fichero):</label>
        <input type="file" id="dniFichero" name="dnifichero"><br><br>

        <label for="certificadoMedico">Certificado médico:</label>
        <input type="file" id="certificadoMedico" name="certificado"><br><br>

        <label for="observaciones">Observaciones:</label><br>
        <textarea id="observaciones" rows="4" cols="50"></textarea><br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>