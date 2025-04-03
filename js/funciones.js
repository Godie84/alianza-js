/**
*FUNCIONES:
 Una funcion es un bloque de codigo, autocontenido que se puede definir una vez al ejecutar en cualquier momento.
 Opcionalmente, una funcion puede aceptar parametros y devolver un valor.

 Las funciones pueden ser predefinidas con el lenguaje, pero se pueden crear funciones propias.

 Las funciones en JavaScript son un tipo especial de objetos.

 Funciones: Bloque de codigo que se declara una vez y se puede reutilizar cuantas veces sea necesaria

 Funcion Declarada:
*/
function name(params) {//palabra reservada, nombre funcion, (parametros)

}

function saludar() {
    console.log("Hola, como estan?");
}
//Invocacion de la funcion
saludar();

//Funcion que recibe valores o parametros
function saludo(persona) {
    console.log(persona);
    console.log('Hola como estas' + ' ' + persona);
}
saludo("Diego");
saludo("Juan")

function add(n1, n2) {
    console.log(n1 + n2);
}
add(5, 300);

//Funcion que retorna valores
function valorR() {
    return 19;
}
let valorFuncion = valorR();
console.log(valorFuncion);

//Funcion declarada

function funDeclare() {
    console.log("Esto es una funcion declarada, puede invocarse en cualquier parte de nuestro código, incluso antes de que la funcion sea declarada.")
}
funDeclare();

//Funcion expresada
const funExpresada = function () {
    console.log("Es una funcion que se le ha asignado como valor una variable, si invocamos esta funcion antes de su definicion JS nos dirá...");
}
funExpresada();
//La funcion expresada no se puede acceder antes de la funcion
/*Ejercicios:
Escribir un codigo de una funcion a la que se pasa como parametro un numero entero y devuelve como resultado una cadena de texto que indica si el numero es par o impar. Mostrar por pantalla el resultado devuelto por la funcion

Definir una funcion que muestre informacion sobre una cadena de texto que se le pasa como argumento. A partir de la cadena que se le pasa, la funcion determina si esa cadena esta formada solo por mayusculas, solo por minusculas o por una mezcla de ambas.

Definir una funcion que determine si la cadena de texto que se le pasas como parametro es un palindromo, es decir, si se lee de la misma forma desde la izquierda y desde la derecha, Ejemplo: "La ruta nos aporto otro paso natural"
*/

// Ejercicio 1
let numero = 2;  // Puedes cambiar el valor de esta variable para probar con otros números
let resultado = parImpar(numero);

// Mostrar el resultado en la consola
console.log("El número " + numero + " es " + resultado);

// Función que determina si un número es par o impar
function parImpar(numero) {
    if (isNaN(numero)) {
        return "no es un número válido";
    }
    if (numero == null) {
        return "no es valido";
    }

    if (numero % 2 == 0) {
        return "par";
    } else {
        return "impar";
    }
}



//Ejercicio 2: Definir y mostrar información sobre las cadenas sin utilizar alert
function info(cadena) {
    let resultado = "La cadena \"" + cadena + "\" ";
    // Comprobar mayúsculas y minúsculas
    if (cadena == cadena.toUpperCase()) {
        resultado += " está formada sólo por mayúsculas";
    } else if (cadena == cadena.toLowerCase()) {
        resultado += " está formada sólo por minúsculas";
    } else {
        resultado += " está formada por mayúsculas y minúsculas";
    }
    return resultado;
}
// Mostrar los resultados de las cadenas en la consola
console.log(info("OVNI = OBJETO VOLADOR NO IDENTIFICADO"));
console.log(info("En un lugar de la mancha..."));



//Ejercicio 3: Función para verificar si una cadena es un palíndromo
function palindromo(cadena) {
    let resultado = "La cadena \"" + cadena + "\" \n";
    // Pasar a minusculas la cadena
    let cadenaOriginal = cadena.toLowerCase();
    // Convertir la cadena en un array
    let letrasEspacios = cadenaOriginal.split("");
    // Eliminar los espacios en blanco
    let cadenaSinEspacios = "";
    for (let i in letrasEspacios) {
        if (letrasEspacios[i] != " ") {
            cadenaSinEspacios += letrasEspacios[i];  // Aseguramos que no se pierdan las letras
        }
    }
    let letras = cadenaSinEspacios.split("");//El método split() se utiliza en cadenas para dividirlas en un array de subcadenas. Cuando se le pasa una cadena vacía ("") como argumento, divide la cadena original en un array donde cada elemento es un carácter individual.
    let letrasReves = cadenaSinEspacios.split("").reverse();//El método reverse() invierte el orden de los elementos de un array. Es importante notar que este método modifica el array original.
    // Verificar si las letras son iguales
    let iguales = true;
    for (let i in letras) {
        if (letras[i] !== letrasReves[i]) {
            iguales = false;  // Si alguna letra no coincide, no es un palíndromo
            break;
        }
    }
    if (iguales) {
        resultado += " es un palíndromo";
    } else {
        resultado += " no es un palíndromo";
    }
    return resultado;
}
// Mostrar los resultados de las cadenas palíndromas en la consola
console.log(palindromo("La ruta nos aporto otro paso natural"));
console.log(palindromo("Esta frase no se parece a ningun palindromo"));

//------------------------------------ o --------------------------------------

/**
 * ARROW FUNTIONS - FUNCINOES FLECHA - FUNCIONES ANONIMAS
 * Funcnioes flecha son una nueva forma de definir funcniones anonimas
 * En una funcnion anonima, no se puede declarar llamar a la funcnion antes de ser declarada, caso contrario en una funcion expresada, lo cual puede generar errores
 * Una arrow function (función flecha) es una forma abreviada de escribir funciones en JavaScript introducida en ES6 (ECMAScript 2015). Se caracteriza por la sintaxis con flecha (=>) y tiene algunas diferencias importantes respecto a las funciones tradicionales.
*/

function sumar(a, b) {
    return a + b;
}

// Arrow function equivalente
const sumar1 = (a, b) => a + b;
console.log(2, 3)
// Con un solo parámetro (paréntesis opcionales)
const duplicar = x => x * 2;
console.log(10);
// Sin parámetros (paréntesis requeridos)
const saludar1 = () => "Hola mundo";
console.log(saludar1());

// Función tradicional
function suma(a) {
    return a + 100;
}

console.log(suma(5));

// Desglose de la función flecha

// 1. Elimina la palabra "function" y coloca la flecha entre el argumento y el corchete de apertura.
(a) => {
    return a + 100;
}

// 2. Quita los corchetes del cuerpo y la palabra "return" — el return está implícito.
(a) => a + 100;

// 3. Suprime los paréntesis de los argumentos
a => a + 100;

// Función tradicional
function name (a, b){
    return a + b + 100;
  }
  
  // Función flecha
  let miFuncion1 = (a, b) => a + b + 100;
  console.log(miFuncion1(5,5));
  
  // Función tradicional (sin argumentos)
  let a1 = 4;
  let b1 = 2;
  function nombre (){
    return a1 + b1 + 100;
  }
  console.log(nombre());
  
  // Función flecha (sin argumentos)
  let a = 4;
  let b = 2;
  let miFuncion = () => a + b + 100;
  console.log(miFuncion())