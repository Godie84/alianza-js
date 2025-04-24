<?php
//La lógica es independiente del lenguaje. Todos los lenguajes (PHP, Python, JavaScript...) siguen las mismas estructuras:

/**
 * 1. Leer el enunciado
 * 2. Identificar: Entradas, Procesos, Salida.
 * 3. Pensar en pasos logicos como ejecutar el proceso (Reseta de cocina).
 * 4. Implementar en un lenguaje.
 *  
 * Pedir 3 numeros y mostrar cual es el mayor de los 3
 * 
 * Paso1:
 * Comparar 3 numeros y decir cual es el mayor.
 * 
 * Paso2:
 * Entrada: Variables a,b,c
 * Proceso: comparar los 3 numeros para encontrar el mayor
 * Salida: Mostrar el numero mayor.
 * 
 * Paso3: Logica
 * 1. Leer a, b, c.
 * 2.   Si a > b y a > c -> a es mayor
 *      Si b > a y b > c -> b es mayor
 *      Si no -> c es el mayor
 * 3. Moastrar resultado.
 * 
 * Implementar en lenguaje
 */

$a = 1;
$b = 5;
$c = 3;

if ($a > $b && $a > $c) {
    echo "El mayor es: $a";
} elseif ($b > $a && $b > $c) {
    echo "El mayor es: $b";
} else {
    echo "El mayor es: $c";
}

echo "<br>";

/*
  * Ejemplo 2.
  * Contar cuantos numeros del 1 al 100 son multiplos de 3

  * Paso2.
  * Entrada: 1 variable  inicializada en 1 -> inicio del conteo
  * Proceso: Utilizar un bucle del 1 al 100 y verificar si es divisible por 3
  * Salida: Mostrar los numeros que sean multiplo de 3.

  * Paso3: Logica
  * Inicializar el contador
  * Recorrer del 1 al 100
  * Si el numero es divisible por 3 -> mostrar numero
                                    -> aumentar contador.
  * Mostrar los multiplos encontrados.

  Implementacion en lenguaje
*/
$contador = 0;
for ($i = 1; $i <= 100; $i++) {
    if ($i % 3 == 0) {
        echo $i . "es multiplo de 3<br>";
        $contador++;
    }
}

echo "Hay $contador multimos de 3 entre 1 y 100";

/*
 * Pedir 10 números (uno por uno) y al final mostrar cuántos eran positivos, cuántos negativos y cuántos eran cero.
 * 
 * Paso2: 
 * - Entrada: variables positivo, negativo, ceros
 * - Proceso: Usar un bucle que se repita 10 veces, en cada iteracion verificar si el numero es mayor que 0, menor que 0 o igual que 0, aumenta el contador
 * 
 * - Salida:Mostrar positivos, negativos y ceros.
 * 
 * Paso3: Logica.
 * - variable numero que sera la entrada
 * - inicializar el contador en 0.
 * - recorre de 1 a 10
 * Si numero es < 0 -> negativo -> negativo++
 * Si numero > 0 -> positivo -> positivo++
 * Si numero == 0 -> cero
 
*/

$positivos = 0;
$negativos = 0;
$ceros = 0;

for ($i = 1; $i <= 10; $i++) {//Se usa un bucle for para repetir el bloque de codigo exactamente 10 veces, En cada vuelta (iteración), representa como si el usuario estuviera ingresando un número nuevo.
    $numero = rand(-10, 10);//rand() se usa para simular el ingreso de números. En este caso:Genera un número aleatorio entre -10 y 10.
    echo "Numero $i: $numero<br>";

    if ($numero > 0) {
        $positivos++;
    } elseif ($numero < 0) {
        $negativos++;
    } else {
        $ceros++;
    }
}

echo "<br>Total positivos $positivos<br>";
echo "<br>Total negativos $negativos<br>";
echo "<br>Total ceros $ceros<br>";
