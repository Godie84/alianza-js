// Escapar caracteres
// En ocaciones el texto que se almacena en variables no es tan sencillo, coontienen caracteres especiales o saltos de línea etc.

/* Caracteres de escape
    \' Comilla simple
    \" Comilla doble
    \\ Barra invertida
    \n Salto de linea
    \r Retorno de carro
    \t Tabulacion
    \b Retroceso
    \f Salto de pagina
 */

var miCadena = 'Una frase con "comillas dobles" dentro de comillas dobles';
var miCadena1 = "Una frase con 'comillas simples' dentro de comillas simples";
var miCadena3 = 'Que \tfacil es incluir \\\'comillas simples\' \ny "comillas dobles"';
//console.log(miCadena3)

//------------------------------------------ ARRAYS ----------------------------------------------------
/* En ocaciones, a los arrays se les llama vectores, matrices, listas o cncluso arreglos. no obstante el termino array es el mas utilizado y es una palabra comunmente aceptada en el entorno de la programacion.

Un array es una coleccion de variables, que pueden ser todas del mismo tipo o de tipos diferentes. Los arrays se utilizan para almacenar multiples valores en una sola variable. 
*/
var dia1 = "Lunes";
var dia2 = "Martes";
var dia3 = "Miercoles";
var dia4 = "Jueves";
var dia5 = "Viernes";
var dia6 = "Sabado";
var dia7 = "Domingo";

/* Aunque el codigo anterior no es incorrecrto, si es poco eficiente y complica en exceso la programacion, si en ves de los dias de la semana se tubiera que guardar el nombre de los meses del año, el nombre de todos los paises del mundo, se tendrian que crear deceas de variables, lo cual es poco practico.

En lugar de crear una variable para cada dia de la semana, se puede utilizar un array para almacenar los nombres de los dias de la semana. */
var diasSemana = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"];
//console.log(diasSemana[0]); // "Lunes"

// => Ejercicio> Crear un array con los nombres de los meses del año y mostrar el nombre del mes de tu cumpleaños.

// ---------------------------- Notacion de corchetes ---------------------------------------
// Cadena = 5
// Indice = 4
var dia1 = "Lunes";
//console.log(dia1[0])
//console.log(dia1[1])
//console.log(dia1[2])
//console.log(dia1[3])
//console.log(dia1[4])
//console.log(dia1[-1])
//console.log(dia1[5])

// ---------------------- Inmutabilidad de cadenas de caracteres ---------------------------------------
// => no se puede cambiar
var miCadena = "Jola Mundo";
miCadena[0] = "H";
//console.log(miCadena);

var miCadena = "Jola Mundo";
miCadena = "Hola Mundo";
//console.log(miCadena);

// ---------------------------- Notacion de corchetes ultimo caracter -------------------------------------
// El ultimo indice de la cadena es longitud -1
var c = 2;
var cadena = "javascript";
//console.log(cadena[cadena.length -c])

// ---------------------------- Arreglos - Listas -------------------------------------
var miArreglo = ["Diego", 24]
//console.log(miArreglo);

// ---------------------------- Arreglos - Listas - Anidados -------------------------------------

var estudiantes = [["Diego", 25], ["Ana", 20]];
//console.log(estudiantes[1][1]);

//var otroArreglo = [10, 20, 30]
//console.log(otroArreglo);
//console.log(otroArreglo[0]);
//console.log(otroArreglo[1]);
//console.log(otroArreglo[2]);

//var suma = otroArreglo[0]+otroArreglo[1]+otroArreglo[2];
//console.log(suma);

// ---------------------------- Modificar datos de un arreglo -------------------------------------
var otroArreglo = [10, 20, 30]
otroArreglo[0] = 80;
console.log(otroArreglo);

// ---------------------------- Acceder a arreglos multidimencionales ----------------------------------
var miArreglo = [[1, 2, 3], [4, 5, 6], [7, 8, 9]];

//Arreglo [[1,2,3], [4,5,6], [7,8,9]];
// Indice     0        1        2
// Indice interno
//console.log(miArreglo[0]);
//console.log(miArreglo[1]);
//console.log(miArreglo[2]);

//console.log(miArreglo[2][0]);

// ------------------------- Agregar un elemento del arreglo -------------------------------
//push()
var estaciones = ["Invierno", "Otoño", "Primavera"];
estaciones.push("Verano");
//console.log(estaciones);

// ------------------------- Remover un elemento del arreglo -------------------------------
//pop() => Elimina el ultimo elemento
estaciones.pop();
//console.log(estaciones);

// ------------------------- Remover el primer elemento del arreglo -------------------------------
//shift() => Remueve el primer elemento
estaciones.shift();
//console.log(estaciones);

// ------------- Agregar un elemento en primer posision del arreglo -------------------------------
//unshift() => Remueve el primer elemento
estaciones.unshift("Invierno");
//console.log(estaciones);

// ------------------------------- BOOLEANOS ---------------------------------
// VARIABLES DE TIPO LOGICO
// Se utilizan para almacenar valores de verdadero o falso.
var clienteResgistrado = false;
var usuarioActivo = true;

// ------------------------------- Asignacion ---------------------------------

var x = 5; // Asigna el valor 5 a la variable x
var y = 10; // Asigna el valor 10 a la variable y
var x = y; // Asigna el valor de y a x
//console.log(x); // 10
// Operadores de asignacion
// = Asigna un valor a una variable
// += Suma un valor a una variable
// -= Resta un valor a una variable
// *= Multiplica un valor a una variable
// /= Divide un valor a una variable
// %= Asigna el resto de una division a una variable
// **= Asigna el resultado de elevar un numero a una potencia a una variable

// -------------------------- Incremento y decremento------------------------
/*
Los operadores de incremento y decremento se utilizan para aumentar o disminuir en una unidad el valor de una variable.
*/
var a = 5;
a = a + 1; // Incrementa el valor de a en 1
//console.log(a); // 6
a++; // Incrementa el valor de a en 1
//console.log(a); // 7

a--; // Decrementa el valor de a en 1
//console.log(a);
a = a - 1; // Decrementa el valor de a en 1
//document.writeln(a); // 5

// ------------------------------- OPERADORES LOGICOS ---------------------------------
/*
Los operadores logicos son inprescindibles para realizar aplicaciones complejas ya que se utilizan para tomar decisiones sobre las instrucciones que deberia ejecutar el programa en funcion de ciertas condiciones.
El resultado de cualquier operacion que utilice operadores logicos es un valor booleano, es decir, verdadero o falso.

Negacion (!): El operador de negacion se utiliza para invertir el valor de una expresion logica.
*/
var visible = true;
var oculto = !visible; // Invierte el valor de visible
//console.log(oculto);

/*
Si la variable original es de tipo booleano, es muy sencillo obtener su negacion. Sin embargo, que sucede cuando la variable es un numero o una cadena de texto? En estos casos, JavaScript considera que el valor 0, null, undefined, NaN o una cadena de texto vacia es falso, y cualquier otro valor es verdadero.
*/
var cantidad = 0;
vacio = !cantidad; // Invierte el valor de numero
//console.log(vacio); // true

cantidad = 5;
vacio = !cantidad; // Invierte el valor de numero
//console.log(vacio); // true

var mensaje = "";
console.log(mensaje); // true
mensajeVacio = !mensaje; // Invierte el valor de mensaje
//console.log(mensajeVacio); // true

// -------------------------------------- AND --------------------------------------------

/*AND (&&): El operador AND se utiliza para evaluar dos expresiones logicas y devuelve verdadero si ambas son verdaderas.
AND obtiene su resultado combinando dos valores booleanos. el operador se indica mediante dos simbolos de ampersand (&) y se utiliza para combinar dos expresiones logicas. (&&) y su resultado es true si ambas expresiones son verdaderas, y false en cualquier otro caso.
*/
var valor1 = true;
var valor2 = false;
resultado = valor1 && valor2; // Evalua valor1 y valor2
//console.log(resultado); // false

var valor1 = true;
var valor2 = true;
resultado = valor1 && valor2; // Evalua valor1 y valor2
//console.log(resultado); // true

// ------------------------------- OR ---------------------------------
//OR (||): El operador OR se utiliza para evaluar dos expresiones logicas y devuelve verdadero si al menos una de ellas es verdadera.
var valor1 = true;
var valor2 = false;
resultado = valor1 || valor2; // Evalua valor1 y valor2
//console.log(resultado); // true

var valor1 = false;
var valor2 = false;
resultado = valor1 || valor2; // Evalua valor1 y valor2
//console.log(resultado); // false

// ------------------------------- ARITMETICOS ---------------------------------
/*
Los operadores aritmeticos se utilizan para realizar operaciones matematicas con variables.
Estos operadores tambien se pueden combinar con los operadores de asignacion para simplificar la escritura del codigo.
=+ Suma y asigna
=- Resta y asigna
=* Multiplica y asigna
=/ Divide y asigna
=% Asigna el resto de una division
=** Asigna el resultado de elevar a una potencia
*/

var a = 5;
var b = 2;
var suma = a + b; // Suma a y b
var resta = a - b; // Resta a y b
var multiplicacion = a * b; // Multiplica a y b
var division = a / b; // Divide a y b
var resto = a % b; // Obtiene el resto de la division de a entre b
var potencia = a ** b; // Eleva a a la potencia de b
//console.log(suma); // 7
//console.log(resta); // 3
//console.log(multiplicacion); // 10
//console.log(division); // 2.5
//console.log(resto); // 1
//console.log(potencia); // 25

// ------------------------------- RELACIONALES ---------------------------------
/*
Los operadores relacionales se utilizan para comparar dos valores y devuelven un valor booleano.
> Mayor que
< Menor que
>= Mayor o igual que
<= Menor o igual que
== Igual que
=== Igual que (estricto)
!= Diferente que
!== Diferente que (estricto)
*/
var a = '5';
var b = 5;
resultado1 = a >= b; // Compara si a es mayor o igual que b
resultado2 = a <= b; // Compara si a es menor o igual que b
resultado3 = a == b; // Compara si a es igual que b
resultado4 = a != b; // Compara si a es diferente que b
resultado5 = a === b; // Compara si a es igual que b y del mismo tipo
resultado6 = a !== b; // Compara si a es diferente que b y de diferente tipo

//console.log(resultado6);

let num1 = '5';
let num2 = 5;
//console.log(num1 != num2);

let num3 = '5';
let num4 = 5;
console.log(num3 !== num4);

var texto1 = "a";
var texto2 = "b";
resultado = texto1 < texto2;

//console.log(texto1.charCodeAt(0));
//console.log(texto2.charCodeAt(0));

// ------------------------ ESTRUCTURAS DE CONTROL DE FLUJO ---------------------------------
/*
Las estructuras de control de flujo son bloques de codigo que permiten controlar el flujo de ejecucion de un programa. Estas estructuras permiten tomar decisiones, realizar repeticiones y ejecutar instrucciones en funcion de ciertas condiciones.

Estructura if:
La estructura if se utiliza para ejecutar un bloque de codigo si una condicion es verdadera.
if: operador que evalua una condicion
condicion: Es una expesion que se evalua
if (condicion) {
    codigo que se ejecuta si la condicion es verdadera
} 
*/
var mostrarMensaje = true;
if (mostrarMensaje) {
    console.log("Hola, Mundo!");
}

var mostrarMensaje = true;
if (mostrarMensaje == true) {
    console.log("Hola, Mundo!");
}

// Saludo dependiendo la hora del dia
var hora = new Date().getHours(); // Metodo para obtener la hora del sistema

if (hora < 12) { //Si es verdadera ejecuta el codigo del bloque
    console.log("Buenos dias");
} else if (hora < 18) { // Evalua una nueva condicion solo si las anteriores fueron falsas
    console.log("Buenas tardes");
} else { // Si todas las anteriores fueron falsas, ejecuta el codigo del bloque
    console.log("Buenas noches");
}

/**
 * OPERADOR TERNARIO
 * condición ? valor_si_true : valor_si_false;
 * Cuándo usar if-else y cuándo usar el operador ternario
if-else es más adecuado cuando:
La lógica es más compleja o tiene múltiples condiciones.
Hay varias acciones que se deben ejecutar dentro de cada rama.
La claridad y la legibilidad son más importantes que la concisión.

Operador ternario es útil cuando:
Tienes una condición simple con dos posibilidades (es decir, una acción cuando la condición es verdadera y otra cuando es falsa).
Buscas concisión y una sola línea de código para una asignación rápida o retorno.
*/

let edad = 12;
let eresMayor = (edad >= 18) ? "Eres mayor de edad" : "Eres menor de edad";
console.log(eresMayor);

// ------------------------ ESTRUCTURA FOR ---------------------------------

/**
 * Las estructuras if y else if no son muy eficientes cuando se necesita repetir un bloque de codigo un numero determinado de veces.
Ejemplo: Si se requiere mostrar un mensaje 5 veces, se tendria que escribir el codigo 5 veces.
La estructira for permite realizar este tipo de repeticiones (tambien llamadas bucle) de una forma mas sencilla.
No obstante su definicion formal no es tan sencilla como la de if y else if.

La estructura for se utiliza para repetir un bloque de codigo un numero determinado de veces.

for (inicializacion; condicion; incremento) {
    codigo que se ejecuta en cada iteracion
}
La idea del funcionamiento de un bucle es la siguiente:
"Mientras la condicion indicada se siga cumpliendo, repite la ejecucion de las instrucciones definidas dentro del for. Ademas, despues de cada iteracion actualiza el valor de las variables que se utilizan en la condicion."

Componentes del for:
Inicialización: Se ejecuta solo una vez al comienzo del bucle. Aquí es donde defines las variables que controlarán la condición.
Condición: Es la expresión que se evalúa antes de cada iteración. Mientras esta condición sea verdadera, el bucle continuará ejecutándose.
Actualización: Se ejecuta al final de cada iteración, justo antes de volver a evaluar la condición. Es común actualizar variables como contadores en este paso.

Ejemplo de un bucle for:
Supongamos que queremos imprimir los números del 1 al 5 en la consola:
 */

for (let i = 1; i <= 5; i++) {
    //console.log(i);
}

/*
Desglosando el bucle:
Inicialización: let i = 1 → Se establece la variable i con valor 1.
Condición: i <= 5 → El bucle seguirá ejecutándose mientras i sea menor o igual a 5.
Actualización: i++ → Después de cada iteración, el valor de i se incrementa en 1.
Iteraciones del bucle:

Primera iteración: i = 1, la condición i <= 5 es true, se imprime 1 y luego i++, lo que hace que i se convierta en 2.
Segunda iteración: i = 2, la condición i <= 5 es true, se imprime 2 y luego i++, lo que hace que i se convierta en 3.
Tercera iteración: i = 3, la condición i <= 5 es true, se imprime 3 y luego i++, lo que hace que i se convierta en 4.
Cuarta iteración: i = 4, la condición i <= 5 es true, se imprime 4 y luego i++, lo que hace que i se convierta en 5.
Quinta iteración: i = 5, la condición i <= 5 es true, se imprime 5 y luego i++, lo que hace que i se convierta en 6.
Condición fallida: i = 6, la condición i <= 5 es false, por lo que el bucle termina.
*/

//-------------------------------- QUE ES UN METODO? ------------------------------------------------------

//Un método en programación es una función asociada a un objeto o clase que realiza una tarea específica. Los métodos son una parte fundamental de la programación orientada a objetos, pero también se utilizan en otros paradigmas de programación.

/* 
Definición de método:
Un método es una función que está asociada a un objeto y que puede acceder a los datos de ese objeto o modificar su estado.
En otras palabras, un método es una acción que un objeto puede realizar, y generalmente se define dentro de la estructura de ese objeto.
Métodos en JavaScript
En JavaScript, los métodos son funciones que se definen dentro de un objeto. Pueden operar sobre las propiedades del objeto y realizar diversas tareas. Los métodos se invocan usando la notación de punto . o la notación de corchetes [].
*/
let persona1 = {
    nombre: "Juan", edad: 30, saludar: function () {
        //console.log("Hola, mi nombre es " + this.nombre);
    }
};

// Llamando al método
persona1.saludar();  // "Hola, mi nombre es Juan"

let persona3 = {
    nombre: "Jorge",
    edad: 35,
    saludar() {
        //console.log("Hola, mi nombre es " + this.nombre);
    }
};

persona3.saludar();  // "Hola, mi nombre es Juan"

/*
En este caso:

saludar es un método del objeto persona.
El método saludar() accede a la propiedad nombre del objeto persona usando la palabra clave this, que se refiere al objeto en el que el método está siendo invocado.

Sintaxis moderna de los métodos en objetos (ES6+):
A partir de ECMAScript 6 (ES6), también se puede escribir métodos de una forma más concisa:

let persona = {
  nombre: "Juan",
  edad: 30,
  saludar() {
    console.log("Hola, mi nombre es " + this.nombre);
  }
};

// Llamando al método
persona.saludar();  // "Hola, mi nombre es Juan"
La diferencia es que no es necesario escribir la palabra clave function, simplemente se definen los métodos con un nombre seguido de paréntesis y llaves.
*/

//-------------------------------------------------------------------------------
/**
 * /*
En programación, un objeto es una colección de propiedades y métodos. Un objeto permite agrupar datos y funciones que pertenecen a una entidad o concepto específico. En JavaScript, los objetos son una de las estructuras de datos más importantes, y puedes usarlos para representar casi cualquier cosa: una persona, un coche, una película, etc.

1. ¿Qué es un objeto?
Un objeto es una entidad que contiene un conjunto de propiedades y métodos. Las propiedades son valores asociados con el objeto, y los métodos son funciones asociadas a ese objeto.

Propiedades: Son los valores que están asociados con una clave (o nombre). Estos valores pueden ser de cualquier tipo (números, cadenas, arrays, etc.).
Métodos: Son funciones que están asociadas con el objeto y pueden acceder o modificar las propiedades del objeto.
2. Sintaxis de un objeto en JavaScript
Los objetos en JavaScript se definen utilizando llaves {} y sus propiedades se definen como pares de clave (también llamada key) y valor (key: value).

Ejemplo básico de un objeto:
*/
let persona4 = {
    nombre: "Ana",
    saludar() {
        console.log("Hola, mi nombre es " + this.nombre);
    }
};

persona4.saludar();  // "Hola, mi nombre es Ana"

let user = {
    "username": "Diego",
    "score": 70.4,
    "hours": 14,
    "proffesional": true,
    "friends": ['Andres', 'Carlos', 'Mauricio']
};
console.log(user); 

const objA = {clave:"valor"};
console.log(objA);
//Dentro de un objeto a las variables se les llama atributos/propieadaes y a las funciones se les llama metodos.
//Ejemplo:
//Declarando una constante que se le asigna el objeto datosPerson
const datosPerson = {
    //propiedad: valor
    nombre: "Diego",
    apellido: "Reina",
    //Propiedad: Lista o arreglo de 2 elementos
    pasatiempo: ["Cine", "Programar"],
    //Propiedad: objeto anidado con los datos de contacto
    contacto: {
        telefono: "123456789",
        correo: "diego@gmail.com"
    },
    //Define el metodo llamado saludando dentro del objeto datosPerson, Un método es una función que está asociada a un objeto. En este caso, el método saludando simplemente imprime "Hola:)" en la consola.
    saludando() {//esto es un metodo
        console.log(`Hola:)`)
    },
    //Define el metodo traerNombre que imprime un mensaje que incluye el nombre, apellido, pasatiempo y datos de contacto de la persona, La palabra clave this se utiliza para acceder a las propiedades del objeto dentro del método. 
    traerNombre: function () {
        console.log(`Hola, me llamo ${this.nombre} ${this.apellido} y me gusta ir a ${this.pasatiempo[0]} y ${this.pasatiempo[1]}, mis datos de contacto son: Numero celular ${this.contacto.telefono} y correo${this.contacto.correo}`);
    }
}

console.log(datosPerson);//Imprime el objeto completo
console.log(datosPerson.nombre);//imprime el valor de la propiedad nombre
console.log(datosPerson.apellido);//imprime el valor de la propiedad apellido
console.log(datosPerson.pasatiempo);//Imprime el valor de la propiedad pasatiempos del objeto datosPerson
console.log(datosPerson.pasatiempo[0]);//Imprime el primer elemento del arreglo pasatiempo
console.log(datosPerson.contacto.telefono);//Imprime el valor de la propiedad "telefono" del objeto contacto que esta dentro de datosPerson.
datosPerson.saludando;//llama al método saludando del objeto datosPerson, lo que hace que se imprima "Hola:)" en la consola.
datosPerson.traerNombre();// llama al método traerNombre del objeto datosPerson, lo que hace que se imprima el mensaje con la información de la persona en la consola.

console.log(Object.keys(datosPerson));//utiliza el método Object.keys() para obtener un arreglo con los nombres de todas las propiedades (claves) del objeto datosPerson y lo imprime en la consola.
console.log(Object.values(datosPerson));//utiliza el método Object.values() para obtener un arreglo con todos los valores de las propiedades del objeto 
console.log(datosPerson.hasOwnProperty("nombre"));//utiliza el método hasOwnProperty() para verificar si el objeto datosPerson tiene una propiedad llamada "nombre". Como la tiene, imprime true en la consola.
console.log(datosPerson.hasOwnProperty("nacimiento"));//utiliza hasOwnProperty() para verificar si el objeto datosPerson tiene una propiedad llamada "nacimiento". Como no la tiene, imprime false en la consola.

// --------------------------------------------------------------------------------------------

/**
 * for...in
El bucle for...in en JavaScript se utiliza para iterar sobre las propiedades enumerables de un objeto, o sobre los índices de los elementos en un array. A diferencia del bucle for, que se utiliza para iterar sobre elementos con un contador, el bucle for...in se enfoca en las claves o índices del objeto o array.
for (variable in objeto) {
código que se ejecuta en cada iteración
}
variable: es la variable que tomará cada propiedad del objeto o cada índice del array en cada iteración.
objeto: es el objeto o array sobre el que se está iterando.

Supongamos que tenemos un objeto con varias propiedades, y queremos iterar sobre sus claves:
 */
let profesor = { nombre: "Juan", edad: 30, ciudad: "Madrid" };

for (let clave in profesor) {
    console.log(clave + ": " + profesor[clave]);
}


