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
 * - Entrada:
 * - Proceso:
 * - Salida:
 * 
 * Paso3: Logica.
 
*/

