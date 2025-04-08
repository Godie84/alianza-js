/**
 * PRINCIPIOS BASICOS DE POO
 * 1. Abstracción: Ocultar los detalles de implementación y mostrar solo la funcionalidad.
 * 2. Encapsulamiento: Agrupar datos y métodos que operan sobre esos datos dentro de una clase.
 * 3. Herencia: Permitir que una clase herede propiedades y métodos de otra clase.
 * 4. Polimorfismo: Permitir que diferentes clases respondan a la misma función de diferentes maneras.
 * 5. Composición: Crear clases complejas combinando otras clases más simples.
 * 6. Delegación: Permitir que un objeto delegue ciertas tareas a otro objeto.
 * 7. Cohesión: Mantener los métodos y atributos relacionados dentro de una misma clase.
 * 8. Acoplamiento: Minimizar la dependencia entre diferentes clases y módulos.

 * Que deberia tener un lenguaje para ser considerado orientado a objetos?
1. La capacidad de modelar problemas a traves de objetos.
Caracteristicas que un lenguaje debe cumplir para este requerimiento.
-Asociacion: Objetos con la capacidad de referir a otros objetos. es decir poder unir dos objetos y poder enlazarlos en codigo.
- Agregacion: Permitir que un objeto contenga otros objetos. es decir poder crear un objeto que contenga otros objetos dentro de el.
- Composicion: Permitir que un objeto contenga otros objetos y que estos objetos no puedan existir sin el objeto padre. es decir poder crear un objeto que contenga otros objetos dentro de el y que estos objetos no puedan existir sin el objeto padre.

2. Soporte de algunos principios que garanticen la modularidad y reusabilidad del codigo.
- ENCAPSULACION: Es el proceso de ocultar los detalles internos de una clase y exponer solo lo necesario.
- Permite proteger los datos y métodos de una clase, evitando el acceso directo desde el exterior.
- Concentrar datos y funcionalidad ocultando los detalles internos.
HERENCIA: Permitir que una clase herede propiedades y métodos de otra clase.
- Permite crear nuevas clases basadas en clases existentes, reutilizando código y evitando la duplicación.
POLIMOPRFISMO: Permitir que diferentes clases respondan a la misma función de diferentes maneras.
- Capacidad de crear objetos con distintos tipos de datos y distintas estructuras pero que al final respondan a la misma función.
- Permite que una función o método pueda actuar de diferentes maneras según el objeto que lo invoque.

El proposito de la POO es modelar a travez de objetos, simplificando la realizar. a esto se le conoce como abstracción.
ABSTRACCION: Ocultar los detalles de implementación y mostrar solo la funcionalidad.
- Permite centrarse en lo que un objeto hace en lugar de cómo lo hace.
- Facilita la comprensión del sistema al reducir la complejidad y centrarse en los aspectos relevantes.
*/

//ASOCIACION
class Persona {
    constructor(nombre, apellido) {
        this.nombre = nombre;
        this.apellido = apellido;
    }
}

const usuario1 = new Persona("Diego", "Reina");
const usuario2 = new Persona("Jorge", "Ramirez");
//Relacion de asociacion entre dos objetos
//usuario2.parent = usuario1; // Asignar una relación de asociación entre dos objetos
//console.log(usuario1);
//console.log(usuario2);


//AGREGACION: Forma de asociacion en el que relacion 2 objetos o mas, pero algunos objetos tienen un rol mucho mayor que otros, el que tiene el rol mayor determina el contenedor de los demas objetos y las relaciones que tienen estos, el objeto que tiene el rol mayor que puede contener a otros es llamado "aggregate" y los objetos que contiene son llamados "componentes". Pero cada uno puede tener una vida independiente, es decir que si el objeto "aggregate" se destruye los objetos "componentes" pueden seguir existiendo.

const empresa = {//Agrega los usuarios a la empresa
    //Propiedades de la empresa
    nombre: "Tech Solutions",
    empleados: [], // Array para almacenar los empleados    
}

empresa.empleados.push(usuario1); // Agregar un empleado a la empresa
empresa.empleados.push(usuario2); // Agregar otro empleado a la empresa
// Mostrar información de la empresa y sus empleados
//console.log(usuario1);
//console.log(usuario2);
console.log(empresa);

//COMPOSICION: Se habla de un tipo fuerte de agregacion en el que muchos objetos pueden pertenecer a otros objetos que tiene un rol mayor, pero ninguno de estos va a tener uina vida independiente.

const person = {
    //Propiedades de la empresa
    nombre: "Juanito",
    apellido: "Pérez",
    direccion: {//Composición: la dirección es parte de la persona y no puede existir sin ella
        //Propiedades de la direccion
        calle: "Calle Falsa",
        numero: 123,
        ciudad: "Springfield",
    }
}

//PRINCIPIOS DE POO
//ENCAPSULACION: Es el proceso de ocultar los detalles internos de una clase y exponer solo lo necesario. El objetivo es simplificar el uso de un objeto y proteger su estado interno. En JavaScript, esto se puede lograr utilizando closures o módulos para encapsular datos y métodos.

// const nombreEmpresa = {//Agrega los usuarios a la empresa
//     //Propiedades de la empresa
//     nombre: "Soluciones integrales",
//     empleados: [], // Array para almacenar los empleados    
//     clasificarEmpleados: function () {}// Método para clasificar empleados según su rol
// }

// nombreEmpresa.clasificarEmpleados = 'Desarrollador'; // Asignar un rol a un empleado
// nombreEmpresa.clasificarEmpleados()

function Empresa(nombre) {
    let empleados = []; // Array privado para almacenar empleados
    this.nombre = nombre;

    this.mostrarEmpleado = function () {//Con este constructor puedo acceder a los empleados de la empresa
        return empleados;
    };

    this.agregarEmpleados = function (empleado) {//Con este constructor puedo agregar empleados a la empresa
        empleados.push(empleado);
    }
}

const nCompany = new Empresa("Cocacola"); // Crear una nueva instancia de la clase Empresa
console.log(nCompany); // Mostrar el nombre de la empresa

nCompany.agregarEmpleados(usuario1); // Agregar un empleado a la empresa
console.log(nCompany);

console.log(nCompany.mostrarEmpleado()); // Mostrar los empleados de la empresa

//HERENCIA: Premite crear objetos especializados a partir de objetos generales, es decir que un objeto puede heredar propiedades y metodos de otro objeto. En JavaScript, esto se logra utilizando prototipos o clases (en ES6+).
/**
 * Ejemplo, un objeto User
 * Name
 * Lastname
 * 
 * Programmer
 * Name
 * Lastname
 * Language
 * 
 * Ambos objetos deberian tener los mismos atributos y metodos, pero el objeto Programmer deberia tener un atributo adicional que es el lenguaje de programacion. Enves de crearlo nuevomente, se puede crear un objeto User y luego hacer que el objeto Programmer herede de el. De esta manera, el objeto Programmer tendra todos los atributos y metodos del objeto User, pero ademas tendra su propio atributo Language.
 */

//Crear 2 contructores
function User() {
    this.name = "";
    this.lastname = "";
}

function Programmer() {
    //this.name = ""; // En vez de escribir el codigo una y otra vez, se puede hacer que el objeto Programmer herede de User y asi no es necesario volver a escribir el codigo.
    //this.lastname = "";
    this.language = "";
}

//Para realizar un proceso de herencia en JavaScript, se utiliza el prototipo de la clase padre (User) y se asigna al prototipo de la clase hija (Programmer). Esto permite que la clase hija herede las propiedades y métodos de la clase padre.
// Esto se hace de la siguiente manera:
Programmer.prototype = new User(); // Hacer que el objeto Programmer herede de User
console.log(User);
console.log(Programmer);

//Crear un nuevo programador
const programador = new Programmer(); // Crear una nueva instancia de la clase Programmer

//Podemos crea un nuevo usuario
const user = new User(); // Crear una nueva instancia de la clase User
user.name = "Kurt"; // Asignar un nombre al usuario
user.lastname = "Cobain"; // Asignar un apellido al usuario
console.log(user); // Mostrar el usuario


//programador hereda propiedades de Programmer y User
console.log(programador); // Mostrar el programador
programador.name = "Diego"; // Asignar un nombre al programador
programador.lastname = "Reina"; // Asignar un apellido al programador
programador.language = "JavaScript"; // Asignar un lenguaje al programador
console.log(programador); // Mostrar el programador con sus propiedades
console.log(user);

//--------------------------------------------------------------

// Ahora con clases ES6+
class User1 {
    constructor(name, lastname, age) {
        this.name = name;
        this.lastname = lastname;
        this.age = age; // Se puede agregar una propiedad adicional si se desea
    }
}

// Crear una clase Programmer que herede de User y se use la palabra clave extends para indicar que Programmer es una subclase de User.
// Esto permite que Programmer herede todas las propiedades y métodos de User.
class Programmer1 extends User1 {
    // Constructor de la clase Programmer
    constructor(language, name, lastname, age) {
        super(name, lastname, age); // Llamar al constructor de la clase padre (User1) para inicializar las propiedades heredadas y tambien puede recibir parametros, de esta manera conecta el constructor de la clase padre con el constructor de la clase hija.
        this.language = language;
    }
}

const user1 = new User1();
console.log(user1); // Mostrar el usuario
//Aqui el objeto user1 tiene las propiedades name y lastname, pero no tiene la propiedad language porque no es un programador.

const programador1 = new Programmer1("Python", "Barth", "Simpson", 30); // Crear una nueva instancia de la clase Programmer
console.log(programador1); // Mostrar el programador
// Aqui el objeto programador tiene las propiedades name, lastname que las hereda de User1 y language porque es una propiedad de Programmer1.

/**
 * //POLIMORFISMO: Se le puede resumir como la capacidad que tienen algunos objetos para poder manipular distintos tipos de datos de manera uniforme y asi  responder a la misma funcion de diferentes maneras. En JavaScript, esto se logra utilizando métodos sobreescritos o funciones de orden superior.
//Una caracteristica del polimorfismo es la sobrecarga.

Overloading
Sobrecarga: Se refiere a la posibilidad de tener métodos con el mismo nombre pero con diferentes parámetros o tipos de datos. En lenguajes como Java, C++ o C#, puedes definir múltiples métodos con el mismo nombre y diferentes firmas (número o tipo de parámetros). No es posible hacer sobrecarga en JavaScript de forma explícita, pero el lenguaje maneja un comportamiento similar al permitir funciones que aceptan parámetros de diferentes tipos y manejarlos condicionalmente.

Polimorfismo Paramétrico: Es la capacidad de una función para aceptar parámetros de diferentes tipos y procesarlos de manera diferente sin necesidad de definir múltiples versiones del mismo método. Se usa principalmente en lenguajes que soportan tipos genéricos.
 */

// Sobrecarga
function sum(x = 0, y = 0, z = 0) {// funcion con 3 parametros
    return x + y + z; // Sumar los tres números
}

console.log(sum(10, 20));
console.log(sum(10, 20, 30));


// Polimorfismo Paramétrico
function Stack() {// Es como crear el equivalente a una clase
    this.items = []; // Array para almacenar los elementos del arreglo

    this.push = function (item) {// Agregar un elemento a la pila
        this.items.push(item);
    };

}

const stack = new Stack(); // Crear una nueva instancia del arreglo
stack.push('arreglo1'); // Agregar un número a la pila

const stack2 = new Stack(); // Crear una nueva instancia del arreglo
stack2.push(1000); // Agregar un número a la pila

console.log(stack);
console.log(stack2);
//Ambos vienen del mismo constructor, pero tienen diferentes tipos de datos. En este caso, el polimorfismo se logra al permitir que la misma función (push) acepte diferentes tipos de datos (números y cadenas) y los maneje de manera uniforme.

//Polimorfismo subtipo: Es un tipo de polimorfismo que se refiere a la capacidad de un objeto de una clase derivada para ser tratado como un objeto de su clase base. Esto permite que diferentes clases respondan a la misma función de diferentes maneras, dependiendo del tipo de objeto que se pase como argumento.

class Pers {
    constructor(name, lastname) {
        this.name = name;
        this.lastname = lastname;
    }
}

class Prog extends Pers {
    constructor(language, name, lastname) {
        super(name, lastname); // Llamar al constructor de la clase padre (Pers)
        this.language = language;
    }
}

// Crear 2 instancias de la clase Pers
const namePers = new Pers("Ana", "Mato"); // Crear una nueva instancia de la clase Pers
const nameProg = new Prog("JavaScript","Juan", "Rico");

console.log(namePers); // Mostrar la persona
console.log(nameProg); // Mostrar el programador

//Subtipos de polimorfismo
function writeName(p) {//p es cualquier tipo de dato
    console.log(`El nombre es: ${p.name} ${p.lastname}`); // Mostrar el nombre y apellido de la persona
}

writeName(namePers); // Llamar a la función con la instancia de Pers
writeName(nameProg); // Llamar a la función con la instancia de Prog