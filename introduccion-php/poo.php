<?php
/**
 * PROGRAMACION ORIENTADA A OBJETOS
 */
class Producto
{
    public $nombre;
    public $precio;
    public $stock;

    function __construct($nombre = "", $precio = 0, $stock = 1)
    {
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->stock = $stock;
    }

    function mostrarInfo()
    {
        //echo "Producto: $this->nombre, Precio: $this->precio <br>";
        echo "<br>El producto $this->nombre cuesta $this->precio dolares. Stock disponible: $this->stock unidades.<br>";

    }
}

$producto1 = new Producto("Té", 1.8, 5);
$producto1->mostrarInfo();

$producto2 = new Producto("Galleta", 2.3, 15);
$producto2 -> mostrarInfo();

$producto3 = new Producto("Café", 2.5, 10);
$producto3 -> mostrarInfo();

$producto4 = new Producto();
$producto4 -> mostrarInfo();



//Caso 1 -> Cambiar el nombre del producto a "Té" y el precio a "1.8"
//Caso 2 -> Crea un segundo producto que sea una "Galleta" y mostrarla
//Caso 3 -> Modificar la funcion mostrarInfo() para que muestre "El producto Cafe cuesta 2.5 dolares."
//Caso 4 -> Agregá una nueva propiedad llamada "stock" al producto y mostrarla también en mostrarInfo()
//Ejemplo de salida: "El producto Café cuesta 2.5 dólares. Stock disponible: 10 unidades."


//¿Qué papel tiene la clase Producto? => Plantilla o Molde para crear objetos
//¿Qué ocurre cuando se instancia un objeto? => Crea el objeto
//¿Qué pasa si se elimina un método?

/**
 * Ejercicio 1: Crear una clase **Coche** con los atributos **marca,** **modelo, color**, y un método **mostrarDetalles** que imprima esos atributos.

 * Ejercicio 2: Crear una clase **CuentaBancaria** con los atributos **saldo** y **titular**, y métodos **depositar** y **retirar** dinero. Implementa una validación para evitar retirar más dinero del que se tiene.

 * Ejercicio 3: Crear una clase **Empleado** con los atributos **nombre**, **salario** y **puesto**. Luego, crear una clase **Gerente** que herede de **Empleado** y agregue un atributo **departamento**.

 * Ejercicio 4: Crear una clase abstracta **FiguraGeometrica** con un método abstracto **calcularArea**. Luego, crea clases como **Círculo** y **Rectángulo** que extiendan esta clase y implementen el cálculo del área.
*/