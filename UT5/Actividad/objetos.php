<?php

//Array donde se almacenarán los objetos una vez creados.
$viviendas = [];

//Clase abstracta.
abstract class Vivienda {
    //Atributos de la clase.
    protected $num_habitaciones;
    protected $num_baños;
    protected $num_plantas;
    protected $color;

    //Constructor de la clase con 3 parametros.
    public function __construct( int $num_habitaciones, int $num_baños, string $color ) {
        $this->num_habitaciones = $num_habitaciones;
        $this->num_baños = $num_baños;
        $this->color = $color;
    }

    //Metodo que devuelve el numero de habitaciones.
    public function get_num_habitaciones() {
        return $this->num_habitaciones;
    }

    //Metodo que devuelve el numero de baños.
    public function get_num_baños() {
        return $this->num_baños;
    }

    //Metodo abstracto que devuelve el numero de plantas.
    abstract public function get_num_plantas();

    //Metodo que devuelve el color de la casa.
    public function get_color(){
        return $this->color;
    }
}

//Interfaz mediante la cual se le cambia el color a las casas.
interface cambiarColor{
    public function pintarCasa();
}

//Objeto creado a partir de la clase abstracta, donde ademas se implementa la interfaz.
//En este caso, el metodo abstracto genera un numero aleatorio entre 2 y 3 para conocer el numero de plantas.
class Duplex extends Vivienda implements CambiarColor {
    protected $num_plantas;

    //Metodo constructor.
    public function __construct(int $num_habitaciones, int $num_baños, int $num_plantas, string $color) {
        parent::__construct($num_habitaciones, $num_baños, $color);
        $this->num_plantas = $num_plantas;
    }

    //Implementacion de la interfaz. Se genera un numero aleatorio de 0 a 9, para elegir el color en el array.
    public function pintarCasa()
    {
        $colores = ["Rojo", "Verde", "Azul", "Amarillo", "Naranja", "Morado", "Rosa", "Gris", "Negro", "Blanco"];
        $this->color = $colores[$numeroAleatorio = rand(0, 9)];
    }

    //Metodo abstracto de la clase Vivienda.
    public function get_num_plantas()
    {
        $numeroPlantas = rand(2,3);
        return $this->num_plantas;
    }
}

//Objeto Piso creado a partir de la clase abstracta Vivienda.
class Piso extends Vivienda {

    //Se establece por defecto el numero de baños a 1.
    protected $num_baños=1;

    //Metodo constructor.
    public function __construct(int $num_habitaciones, int $num_baños, string $color) {
        parent::__construct($num_habitaciones, $num_baños, $color);
    }

    //Metodo de la clase abstracta, pero en este caso, devuelve siempre 1.
    public function get_num_plantas()
    {
        return 1;
    }
}

//Metodo mediante el cual se crear aleatoriamente objetos de los ya definidos, y se almacenan en el array viviendas.
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

//Funcion que muestra por pantalla un mensaje descriptivo de cada objeto creado.
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

//Ejecución.
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
