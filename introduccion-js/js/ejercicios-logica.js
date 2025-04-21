/**
 * Ejercicio 1:
 * Programa una función que cuente el número de caracteres de una cadena de texto, ejemplo miFuncion("Hola Mundo") devolvera 10
*/

//TRADICIONAL
// Se declara una función llamada 'contarCaracteres', que toma un parámetro 'cadena'.
// Si no se pasa ningún valor al parámetro 'cadena' al llamar a la función, se asigna un valor por defecto de una cadena vacía ("").
const contarCaracteres = function (cadena = "") {
    // Evaluamos si la cadena es vacía o no se ha proporcionado ningún valor.
    // La condición '!cadena' se cumple si la cadena es vacía o es un valor falso (undefined, null, etc.).
    if (!cadena) {
        // Si la cadena está vacía o no se pasó ningún valor, mostramos un mensaje de advertencia.
        console.log("No ingresaste ninguna cadena");
    } else {
        // Si la cadena tiene contenido, mostramos el mensaje con la longitud de la cadena.
        console.log(`La cadena ${cadena} tiene ${cadena.length} caracteres`);
    }
};
// Llamamos a la función sin pasarle ningún argumento.
// En este caso, la cadena será vacía por defecto ("") y el flujo de ejecución entrará en el bloque 'if'.
contarCaracteres();  // Esto imprimirá en consola: "No ingresaste ninguna cadena"

// Llamamos a la función pasando la cadena "Programando en JavaScript" como argumento.
contarCaracteres("Programando en JavaScript");  // Esto imprimirá en consola: "La cadena 'Programando en JavaScript' tiene 25 caracteres"


//DE MANERA ABREVIADA
let contarCaracteres1 = (cadena = "") =>//Se declara una función llamada contarCaracteres1, que toma un parámetro llamado cadena. Si no se pasa ningún valor al parámetro cadena al llamar a la función, se asigna un valor por defecto de una cadena vacía ("").
    (!cadena) ? console.log("No ingresaste ninguna cadena") : console.log(`La cadena ${cadena} tiene ${cadena.length} caracteres`);//(!) Este es un operador lógico "Negacion", que se usa para evaluar si la cadena es falsa (vacía, undefined, null, etc.). Si la cadena está vacía o no se pasa ningún valor, la condición será true.
contarCaracteres1();
contarCaracteres1("Programando en JavaScript");

//Ejercicio 2:Programa una funcion que te devolvera el texto recortado segun el numero de caracteres indicados, ejemplo: miFuncion("Hola Mundo", 4) devolvera los primeros 4 caracteres.

let cortarCaracteres = (cadena = "", longitud = undefined) =>
    (!cadena)? console.log("No hay texto"):(longitud === undefined)
            ? console.log("No ingresaste la longitud para recortar el texto"): console.log(cadena.slice(0, longitud));

cortarCaracteres("Diego Reina",12);


