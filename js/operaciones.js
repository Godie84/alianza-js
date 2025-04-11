//Ecmascript modules: divide una aplicacion en diferentes archivos
function add(x, y) {
    return x + y;
}

function multiplicar(x=0, y=0) {
    return x * y;
}

let texto = 'Esto es un texto';

let userDate = {nombre: 'Homero', apellido: 'Simpson', direccion: 'Av. siempre viva'};

let frutas = ['mango', 'manzana', 'durazno'];

export { add, multiplicar, texto, userDate, frutas };
