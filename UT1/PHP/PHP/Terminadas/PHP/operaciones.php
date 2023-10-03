<?php

$res=0;
$operacion="operación";
include 'strings.php';




/*
--------OPERACIONES ARITMETICAS--------
*/


//Funcion que solicita la cantidad de datos que desea sumar el usuario y muestra el resultado.
//Hace uso de la variable por referencia cambiar el valor de $operacion de "operación" a "suma".

function sum(&$operacion)
{
    $operacion="suma";
    global $res;
    echo "Introduzca la cantidad de datos a sumar \n";
    $n=readline();
    while($n>0)
    {
        $res+=readline();
        $n--;
    }
    
    echo "El resultado de la ".$operacion." es ".$res;
    echo "\n\n";
}

//Funcion que realiza la resta de dos números.

function rest()
{

    $res=0;
    
    echo "Introduzca el primer número:\n\n";
    $n=readline();
    echo "Introduzca el segundo número:\n\n";
    $n2=readline();

    $res=$n-$n2;
    echo "El resultado de la resta es: ".$res;
    echo "\n\n";
}

//Funcion que realiza la multiplicación de dos números haciendo uso de un bucle.

function mult()
{

    $res=0;

    echo "Introduzca el primer número:";
    $n1=readline();

    echo "Introduzca el segundo número:";
    $n2=readline();

    for($i=$n1;$i>0;$i--)
    {
        $res+=$n2;
    }

    echo "El resultado de la multiplicacion es ".$res."\n";
    echo "\n\n";
}

//Funcion que pregunta si quiere reazliar otra operacion, en caso de responder algo contrario a 'S' o 's', finaliza el programa, en caso de que si, muestra de nuevo el menu.
function ask()
{
    echo "¿Quiere realizar otra operación? S/N";
    $b=readline();
    if($b=="S" || $b=="s")
    return true;
}





/*
--------EJECUCIÓN--------
*/

    do{
     
     echo "Seleccione una opción:\n1- SUMAR \n2- RESTAR \n3- MULTIPLICACION \n4- Concatenar\n5- Buscar\n6- Reemplazar\n7- SALIR\n\n";
     $opc= readline();

     switch($opc)
     {
        case 1:
            echo "\n";
            sum($operacion);
            if(ask()!=true)
            {
                $opc=7;
            }
            break;
        case 2:
            echo "\n";
            rest();
            if(ask()!=true)
            {
                $opc=7;
            }
            break;
        case 3:
            echo "\n";
            mult();
            if(ask()!=true)
            {
                $opc=7;
            }
            break;
        case 4:
            echo "\n";
            concatenar();
            if(ask()!=true)
            {
                $opc=7;
            }
            break;
        case 5:
            echo "\n";
            buscar();
            if(ask()!=true)
            {
                $opc=7;
            }
            break;
        case 6:
            echo "\n";
            reemplazar();
            if(ask()!=true)
            {
                $opc=7;
            }
            break;
        case 7:
            echo "\n";
            echo "Saliendo del programa";
            break;
        default:
            echo "Esa no es una opción válida";
            echo "\n";
            break;
     }
    }while($opc !=7);
?>