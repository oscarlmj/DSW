<?php


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

$dias=(array_keys($horario));
   
echo "<table border='1'>";
    
echo "<tr>";
foreach($dias as $d)
{
    
    switch($d)
    {
        case 0:
            echo "<th>Lunes</th>";
            break;
        case 1:
            echo "<th>Martes</th>";
            break;
        case 2:
            echo "<th>Miercoles</th>";
            break;
        case 3:
            echo "<th>Jueves</th>";
            break;
        case 4:
            echo "<th>Viernes</th>";
            break;
    }
}
    echo "</tr>";

    echo "<tr>";
    for($i=0;$i<=6;$i++)
    {
        for($j=0;$j<=4;$j++)
        {
            if($i==3)
            {
                echo "<td>Descanso</td>";
            }
            else
            {
                echo "<td>".$horario[$j][$i][0]."</td>";
            }
            
        }
        echo "</tr>";
    }
echo "</table>";
?>