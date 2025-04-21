//Metodos de array (Map, Filter, Foreach, Concat)
const nombres = ["Carlos", "Ana", "Maria", "Eva"];

for (let i = 0; i < nombres.length; i++) {
    const element = nombres[i];
    console.log(element)
}

nombres.forEach(function (name) {
    console.log(name)
});

//------------------------------------------

const buscarNombre = nombres.find(function (name) {
    // if (name === "Ana") {
    //     return name;
    // }
    return (name === "Ana") ? name : undefined;//Ternario
});
console.log(buscarNombre);

//--------------------------------------

const nn = nombres.map(function (name) {
    return name;
});

console.log(nn);

//-------------------------------------

const numeros = [1, 4, 9];
const raices = numeros.map(Math.sqrt);//Se calcula la raiz cuadrada de cada elemento del array
console.log(numeros);
console.log(raices);

//---------------------------------

const filtroNombre = nombres.filter(function (name) {
    return (name !== "Carlos") ? name : undefined;//Filtra todo lo que no sea Ana
});
console.log(filtroNombre);

//--------------------------------
//Concat()
const newNames = ["Camila", "Diana", "Luisa"];
console.log(nombres.concat(newNames));

//Spread operator (...)
console.log(...nombres, ...newNames);

const user1 = {nombre: "Homero", apellido: "Simpson"};
const address = {direccion: "Av. Siempre viva", ciudad: "Sprinfield"};
const userInfo = {...user1, ...address};//genera un objeto nuevo con todas las propiedades juntas
console.log(userInfo);


//convertir a String
const letras = "JavaScript";
const text = [...letras];
console.log(text);

//combinar objetos
const persona = { nombre: "Laura", edad: 30 };
const ubicacion = { ciudad: "Bogotá" };
const user = { ...persona, ...ubicacion };
console.log(user);

//Funcion anonima
// const button = document.createElement('button');
// button.innerText = 'Haz Click';
// button.addEventListener('click', () => {
//     alert("Curso de JavaScript");
// });
// document.body.append(button);

//Arrow Function In Line
const mostrarTexto = () => 'Hola Mundo';
const mostrarNumero = () => 30;
const mostrarBoolean = () => true;
const mostrarArray = () => [1, 2, 3, 4];
const mostrarObjeto = () => ({ nombre: 'Kira' });

console.log(mostrarObjeto());

function saludo() {
    return "Buenos dias"
}


const saludar = (name) => 'Buenos dias' + name;
console.log(saludo());
console.log(saludar("Diego"));

const sumar = (a, b) => {
    return a + b;
};

console.log(sumar(2, 3)); // 5

const sumar1 = (a, b) => a + b;
console.log(sumar1(2, 3)); // 5