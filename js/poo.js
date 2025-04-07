class Persona {
    constructor(nombre, edad) {
        this.nombre = nombre;
        this.edad = edad;
    }

    saludar() {
        console.log(`Hola, soy ${this.nombre} y tengo ${this.edad} años.`);
    }
}

const juan = new Persona("Juan", 30);
const maria = new Persona("María", 25);
juan.saludar();

//Crear una clase Animal con propiedades y métodos.

class Animal {
    constructor(nombre) {
        this.nombre = nombre;
    }

    hablar() {
        console.log(`${this.nombre} hace un ruido.`);
    }
}

// Heredar una clase Perro de Animal y sobreescribir un método.
class Perro extends Animal {
    constructor(nombre, raza) {
        super(nombre, raza); // Llama al constructor de la clase padre (Animal)
        this.raza = raza;
    }
    hablar() {
        console.log(`${this.nombre} dice: ¡Guau!, su raza es ${this.raza}.`);
    }
}

const fido = new Perro("Fido", "Labrador");
fido.hablar(); // Fido dice: ¡Guau!

const limon = new Perro("Limon", "Bulldog");
limon.hablar(); // Limon dice: ¡Guau!

// EJERCICIO
/**
 * Ejercicio 1: Clase Libro
Crea una clase Libro con propiedades:
titulo
autor
anioPublicacion

Agregar un metodo describir() que muestre lo siguiente:
“El libro [titulo] fue escrito por [autor] en el año [anioPublicacion].”

Crea 2 instancias de la clase y llama al método describir().

ejercicio 2: Cuenta bancaria
Crear una clase CuentaBancaria con métodos depositar(), retirar() y consultarSaldo().
Implementar validaciones y prueba de objetos.

 */