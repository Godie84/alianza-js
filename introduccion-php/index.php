<?php
/*
 * Introducción a PHP
 * PHP significa "PHP: Hypertext Preprocessor".
 * Es un lenguaje de programación del lado del servidor, diseñado especialmente para desarrollar páginas web dinámicas.
 * 
 * ¿Qué significa "del lado del servidor"?
 * Que el código PHP se ejecuta en el servidor (no en el navegador) y genera HTML, que luego se envía al cliente.
 * Ejemplo: un login, un formulario de contacto, un carrito de compras… todo eso suele funcionar con PHP detrás.
 */

/************************************************
 * INSTRUCCIONES BASICAS DE SALIDA PHP
 * 1. echo: Imprime una o mas cadenas de texto, no retorna nada.
 * 2. print: Imprime una cadena de texto y retorna 1 si se ejecuta correctamente.
 * 3. print_r: Imprime una cadena de texto o un array, sin importar el formato o el estilo.
 ***********************************************/
echo "<h1>Hola Mundo desde PHP</h1>"; // imprime "Hola Mundo desde PHP"
echo "<br>"; // salto de línea

echo "<h3>IMPRIMIR TEXTO EN PANTALLA</h3>";
echo "Hola Mundo ";
echo "<br>";
print_r("Como estan ");
echo "<br>"; //Salto de linea
print("Esto es un mensaje");
echo "<br>";
?>
<?= "Pero nueva línea ahora" // impresion en pantalla abreviada 
?>
<?php echo "Algo de texto"; //Impresion de manera tradicional 
?>

<?php
/***************************************************
 * VARIABLES *
 ****************************************************
 * 1. Las variables en PHP comienzan con el simbolo $
 * 2. Las variables son case sensitive (distinguen entre mayusculas y minusculas)
 * 3. Las variables pueden contener letras, numeros y guiones bajos.
 * 4. Las variables no pueden comenzar con un numero.
 * PHP determina automáticamente si un número es un entero o un punto flotante en función de su valor.

 * También puedes declarar explícitamente el tipo mediante la conversión de tipos:
 * $c = (int)42; // Integer
 * $d = (float)3.14; // Floating-point
 * PHP maneja operaciones numéricas automáticamente, independientemente de si está utilizando números  enteros o de punto flotante.
 ***************************************************/
echo "<h3>VARIABLES</h3>";
$Nombre = "Juan"; //Variable de tipo string
$Edad = 35; //Variable de tipo entero
$Altura = 1.75; //Variable de tipo float
$Programador = true; //Variable de tipo booleano
$ValorNulo = null; //Variable de tipo nulo

// Nulo y vacío
// En PHP, hay dos valores especiales que representan la ausencia de un valor significativo: nulo y vacío.
// nulo :
// Representa la ausencia intencional de cualquier valor. Es un tipo de dato especial en PHP. Puedes asignar null explícitamente:
// $x = null;
// echo $x;
// Esto no genera nada (una cadena vacía).
// vacío :
// Aunque no es un tipo de dato, empty() es una función en PHP que comprueba si una variable se considera vacía. Una variable se considera vacía si:
// No existe
// Es una cadena vacía ("")
// Es 0 (como un entero)
// Es "0" (como una cadena)1
// Es nulo
// Es falso
// Es una matriz vacía

$y = "";
echo empty($y); // true, porque $y es una cadena vacía
echo "<br>";
echo true;
echo "<br>";
echo false;

/***************************************************
 * STRING Y CONCATENACION *
 ****************************************************/
echo "<h3>STRING Y CONCATENACION</h3>";
$varNombre = "Juan"; //Variable de tipo string
$varApellido2 = 'Rodriguez'; //Variable de tipo string
echo "Hola " . $varNombre . " " . $varApellido2 . "<br>"; //Concatenacion de variables dentro de un string empleando (.).
echo 'Hola $varNombre $varApellido2 <br>'; //No se concatenan las variables, se imprimen como texto
echo "Hola, mi nombre es: {$varNombre} y mi apellido es: {$varApellido2} <br>"; //Concatenacion de variables dentro de un string con interpolacion de variables

$Texto = "Hola soy $Nombre y tengo $Edad años y mido $Altura metros"; //Concatenacion de variables dentro de un string

//Operador de asignación concatenante ( .=) Agrega el operando derecho al operando izquierdo.
$greeting = "Hello";
$greeting .= " World"; // $greeting now contains "Hello World"
echo $greeting; // Imprime: Hello World

/***************************************************
 * CONSTANSTES *
 ****************************************************/
echo "<h3>CONSTANTES</h3>";
$edad = 20; //Variable de tipo entero

define("EDAD", 20); //Constante de tipo entero, no se debe usar el signo de $, se declara con la funcion nativa define()

echo EDAD; //Imprime 20
echo "<br>";
//echo EDAD = 30; //Error: Cannot redeclare EDAD() (constante ya definida)

/***************************************************
 ************ OPERADORES ARITMETICOS ***************
 ****************************************************/
echo "<h3>OPERADORES ARITMETICOS</h3>";
//(+, -, *, /, %)

$num1 = 10; //Variable de tipo entero
$num2 = 5; //Variable de tipo entero
$suma = $num1 + $num2; //Suma
$resta = $num1 - $num2; //Resta
$multiplicacion = $num1 * $num2; //Multiplicacion
$division = $num1 / $num2; //Division  
$modulo = $num1 % $num2; //Modulo (resto de la division)
$exponenciacion = $num1 ** $num2; //Exponenciacion (potencia)
$incremento = $num1++; //Incremento (suma 1 a la variable)
$decremento = $num1--; //Decremento (resta 1 a la variable)
$incremento2 = ++$num1; //Incremento (suma 1 a la variable y luego la imprime)
$decremento2 = --$num1; //Decremento (resta 1 a la variable y luego la imprime)
echo "La suma es: $suma <br>";
echo "La resta es: $resta <br>";
echo "La multiplicacion es: $multiplicacion <br>";
echo "La division es: $division <br>";
echo "El modulo es: $modulo <br>";
echo "La exponenciacion es: $exponenciacion <br>";
echo "El incremento es: $incremento <br>";
echo "El decremento es: $decremento <br>";
echo "El incremento2 es: $incremento2 <br>";
echo "El decremento2 es: $decremento2 <br>";

/***************************************************
 ************** OPERADORES RELACIONALES ************
 ****************************************************/

/**
 * 
 * Operador ---| Significado ---------------| Ejemplo ----- | Resultado
 * ==	         | Igual que (valores)	     | $a == $b	   | true si $a es igual a $b (sin importar tipo)
 * ===	      | Igual en valor y tipo	     | $a === $b	   | true si son exactamente iguales (valor y tipo)
 * !=	         | Distinto (valor)	        | $a != $b	   | true si no son iguales (valor)
 * <>	         | Distinto (valor)	        | $a <> $b	   | Igual que !=
 * !==	      | Distinto en valor o tipo	  | $a !== $b	   | true si no son exactamente iguales
 * >	         | Mayor que	                 | $a > $b	      | true si $a es mayor que $b
 * <	         | Menor que	                 | $a < $b	      | true si $a es menor que $b
 * >=	         | Mayor o igual que	        | $a >= $b	   | true si $a es mayor o igual
 * <=	         | Menor o igual que	        | $a <= $b	   | true si $a es menor o igual
 */

/***************************************************
 * OPERADORES LOGICOS *
 *****************************************************/
echo "<h3>OPERADORES LOGICOS</h3>";
$var1 = 4;
$var2 = 5;

//&& (AND) - Devuelve verdadero si ambas condiciones son verdaderas
//|| (OR) - Devuelve verdadero si al menos una de las condiciones es verdadera
//! (NOT) - Devuelve verdadero si la condición es falsa
//xor - Devuelve verdadero si una de las condiciones es verdadera, pero no ambas

if ($var1 == $var2) {
    echo "El valor de var1 es igual al valor de var2 <br>";
    if ($var1 == 4) {
        echo "El valor de var1 es 4 <br>";
    }
    if ($var1 == 5) {
        echo "El valor de var1 es 5 <br>";
    }
}
if (($var1 == $var2) || ($var1 == 4)) {
    echo "El valor de var1 es igual a var2 y es un numero 4 <br>";
}

/***************************************************
 * CONDICIONALES IF, IF ELSE *
 *****************************************************/
echo "<h3>CONDICIONALES IF, ELSE IF</h3>";
if ($var1 != $var2 && $var1 > $var2) { //AND (y)
    echo "Ambas condiciones son verdaderas <br>";
} else {
    echo "Una de las condiciones es falsa <br>";
}

echo "<h3>CONDICIONALES ANIDADOS</h3>";
//Condicionales anidados
if ($var1 == $var2) {
    echo "El valor de var1 es igual al valor de var2 <br>";
    if ($var1 == 4) {
        echo "El valor de var1 es 4 <br>";
    }
    if ($var1 == 5) {
        echo "El valor de var1 es 5 <br>";
    }
} else {
    echo "No se cumple la primera <br>";
}

/***************************************************
 * TERNARIO *
 *****************************************************/
echo "<h3>CONDICIONAL TERNARIO</h3>";
//TERNARIO: El ternario es una forma corta de escribir un if...else.
$edad = 17;
$mensaje = ($edad >= 18) ? "Es mayor de edad" : "Es menor de edad";
echo $mensaje; // Imprime: Es mayor de edad
echo "<br>";
//Ejemplo de uso del operador ternario
$activo = false; //Variable de tipo booleano
echo ($activo) ? "Usuario activo" : "Usuario inactivo";

/***************************************************
 * SWITCH *
 *****************************************************/
echo "<h3>CONDICIONAL SWITCH</h3>";
$mensaje = ""; //Variable vacia para guardar el mensaje

if ($_POST) {
    $boton = $_POST['btnValor'] ?? null; //Variable de tipo string
    switch ($boton) {
        case 1:
            $mensaje = "Has presionado el boton 1 <br>";
            break;

        case 2:
            $mensaje = "Has presionado el boton 2 <br>";
            break;

        case 3:
            $mensaje = "Has presionado el boton 3 <br>";
            break;

        default:
            $mensaje = "Boton no reconocido <br>";
            break;
    }
}
?>
<?php if (!empty($mensaje)): ?>
    <p style="color:green; font-weight:bold;"><?= $mensaje ?></p>
<?php endif; ?>
<form action="index.php" method="post">
    <input type="submit" name="btnValor" value="1">
    <br>
    <input type="submit" name="btnValor" value="2">
    <br>
    <input type="submit" name="btnValor" value="3">
</form>

<?php

/******************************************
 * EXPRESION MATCH *
 * match es una expresión (no una función) que actúa como una evolución del clásico switch, pero más poderosa y segura:

  - Devuelve un valor
  - Evalúa con igualdad estricta (===)
  - Es más clara y menos propensa a errores
 *****************************************/

 $resultado = match($variable) {
    1 => "Uno",
    2 => "Dos",
    3 => "Tres",
    default => "Otro número",
 };
 
 
 //Dias de la semana con match
 
 $diaNumero = 4; 
 
 //Compara el valor de la variable $diaNumero con una lista de casos y segun coincida, le asignare el valor correspondiente a la variable $diaNombre
 $diaNombre = match ($diaNumero) {
     1 => "Lunes",
     2 => "Martes",
     3 => "Miércoles",
     4 => "Jueves",
     5 => "Viernes",
     6 => "Sábado",
     7 => "Domingo",
     default => "Número de día inválido"
 };
 
 echo "Día $diaNumero: $diaNombre";
 //El valor de $diaNumero se compara contra los casos definidos en match
 //Si coincide con 1 al 7, devuelve el nombre del día correspondiente
 //Si no coincide (por ejemplo, si es 0 o 8), devuelve "Número de día inválido" usando default
 

/***************************************************
 * BUCLES WHILE, DO WHILE, FOR, FOREACH *
 *****************************************************/
/***************************************************
 * BUCLE FOR *
 * Se usa cuando sabes cuántas veces necesitas repetir algo.
 * Todo está en una sola línea: inicio, condición y avance.
 * Ideal para recorrer desde un número inicial a uno final (ej.   del 1 al 10).
 * Se usa para recorrer arrays o listas.
 *****************************************************/

echo "<h3>BUCLE FOR</h3>";
//Estructura del bucle for
for ($i = 0; $i < 10; $i++) {
    # code...
}

for ($numeroInicial = 0; $numeroInicial <= 10; $numeroInicial++) {
    echo "Numero " . $numeroInicial . "<br>";
}

echo "<h3>Ejemplo con FOR</h3>";
$i = 5;
for ($j = $i; $j <= 5; $j++) {
    echo "FOR: Iteración $j <br>";
}

//Para incrementar mas de 1
echo "<h3>Ejemplo con FOR</h3>";
$i = 5;
for ($j = $i; $j <= 5; $j += 2) {
    echo "FOR: Iteración $j <br>";
}

/***************************************************
 * BUCLE DO WHILE *
 * Se usa cuando quieres que el código se ejecute al menos una vez, sin importar si la condición es falsa.
 * La condición se evalúa después de ejecutar el bloque.
 * Siempre se ejecuta al menos una vez, incluso si la condición es falsa.
 *****************************************************/

$numeroInicial = 11; //Variable de tipo entero
do { //hacer o imprimir primero, luego evaluar la condicion
    echo "Do_Numero " . $numeroInicial . "<br>";
    $numeroInicial++; //Incrementar el valor de la variable
} while ($numeroInicial <= 10); //Condicion de salida del bucle

/***************************************************
 * BUCLE WHILE *
 * Se usa cuando no sabes cuántas veces se repetirá, pero necesitas verificar una condición antes de cada vuelta.
 * La condición se evalúa antes de entrar al bucle.
 * Si la condición es falsa desde el inicio, nunca se ejecuta.
 *****************************************************/

echo "<h3>BUCLE WHILE</h3>";
$numeroInicial = 0;
while ($numeroInicial <= 10) { //Condicion de salida del bucle
    echo "Numero " . $numeroInicial . "<br>";
    $numeroInicial++; //Incrementar el valor de la variable
}

/***************************************************
 * BUCLE FOREACH *
 * Se usa exclusivamente para recorrer arrays (o colecciones como objetos), sin necesidad de usar un índice manual.
 * Más limpio y más legible que for o while para arrays.
 * No necesitás preocuparte por count(), índices ni límites.
 * Muy útil cuando trabajás con datos como listas de usuarios, productos, etc.
 *****************************************************/

echo "<h3>BUCLE FOREACH</h3>";
$colores = ["Rojo", "Verde", "Azul"];
foreach ($colores as $color) {
    echo "Color: $color <br>";
}
//También podés acceder a la clave (índice) y al valor así:
$colores = ["a" => "Rojo", "b" => "Verde", "c" => "Azul"];

foreach ($colores as $clave => $color) {
    echo "Clave: $clave - Color: $color <br>";
}
echo "<h3>Ejemplo con FOREACH</h3>";
//ejemplo con foreach + un array asociativo de usuarios
//Array asociativo "clave" => "valor"
$usuarios = [
    ["nombre" => "Ana", "correo" => "ana@email.com"],
    ["nombre" => "Luis", "correo" => "luis@email.com"],
    ["nombre" => "Carla", "correo" => "carla@email.com"]
];

foreach ($usuarios as $usuario) { //Por cada elemento del array guardalo como $usuario
    echo "Nombre: {$usuario['nombre']} - Correo: {$usuario['correo']}<br>";
}

/***************************************************
 * FUNCIONES *
 *****************************************************/
echo "<h3>FUNCIONES</h3>";

//Funciones son bloques de código reutilizables que realizan una tarea específica.
//Se definen con la palabra reservada function, seguida del nombre de la función y paréntesis (). Sintaxis básica:

//Funcion con parametros
function imprimirNombre($nombre, $apellido)
{ //funcion con parametros
    echo "Hola $nombre $apellido <br>";
}

imprimirNombre("Juan", "Rodriguez"); //Llamada a la funcion con el parametro "Juan"
imprimirNombre("Camila", "cifuentes");
imprimirNombre("Sandra", "Cardenas");

//Funciones con retorno de valor
function sumar($a, $b)
{
    return $a + $b;
}
$resultado = sumar(5, 7);
echo "La suma es: $resultado<br>";

//Funcion con variable global
$contador = 0;

function incrementar()
{
    global $contador; // Hace visible la variable global dentro de la función
    $contador++;
}
incrementar();
echo $contador;
echo "<br>";


//Parametros por defecto
function saludar($nombre = "Invitado")
{
    echo "Hola, $nombre<br>";
}
saludar(); // Imprime: Hola, Invitado
saludar("María");

//Funciones anonimas (closure o lambda)
$saludo = function ($nombre) {
    return "Hola $nombre!<br>";
};

echo $saludo("Pepe"); //Llamada a la funcion anonima

//Arrow functions (PHP 7.4+)
$fn = fn($param1, $param2) => $param1 + $param2; //Funcion flecha (arrow function) que suma dos numeros
echo $fn(3, 5); // Imprime: 8
echo "<br>";

$suma = fn($a, $b) => $a + $b;
echo $suma(10, 10); // Imprime: 8
echo "<br>";

//Saludo con Arrow function
$saludoNombre = fn($nombre) => "Hola $nombre!<br>"; //Funcion flecha (arrow function) que saluda a una persona
echo $saludoNombre("Diego"); //Llamada a la funcion anonima

//Funcion aleatoria (random)
$numeroAleatorio = rand(5,10); //Genera un numero aleatorio entre 1 y 10
echo "Numero aleatorio: $numeroAleatorio <br>";

//Funcion para convertir en mayusculas
$nombre = "Juan Rodriguez"; //Variable de tipo string
$nombreMayusculas = strtoupper($nombre); //Convierte el string a mayusculas
echo "Nombre en mayusculas: $nombreMayusculas <br>"; //Imprime el nombre en mayusculas

//Funcion para convertir en minusculas
$nombreMinusculas = strtolower($nombre); //Convierte el string a minusculas
echo "Nombre en minusculas: $nombreMinusculas <br>"; //Imprime el nombre en minusculas

//Funcion para contar la longitud de un string
$longitudNombre = strlen($nombre); //Cuenta la longitud del string
echo "Longitud del nombre: $longitudNombre <br>"; //Imprime la longitud del nombre

//Funcion date de la hora actual
$fechaActual = date("d/m/Y H:i:s"); //Obtiene la fecha y hora actual
echo "Fecha y hora actual: $fechaActual <br>"; //Imprime la fecha y hora actual

//echo dirname("/var/www/html/index.php"); 

//C:\Users\diego\Escritorio\PROYECTO-WEB\programa-alianza\alianza-js\introduccion-php\formulario_get.html

//introduccion-php\formulario_get.html
echo "<br>";
echo dirname("C:/Users/diego/Escritorio/PROYECTO-WEB/programa-alianza/alianza-js/introduccion-php/lista_usuarios.php");
echo "<br>";
$password = "aá";

if (strlen($password) < 3) {
    echo "La contraseña es demasiado corta";
} else {
    echo "Contraseña válida";
}

//Tipado fuerte de parámetros y retorno

function saludar1(string $nombre): string
{
    return "Hola, $nombre";
}

echo saludar1("Sandra"); // Resultado: Hola, Diego

echo "<br>";

//enum
/**
 * Los enum (enumeraciones) fueron introducidos en PHP 8.1, y permiten definir un conjunto fijo de valores posibles para una variable. Son especialmente útiles cuando quieres restringir los valores a un grupo específico (por ejemplo, días de la semana, estados de pedido, roles de usuario, etc.).
 */

 enum RolUsuario {
    case Admin;
    case Editor;
    case Lector;
}

// Usamos el enum
function saludarPorRol(RolUsuario $rol): string {
    return match($rol) {
        RolUsuario::Admin => 'Hola, administrador',
        RolUsuario::Editor => 'Hola, editor',
        RolUsuario::Lector => 'Hola, lector',
    };
}

// Llamamos la función
echo saludarPorRol(RolUsuario::Admin);