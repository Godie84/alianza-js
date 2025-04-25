<?php
class Producto
{
    public $nombre;
    public $precio;

    function __construct($nombre, $precio)
    {
        $this->nombre = $nombre;
        $this->precio = $precio;
    }

    function mostrarInfo()
    {
        echo "Producto: $this->nombre, Precio: $this->precio <br>";
    }
}

$producto1 = new Producto("Café", 2.5);
$producto1->mostrarInfo();
