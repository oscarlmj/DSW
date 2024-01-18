<?php
$fichero="./formularios_recibidos.txt";
$gestor=fopen($fichero,"w");

//Escribe los datos en el fichero.
foreach($_POST as $valor)
{   
    fwrite($gestor,$valor."\n");
}

//Indica el destino de las imagenes
$destino="./img/";

//Recorre el array $_FILES que almacena los archivos subidos en el formulario y los almacena en el destino.
foreach($_FILES as $fichero)
{
    move_uploaded_file($fichero['tmp_name'],$destino.$fichero['name']);
}
?>