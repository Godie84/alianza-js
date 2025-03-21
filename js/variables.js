// Comentario de una linea
/*  Comentario de varias lineas
    continua comentario de varias lineas
*/

//  Declarar variables
// se puede usar, pero las buenas practicas dictan que se deben declarar variables con let

//var a = 10; // Declaracion de variable
//let b = 20; // Declaracion de variable
//const c = 10; // Declaracion constante y asigno el valor de 10

// Variables => var, let, const => palabras reservadas para declarar variables
// var => variable global
// undefined => variable sin valor
// null => variable sin valor
// boolean => true, false
// number => 1, 2, 3, 4, 5, 3.5
// string => 'hola', "hola", `hola`
// object => {nombre: 'Juan', apellido: 'Perez'}

var x = 5; // Declaro variable x y le asigno valor 5
//console.log(x);

// Declarar una variable con el nombre e imprimir un mensaje de saludo con la variable, ¿Hola Diego como estas?
var nombre = 'Diego';
//console.log('Hola ' + nombre + ' ¿como estas?'); // Concatenar texto con variable
//console.log('Hola' + ' ' + nombre + ' ' + '¿como estas?'); // Concatenar texto con variable

var num1 = 50;
var num2 = 10;
//var resultado = num1 + num2;
//console.log(num1 + num2); // Suma
//console.log(num1 - num2); // Resta
//console.log(num1 * num2); // Multiplicacion
//console.log(num1 / num2); // Division
//console.log(num1 % num2); // Modulo
//var num1 = 100;
//var num1 = 150; // Siempre se va a tomar el ultimo valor asignado
//console.log(num1); // 100

c = 20; // No se puede reasignar valor a una constante
// console.log(c);

var A = 10; 
var nombrePersona = 20;
// +=, -=, *=, /=, %=

// ---------------------------- EJERCICIOS ----------------------------

var sustantivo = 'perro';
var adjetivo = 'negro';
var verbo = 'corrió';
var adverbio = 'rapidamente';

/* 
Concatenar las cadenas para crear la siguiente oracion => El perro negro corrió rapidamente a la tienda
*/

/* 
Concatenar el resultado de la suma con un mensaje: 
=>  El resultado de 10 + 5 es 15
*/

/* 
Concatenar el resultado de la resta con un mensaje: 
=>  La diferencia entre 20 y 8 es 12
*/

/* 
Concatenar el resultado de la multiplicación con un mensaje: 
=> El producto de 6 y 7 es 42
*/

// +=, -=, *=, /=, %= // Operacion y asignacion
var saldo = 3000;
saldo /= 500;
// console.log(saldo);

// -------------- CONDICIONALES ------------------
/* 
if (condicion) {
    codigo que se ejecuta si la condicion es verdadera
} else {
    codigo que se ejecuta si es falsa
}

if: operador que evalua una condicion
condicion: Es una expesion que se evalua
*/

// Saludo dependiendo la hora del dia
var hora = new Date().getHours(); // Metodo para obtener la hora del sistema

if (hora < 12) { //Si es verdadera ejecuta el codigo del bloque
    console.log("Buenos dias");
} else if (hora < 18) { // Evalua una nueva condicion solo si las anteriores fueron falsas
    console.log("Buenas tardes");
} else { // Si todas las anteriores fueron falsas, ejecuta el codigo del bloque
    console.log("Buenas noches");
}

