<?php

//Creamos el array con los datos.
$array_datos = array(
    "encabezado" => array("Nombre", "Apellidos", "IMW", "LND"),
    "datos" => [
        array("Sergio", "Quintana Vega", "5", "8"),
        array("Raúl", "Domínguez Pérez", "rojo_3", "rojo_1"),
        array("b_Kilian", "Rodríguez Concepción", "6", "10")
    ]
);

//Funcion principal que se encarga de generar la tabla.
function genera_tabla_html($array_datos)
{
    //Creamos la variable donde iremos añadiendo los campos de la tabla.
    $tabla = "<table style='border: 1px solid black'></tr>";

    //Por cada encabezado generamos un th y lo añadimos a la tabla.
    foreach ($array_datos['encabezado'] as $titulo) {
        $tabla .= "<th style='border: 1px solid black'>" . $titulo . "</th>";
    }
    $tabla .= "</tr><tr>";

    //Por cada dato generamos un td y los añadimos a la tabla.
    foreach ($array_datos['datos'] as $alumno) {
        $tabla .= "<tr>";

        foreach ($alumno as $datos) {
            //Comprobamos si el dato que vamos a añadir empieza por rojo_ para poner el texto de ese color.
            if (str_starts_with($datos, "rojo_")) {
                $propiedad = explode("rojo_", $datos);
                $tabla .= "<td style='border: 1px solid black;color: red'>" . $propiedad[1] . "</td>";
            }
            //Comprobamos si el dato que vamos a añadir a la tabla comienza por b_ para ponerlo en negrita.
            else if (str_starts_with($datos, "b_")) {
                $propiedad = explode("b_", $datos);
                $tabla .= "<td style='border: 1px solid black;font-weight: bold'>" . $propiedad[1] . "</td>";
            }
            //Añadimos de forma normal el resto de datos.
            else
                $tabla .= "<td style='border: 1px solid black'>" . $datos . "</td>";
        }
        $tabla .= "</tr>";
    }
    $tabla .= "</tr></table>";

    //Devolvemos en una unica string el codigo necesario para generar la tabla html.
    echo $tabla;
}

//Llamamos a la funcion.
genera_tabla_html($array_datos);
