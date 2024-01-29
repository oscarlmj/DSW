<?php

/*
--------OPERACIONES STRINGS--------
*/

//Funcion que realiza la concatenación de dos strings pasados por el usuario.
function concatenar()
{
    echo "Introduzca la primera frase:\n";
    $s1=readline();
    echo "Introduzca la segunda frase:\n";
    $s2=readline();

    echo $s1." ".$s2;
    echo "\n";
}

//Funcion que realiza la busqueda de una substring dentro de una string general, pasadas por el usuario, indicando si se encuentra o no.
function buscar()
{
    echo "Introduzca la frase:\n\n";
    $s1=readline();
    echo "Introduzca la frase que quiere buscar:\n\n";
    $s2=readline();

    if(strpos($s1,$s2)!=FALSE)
    {
        echo "La frase ".$s2." se encuentra dentro de '".$s1."'";
        echo "\n";
    }
    else
    {
        echo "La frase ".$s2." no se encuentra dentro de '".$s1."'"; 
        echo "\n";
    }
}

//Funcion que solicita una string general, un término o una parte de la string que quiera reemplazar, y el término por el que lo quiere reemplazar.
function reemplazar()
{
    echo "introduce la frase general:\n\n";
    $str=readline();

    echo "Introduce el término que quieres reemplazar:\n\n";
    $s=readline();

    while(strpos($s,$str)!=false)
    {
        echo "El término ".$s." no se encuentra dentro la frase ".$str;
        echo "\n Por favor introduce un término válido:\n";
        $s=readline();
    }

    echo "Introduce el término por el que lo quieres reemplazar\n\n";
    $s2=readline();
    echo str_replace($s,$s2,$str);
    echo "\n";
}
?>