//Ecmascript modules: divide una aplicacion en diferentes archivos
// function add(x, y) {//declaracion de funcion tradicional
//     return x + y;
// }
const add = (x, y) => x + y;//funcion adaptada en Arrow Function In Line
// function multiplicar(x=0, y=0) {//Declaracion de funcion tradicional
//     return x * y;
// }
const multiplicar = (x = 0, y = 0) => x * y;//funcion adaptada en Arrow Function In Line
let texto = 'Esto es un texto';
let userDate = {nombre: 'Homero', apellido: 'Simpson', direccion: 'Av. siempre viva'};
let frutas = ['mango', 'manzana', 'durazno'];
export { add, multiplicar, texto, userDate, frutas};//Se puede usar la palabra reservada export antes de cada funcion o especificar las funciones a exportar en un sola linea



  
  