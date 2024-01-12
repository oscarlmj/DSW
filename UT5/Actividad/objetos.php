<?php

$viviendas = [];


abstract class Vivienda {
    protected $num_habitaciones;
    protected $num_baños;
    protected $num_plantas;
    protected $color;


    public function __construct( int $num_habitaciones, int $num_baños, string $color ) {
        $this->num_habitaciones = $num_habitaciones;
        $this->num_baños = $num_baños;
        $this->color = $color;
    }

    public function get_num_habitaciones() {
        return $this->num_habitaciones;
    }

    public function get_num_baños() {
        return $this->num_baños;
    }

    abstract public function get_num_plantas();

    public function get_color(){
        return $this->color;
    }
}

interface cambiarColor{
    public function pintarCasa();
}

class Duplex extends Vivienda implements CambiarColor {
    protected $num_plantas;

    public function __construct(int $num_habitaciones, int $num_baños, int $num_plantas, string $color) {
        parent::__construct($num_habitaciones, $num_baños, $color);
        $this->num_plantas = $num_plantas;
    }

    public function pintarCasa()
    {
        $colores = ["Rojo", "Verde", "Azul", "Amarillo", "Naranja", "Morado", "Rosa", "Gris", "Negro", "Blanco"];
        $this->color = $colores[$numeroAleatorio = rand(0, 9)];
    }

    public function get_num_plantas()
    {
        return $this->num_plantas;
    }
}


class Piso extends Vivienda {

    protected $num_baños=1;

    public function __construct(int $num_habitaciones, int $num_baños, string $color) {
        parent::__construct($num_habitaciones, $num_baños, $color);
    }

    public function get_num_plantas()
    {
        return 1;
    }
}

function crearUrbanizacion()
{
    global $viviendas;
    for ($i = 0; $i <= 10; $i++) {
        $numeroAleatorio = rand(1,2);
        if ($numeroAleatorio == 1) {
            $viviendas[] = new Piso(3, 2, "Azul");
        } else {
            $num_plantas = rand(2,4);
            $viviendas[] = new Duplex(3, 2, $num_plantas, "Rojo");
        }
    }
}

function listarviviendas()
{
    global $viviendas;
    for ($i = 0; $i < sizeof($viviendas); $i++) {
        $salida = "La Vivienda ".$i." es un ";
        if ($viviendas[$i]->get_num_plantas() == 1) {
            $salida .= "piso";
        } else {
            $salida .= "duplex";
        }

        $salida .= " con ".$viviendas[$i]->get_num_baños()." baños y ".$viviendas[$i]->get_num_habitaciones()." habitaciones y es de color ".$viviendas[$i]->get_color()."</br>";
        echo $salida;
    }
}

crearUrbanizacion();
$duplex  =new Duplex(2,2,2,"Amarillo");
array_push($viviendas,$duplex);
$duplex->pintarCasa();
listarviviendas();


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
