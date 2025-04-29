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
$producto2->mostrarInfo();

$producto3 = new Producto("Café", 2.5, 10);
$producto3->mostrarInfo();

$producto4 = new Producto();
$producto4->mostrarInfo();



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

echo "<h1>Ejercicio 1: CLASE COCHE</h1>";
echo "<p>Crear una clase **Coche** con los atributos **marca,** **modelo, color**, y un método **mostrarDetalles** que imprima esos atributos.</p>";
// 1. Definición de la clase
class Coche
{
    //Encapsulamiento: La clase oculta los detalles internos y organiza el código en bloques (clases) que protegen los datos.
    // 2. Atributos públicos: propiedades del objeto
    public $marca;
    public $modelo;
    public $color;

    // 3. Constructor: método especial que se ejecuta al crear un objeto
    public function __construct($marca, $modelo, $color)
    {
        $this->marca = $marca;   // Asigna el valor recibido al atributo "marca"
        $this->modelo = $modelo; // Asigna el valor recibido al atributo "modelo"
        $this->color = $color;   // Asigna el valor recibido al atributo "color"
    }

    // 4. Método para mostrar los detalles del coche
    public function mostrarDetalles()
    {
        echo "Marca: $this->marca, Modelo: $this->modelo, Color: $this->color<br>";
        // Imprime los atributos del coche usando $this para acceder al objeto actual
    }
}

//Abtraccion: Permite trabajar con conceptos del mundo real (como un coche) sin tener que saber cómo está construido internamente.
// 5. Crear un objeto (instancia) de la clase Coche
$coche = new Coche("Toyota", "Corolla", "Rojo");

// 6. Llamar al método del objeto para mostrar sus detalles
$coche->mostrarDetalles();

//===============================================================================================


echo "<h1>Ejercicio 2: CLASE CUENTA BANCARIA</h1>";
echo "<p>Crear una clase **CuentaBancaria** con los atributos **saldo** y **titular**, y métodos **depositar** y **retirar** dinero. Implementa una validación para evitar retirar más dinero del que se tiene.</p>";


// Definición de la clase CuentaBancaria
class CuentaBancaria
{
    // Atributos privados (encapsulados)
    private $saldo;
    private $titular;

    // Constructor: inicializa el saldo y el titular
    public function __construct($titular, $saldoInicial = 0)
    {
        $this->titular = $titular;
        $this->saldo = $saldoInicial;
    }

    // Método para depositar dinero
    public function depositar($monto)
    {
        if ($monto > 0) {
            $this->saldo += $monto; // Aumenta el saldo
        }
    }

    // Método para retirar dinero, con validación
    public function retirar($monto)
    {
        if ($monto > 0 && $monto <= $this->saldo) {
            $this->saldo -= $monto; // Disminuye el saldo
        } else {
            echo "<br>Fondos insuficientes o monto inválido.<br>";
        }
    }

    // Método para mostrar el saldo actual
    public function mostrarSaldo()
    {
        echo "Titular: $this->titular, Saldo: $this->saldo<br>";
    }
}

// Crear una cuenta
$cuenta = new CuentaBancaria("Andres", 2000);

// Realizar operaciones
$cuenta->depositar(600);
$cuenta->retirar(300);
$cuenta->mostrarSaldo();
$cuenta->retirar(3000);


echo "<h1>Ejercicio 3: CLASE EMPLEADO</h1>";
echo "<p>Ejercicio 3: Crear una clase **Empleado** con los atributos **nombre**, **salario** y **puesto**. Luego, crear una clase **Gerente** que herede de **Empleado** y agregue un atributo **departamento**.</p>";
// Clase base: Empleado
class Empleado
{
    // Atributos privados (ahora encapsulados completamente)
    private $nombre;
    private $salario;
    private $puesto;

    // Constructor que inicializa los atributos
    public function __construct($nombre, $salario, $puesto)
    {
        $this->nombre = $nombre;
        $this->salario = $salario;
        $this->puesto = $puesto;
    }

    // Métodos getter y setter para acceder a los atributos de forma controlada
    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getSalario()
    {
        return $this->salario;
    }

    public function setSalario($salario)
    {
        $this->salario = $salario;
    }

    public function getPuesto()
    {
        return $this->puesto;
    }

    public function setPuesto($puesto)
    {
        $this->puesto = $puesto;
    }

    // Método para mostrar información del empleado
    public function mostrarInformacion()
    {
        echo "Nombre: " . $this->getNombre() . ", Puesto: " . $this->getPuesto() . ", Salario: " . $this->getSalario() . "<br>";
    }
}

// Clase derivada: Gerente (hereda de Empleado) - Herencia
class Gerente extends Empleado
{
    private $departamento; // Atributo privado específico de Gerente

    // Constructor extendido: llama al constructor del padre y agrega un nuevo atributo
    public function __construct($nombre, $salario, $puesto, $departamento)
    {
        parent::__construct($nombre, $salario, $puesto); // Reutiliza el constructor de Empleado
        $this->departamento = $departamento;
    }

    // Métodos getter y setter para el atributo departamento
    public function getDepartamento()
    {
        return $this->departamento;
    }

    public function setDepartamento($departamento)
    {
        $this->departamento = $departamento;
    }

    // Sobrescribe el método del padre para agregar información adicional
    public function mostrarInformacion()
    {
        parent::mostrarInformacion(); // Llama al método original de Empleado
        echo "Departamento: " . $this->getDepartamento() . "<br>";
    }
}

// Crear objeto de tipo Gerente
$gerente = new Gerente("Camila", 4500, "Gerente de Infraestructura", "IT");

// Llamar al método sobrescrito
$gerente->mostrarInformacion();

// Modificar el salario utilizando el setter
$gerente->setSalario(5000);

// Mostrar la información después de modificar el salario
echo "<br>Después de modificar el salario:<br>";
$gerente->mostrarInformacion();



/*
 * Encapsulación: Atributos privados y uso de getter/setter para el acceso controlado. - Los datos están completamente encapsulados, y se controlan sus accesos y modificaciones. 
 * Abstracción: La clase representa un concepto de "Empleado" y "Gerente", sin exponer detalles internos. - Los detalles internos de cómo se maneja el salario, nombre, etc., están ocultos, y se manejan a través de métodos simples.
 * Herencia: Gerente hereda de Empleado. - Gerente reutiliza el código de Empleado y añade su propio comportamiento.
 * Polimorfismo: Sobrescritura del método mostrarInformacion() en Gerente. - Gerente proporciona una versión extendida de mostrarInformacion(), agregando más datos.
*/

echo "<h1>Ejercicio 4: CLASE ABSTRACTA</h1>";
echo "<p>Crear una clase abstracta **FiguraGeometrica** con un método abstracto **calcularArea**. Luego, crea clases como **Círculo** y **Rectángulo** que extiendan esta clase y implementen el cálculo del área.</p>";
// Clase abstracta FiguraGeometrica
abstract class FiguraGeometrica
{
    // Atributos privados
    private $nombre;

    // Constructor para establecer el nombre de la figura
    public function __construct($nombre)
    {
        $this->nombre = $nombre;
    }

    // Getter y Setter para el nombre de la figura
    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    // Método abstracto para calcular el área
    abstract public function calcularArea();
}

// Clase Círculo que extiende de FiguraGeometrica
class Circulo extends FiguraGeometrica
{
    private $radio; // Atributo privado para el radio del círculo

    // Constructor para inicializar el radio
    public function __construct($nombre, $radio)
    {
        parent::__construct($nombre); // Llama al constructor de FiguraGeometrica
        $this->radio = $radio;
    }

    // Getter y Setter para el radio
    public function getRadio()
    {
        return $this->radio;
    }

    public function setRadio($radio)
    {
        $this->radio = $radio;
    }

    // Implementación del cálculo del área para un círculo
    public function calcularArea()
    {
        return pi() * pow($this->radio, 2); // Área = π * radio^2
    }
}

// Clase Rectángulo que extiende de FiguraGeometrica
class Rectangulo extends FiguraGeometrica
{
    private $base; // Atributo privado para la base del rectángulo
    private $altura; // Atributo privado para la altura del rectángulo

    // Constructor para inicializar la base y la altura
    public function __construct($nombre, $base, $altura)
    {
        parent::__construct($nombre); // Llama al constructor de FiguraGeometrica
        $this->base = $base;
        $this->altura = $altura;
    }

    // Getter y Setter para la base
    public function getBase()
    {
        return $this->base;
    }

    public function setBase($base)
    {
        $this->base = $base;
    }

    // Getter y Setter para la altura
    public function getAltura()
    {
        return $this->altura;
    }

    public function setAltura($altura)
    {
        $this->altura = $altura;
    }

    // Implementación del cálculo del área para un rectángulo
    public function calcularArea()
    {
        return $this->base * $this->altura; // Área = base * altura
    }
}

// Crear un objeto de tipo Círculo
$circulo = new Circulo("Círculo", 5);

// Calcular y mostrar el área del círculo
echo "Área del " . $circulo->getNombre() . ": " . $circulo->calcularArea() . "<br>";

// Crear un objeto de tipo Rectángulo
$rectangulo = new Rectangulo("Rectángulo", 4, 6);

// Calcular y mostrar el área del rectángulo
echo "Área del " . $rectangulo->getNombre() . ": " . $rectangulo->calcularArea() . "<br>";


/**
 * Control del acceso a los atributos: Ahora los valores de los atributos no se pueden modificar directamente desde fuera de la clase, lo que garantiza que los datos se manejen correctamente.
 * Facilidad de validación: Los métodos setter permiten agregar validaciones antes de cambiar los valores de los atributos.
 * Mantenimiento más sencillo: la forma en que calculamos el área o cómo manejamos los atributos, solo necesitamos hacerlo en un solo lugar (en el setter o en la clase base).
*/

//Encapsulacion: Atributos privados y métodos getter/setter para controlar el acceso - Los datos ahora están completamente encapsulados, y se controla cómo se accede y se modifican.

//Abstraccion: La clase FiguraGeometrica representa el concepto general de una figura geométrica, sin especificar detalles de cada tipo de figura - La clase base define la estructura común para cualquier figura, ocultando detalles específicos de implementación.

//Herencia: Circulo y Rectangulo heredan de FiguraGeometrica - Circulo y Rectangulo reutilizan código común de la clase base y pueden implementar su propia lógica para calcular el área.

//Polimorfismo: 	El método calcularArea() es sobrescrito en Circulo y Rectangulo - El mismo método calcularArea() tiene diferentes comportamientos según el tipo de objeto (Circulo o Rectangulo).


/**
 * Se le llama clase abstracta a una clase en la Programación Orientada a Objetos (POO) porque no está pensada para ser instanciada directamente, sino que sirve como una plantilla o base para otras clases. Las clases abstractas pueden contener tanto métodos concretos (con implementación) como métodos abstractos (sin implementación), y su principal propósito es definir una estructura común que otras clases pueden extender y completar.

 * Características clave de una clase abstracta:
 * 
 * No puede ser instanciada directamente:
 * No puedes crear un objeto de una clase abstracta. En su lugar, debes crear instancias de las clases que la extienden (heredan).

 * Métodos abstractos:
 * Una clase abstracta puede contener métodos abstractos, que son métodos sin cuerpo o implementación. Estos métodos deben ser implementados por las clases que extienden la clase abstracta. La clase base define qué métodos deben existir, pero no especifica cómo se deben ejecutar.

 * Métodos concretos:
 * Además de los métodos abstractos, una clase abstracta también puede tener métodos concretos (con implementación). Estas implementaciones pueden ser reutilizadas por las clases que extienden la clase abstracta, evitando la duplicación de código.

 * Propósito:
 * Una clase abstracta se utiliza para proporcionar una estructura común y evitar que se dupliquen detalles comunes en las clases derivadas. En esencia, proporciona una plantilla base que las clases hijas deben completar y especializar.
 */