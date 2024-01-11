<?php

$Viviendas = [];

class Vivienda {
    protected $num_habitaciones;
    protected $num_baños;
    protected $num_plantas;

    public function __construct( int $num_habitaciones, int $num_baños) {
        $this->num_habitaciones = $num_habitaciones;
        $this->num_baños = $num_baños;
    }

    public function get_num_habitaciones() {
        return $this->num_habitaciones;
    }

    public function get_num_baños() {
        return $this->num_baños;
    }

    public function get_num_plantas() {
        return $this->num_plantas;
    }
}

class Duplex extends Vivienda {
    protected $num_plantas;

    public function __construct(int $num_habitaciones, int $num_baños, int $num_plantas) {
        parent::__construct($num_habitaciones, $num_baños);
        $this->num_plantas = $num_plantas;
    }
}

class Piso extends Vivienda {

    protected $num_baños=1;

    public function __construct(int $num_habitaciones, int $num_baños) {
        parent::__construct($num_habitaciones, $num_baños);
    }

    public function get_num_plantas()
    {
        return 1;
    }
}


function crearUrbanizacion()
{
    global $Viviendas;
    for ($i = 0; $i <= 10; $i++) {
        $numeroAleatorio = rand(1,2);
        if ($numeroAleatorio == 1) {
            $Viviendas[] = new Piso(3, 2);
        } else {
            $num_plantas = rand(2,4);
            $Viviendas[] = new Duplex(3, 2, $num_plantas);
        }
    }
}

function listarViviendas()
{
    global $Viviendas;
    for ($i = 0; $i < sizeof($Viviendas); $i++) {
        $salida = "La Vivienda ".$i." es un ";
        if ($Viviendas[$i]->get_num_plantas() == 1) {
            $salida .= "piso";
        } else {
            $salida .= "duplex";
        }

        $salida .= " con ".$Viviendas[$i]->get_num_baños()." baños y ".$Viviendas[$i]->get_num_habitaciones()." habitaciones.</br>";
        echo $salida;
    }
}


crearUrbanizacion();
listarViviendas();
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
