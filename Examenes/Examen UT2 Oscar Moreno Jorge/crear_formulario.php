<?php
//Indica cual es el fichero de lectura.
$fichero="./estructura_formulario.cfg";
//Abre el flujo de lectura del archivo.
$gestor=fopen($fichero,"r");
$cont=fread($gestor,filesize($fichero));
fclose($gestor);

//Separa el contenido del archivo mediante ;.
$splitcont=explode(";",$cont);
//Realiza el formulario rellenando los campos segun la posiciones del array.
echo("<form action=$splitcont[0] enctype=multipart/form-data method=$splitcont[1]>");
echo("<label for=$splitcont[3]>$splitcont[2]");
echo("<input type=$splitcont[4] name=$splitcont[3] id=$splitcont[2]><br>");
echo("<label for=$splitcont[6]>$splitcont[5]");
echo("<input type=$splitcont[7] name=$splitcont[5] id=$splitcont[6]><br>");
echo("<label for=$splitcont[9]>$splitcont[8]<br>");

$islas=explode(",",$splitcont[11]);
foreach($islas as $isla)
{
    echo("<input type=$splitcont[10] id=$splitcont[9]>
    $isla
    </input>");
}

echo("<br><label for=$splitcont[13]>$splitcont[12]");
echo("<input type=$splitcont[14] name=$splitcont[13]><br>");

echo("<label for=$splitcont[17]>$splitcont[15]");
echo("<input type=$splitcont[17] name=$splitcont[16]><br>");
echo("<input type=submit><br>");
echo("</form>");
?>