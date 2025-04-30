<?php
// Datos de conexión (puedes cambiar estos valores según tu configuración)
$servidor = "localhost";      // Dirección del servidor MySQL
$usuario = "root";            // Usuario de la base de datos
$password = "";               // Contraseña del usuario
$baseDeDatos = "libreria";       // Nombre de la base de datos

try {
    // Intentamos crear una nueva conexión usando PDO
    $conexion = new PDO("mysql:host=$servidor;dbname=$baseDeDatos", $usuario, $password);//Esta línea establece una conexión a la base de datos MySQL llamada "Album" usando las credenciales almacenadas en las variables $usuario y $password, y la guarda en $conexion.

    // Configuramos PDO para lanzar excepciones si ocurre un error
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Aqui se le indica a PDO cómo debe manejar los errores cuando algo falla (por ejemplo, si una consulta SQL está mal escrita o hay un problema de conexión). Si algo sale mal con la base de datos, lanza un error visible (excepción) para poder capturarlo con try...catch y manejarlo de forma controlada.
    
    //$conexion->setAttribute(...):Este método de PDO sirve para configurar un atributo de la conexión. Es como decirle: “quiero que trabajes de esta manera”.

    //PDO::ATTR_ERRMODE: Este es el nombre del atributo que queremos configurar: el modo de error (cómo PDO debe manejar errores).

    //PDO::ERRMODE_EXCEPTION: Este es el valor que le damos al atributo: le estamos diciendo a PDO que, cuando ocurra un error, lance una excepción.

    //echo "Conexión exitosa a la base de datos '$baseDeDatos'.";
} catch (PDOException $e) {
    // Si hay un error en la conexión, lo capturamos aquí
    echo "Error de conexión: " . $e->getMessage();
}
?>