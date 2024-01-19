<?php

    // Array donde se almacena cada dia lectivo de la semana con sus respectivas horas, modulos, aula y profesor.
    $horario= array(
        0 =>array(
                0=>array(
                    "DEW","Maria del Carmen","201"
                ),
                1=>array(
                    "DEW","Maria del Carmen","201"
                ),
                2=>array(
                    "DPL","Maria Antonia","201"
                ),
                3=>("Descanso"),
                4=>array(
                    "DSW","Sergio","201"
                ),
                5=>array(
                    "DOR","Maria Lourdes","201"
                ),
                6=>array(
                    "DOR","Maria Lourdes","201"
                )
        ),
        1 =>array(
                0=>array(
                    "DEW","Maria del Carmen","201"
                ),
                1=>array(
                    "DEW","Maria del Carmen","201"
                ),
                2=>array(
                    "DOR","Maria Lourdes","201"
                ),
                3=>("Descanso"),
                4=>array(
                    "DOR","Maria Lourdes","201"
                ),
                5=>array(
                    "DSW","Sergio","201"
                ),
                6=>array(
                    "DSW","Sergio","201"
                )
        ),
        2 =>array(
                0=>array(
                    "DEW","Maria del Carmen","201"
                ),
                1=>array(
                    "DEW","Maria del Carmen","201"
                ),
                2=>array(
                    "DEW","Maria del Carmen","201"
                ),
                3=>("Descanso"),
                4=>array(
                    "DPL","Maria Antonia","201"
                ),
                5=>array(
                    "DSW","Sergio","201"
                ),
                6=>array(
                    "DSW","Sergio","201"
                )
        ),
        3 =>array(
                0=>array(
                    "DOR","Maria Lourdes","201"
                ),
                1=>array(
                    "DOR","Maria Lourdes","201"
                ),
                2=>array(
                    "EMR","Marisol","201"
                ),
                3=>("Descanso"),
                4=>array(
                    "DSW","Sergio","201"
                ),
                5=>array(
                    "DPL","Maria Antonia","201"
                ),
                6=>array(
                    "DPL","Maria Antonia","201"
                )
        ),
        4 =>array(
                0=>array(
                    "EMR","Marisol","201"
                ),
                1=>array(
                    "EMR","Marisol","201"
                ),
                2=>array(
                    "DSW","Sergio","201"
                ),
                3=>("Descanso"),
                4=>array(
                    "DSW","Sergio","201"
                ),
                5=>array(
                    "DPL","Maria Antonia","201"
                ),
                6=>array(
                    "DPL","Maria Antonia","201"
                )
        )
    );

    
    // Funcion que dependiendo del rango de horas nos devuelve la posicion del array donde se almacena esa hora. En caso de estar fuera del rango de horas lectivas devuelve 6.
    function horaActual()
    {
        $hoy=getDate();
        $h=$hoy["hours"];
        $h=$h-1;
        $m=$hoy["minutes"];
        if(strlen($h)<2)
        {
            $h="0".$h;
        }
        $hora=$h.":".$m;

            if($hora>='08:00' && $hora<='08:55')
                return 0;
            elseif($hora>='08:55' && $hora<='09:50')
                return 1;
            elseif($hora>='09:50' && $hora<='10:45')
                return 2;
            elseif($hora>='10:45' && $hora<='11:15')
                return 3;
            elseif($hora>='11:15' && $hora<='12:10')
                return 4;
            elseif($hora>='12:10' && $hora<='13:05')
                return 5;
            elseif($hora>='13:05' && $hora<='14:00')
                return 6;
            else
                return 7;
    }

    //Funcion que dependiendo del dia de la semana que sea devuelve la posicion del array. Se devuelve el número de día -1 ya que ña funciom getDate() los muestra de 1 a 7.
    function diaActual()
    {
        $hoy=getDate();
        $d=$hoy["wday"];
        return $d-1;
    }

    //Pregunta al usuario sobre que dia quiere la informacion y devuelve la posicion del dia indicado. En caso de introducir un dato erroneo, vuelve a solicitar la informacion.
    function dia()
    {

        echo "¿De que dia quiere conocer la informacion?\n";
        $d=strtolower(readline());
        if($d!="lunes"&&$d!="martes"&&$d!="miercoles"&&$d!="jueves"&&$d!="viernes")
        {
            do{

                echo "Por favor introduzca un dia lectivo.\n";
                $d=strtolower(readline());

            }while($d!="lunes"&&$d!="martes"&&$d!="miercoles"&&$d!="jueves"&&$d!="viernes");
        }
        
            switch($d)
            {
                case "lunes":
                    return 0;
                    break;
                case "martes":
                    return 1;
                    break;
                case "miercoles":
                    return 2;
                    break;
                case "jueves":
                    return 3;
                    break;
                case "viernes":
                    return 4;
                    break;
            }   
    }

    //Muestra un menu con las horas de clase, y devuelve la opcion indicada por el usuario -1 para poder acceder a esa posicion en el array.
    function hora()
    {
        echo "Diga la hora de la que quiere conocer informacio:\n1- 08:00-08:55\n2- 08:55-09:50\n3- 09:50-10:45\n4- 10:45-11:15\n5- 11:15-12:10\n6- 12:10-13:05\n7- 13:05-14:00\n";
        $h=readline();
        if($h>0 && $h<8)
        return $h-1;
    }

    /*EJECUCION--------
    En la ejecución, si la hora indicada por el usuario es 3(10:45-11:15) se indica que estamos en
    el descanso. Se recoge el dia y la hora indicados por el usario para poder acceder al array.

    Para el dia actual uso la funcion diaActual() y horaActual() para recibir las posiciones que debemos mirar en el array.
    En caso de ser una hora fuera del horario o un dia no lectivo aparecera un mensaje indicandolo.
    */

        


        $d=dia();
        $h=hora();
        $dia;

        if($h==3)
        {
            echo "Estamos en el descanso";
            
        }
        else {
            switch($d)
        {
            case 0:
                $dia="Lunes";
                break;
            case 1:
                $dia="Martes";
                break;
            case 2:
                $dia="Miercoles";
                break;
            case 3:
                $dia="Jueves";
                break;
            case 4:
                $dia="Viernes";
                break;
        }
        echo "El ".$dia." se imparte el módulo ".$horario[$d][$h][0]." por ".$horario[$d][$h][1]." en el aula ".$horario[$d][$h][2]." a ".($h+1)."ª hora";
        
        }
        if(diaActual()>4)
        {
            echo "\nHoy no es un dia lectivo";
        }
        elseif (horaActual()==7)
        {
            echo "\nEstamos fuera del horario lectivo";
        }
        else
        echo "\nEn estos momentos se esta impartiendo ".$horario[diaActual()][horaActual()][0]." por ".$horario[diaActual()][horaActual()][1]." en el aula ".$horario[diaActual()][horaActual()][2]." a ".(horaActual())."ª hora";
?>