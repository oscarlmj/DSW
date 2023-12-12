<?php

//Comprobamos si los campos obligatorios del formulario estan rellenado.
if (isset($_POST['nombre']) && isset($_POST['duda'])) {
    //Se almacenan en variables tanto el nombre, como la duda y el directiorio para almacenar lo .txt generados.
    $nombre = trim($_POST['nombre']);
    $duda = trim($_POST['duda']);
    $directorio = "./forms/";

    //Se realizan las comprobaciones de los campos del formulario.
    if (validarNombre($nombre) && validarDuda($duda) && comprobarModulos()) {
        //Se crea una string vacia donde se iran almacenando los datos que se escribiran en el fichero.
        $datos_formulario = "";

        //Se escriben los datos del formulario acompañado del nombre de su campo.
        foreach ($_REQUEST as $campo => $valor) {
            //Para escribir los modulos, comprobamos si el valor es un array.
            if (is_array($valor)) {   //En caso de ser array, unicamente se escribira una vez el nombre del campo.
                $datos_formulario .= "$campo - ";
                foreach ($valor as $modulo) {
                    //Y se añadirá cada uno de los nombre de los modulos seleccionados.
                    $datos_formulario .= "$modulo ";
                }
                $datos_formulario .= "\n";
            }
            //En caso de no ser un array, se escribe el nombre del campo con su valor.
            else
                $datos_formulario .= "$campo - $valor\n";
        }

        //Almacenamos la hora, minutos y segundos en sus correspondientes variables.
        $hora = getdate()['hours'] - 1;
        $minutos = getdate()['minutes'];
        $segundos = getdate()['seconds'];

        //Creamos el nombre del fichero, concatenando al directorio la hora, minutos y segundos.
        $nombreFichero = $directorio . $hora . "_" . $minutos . "_" . $segundos . ".txt";

        //Creamos el fichero añadiendole el contenido.
        file_put_contents($nombreFichero, $datos_formulario);

        //Mostramos al usuario el mensaje de que todo ha ido correctamente.
        echo "Fichero generado correctamente";

        //Enlace para descargar el fichero.
        echo "<a href='' download='$nombreFichero'>Descargar</a>";
    }
}

function validarNombre($nombre)
{
    //Comprobamos si la longitud del nombre esta bien por si acaso el usuario haya modificado el html.
    if (strlen($nombre) <= 40)
        return true;
    else {
        //Muestra el mensaje al usuario.
        echo "Por favor, revisa la longitud del Nombre";
        return false;
    }
}

function validarDuda($duda)
{
    //Comprobamos si la longitud de la duda esta bien por si acaso el usuario haya modificado el html.
    if (strlen($duda) <= 200)
        return true;
    else {
        //Muestra el mensaje al usuario.
        echo "Por favor, revisa la longitud de la duda";
        return false;
    }
}

function comprobarModulos()
{
    //Comprobamos si la longitud de cada uno de los modulos esta bien por si acaso el usuario haya modificado el html, y que tengamos uno seleccionado..
    if (isset($_POST['modulos'])) {
        $modulos = $_POST['modulos'];
        foreach ($modulos as $modulo) {
            if (strlen($modulo) > 3) {
                //Muestra el mensaje al usuario.
                echo "Por favor,revise la longitud de los modulos";
                return false;
            }
        }
        return true;
    } else {
        //Muestra el mensaje al usuario.
        echo "Por favor, seleccione minimo un modulo";
        return false;
    }
}
