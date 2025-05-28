<?php
class Database //Se declara una clase llamada Database. Será usada para manejar la conexión a la base de datos.
{ 
    //Se definen cuatro propiedades estáticas y privadas que almacenan los datos de conexión:
    private static $host = 'localhost'; //Nombre del host de la base de datos.
    private static $dbName = 'coffee_shop_alliance'; //Nombre de la base de datos.
    private static $username = 'root'; //Nombre de usuario para la conexión a la base de datos.
    private static $password = ''; //Contraseña para la conexión a la base de datos.

    public static function connect()
    { //Se define un método estático llamado connect que se encargará de establecer la conexión a la base de datos.
        try { //Se intenta ejecutar el bloque de código dentro del try.
            $conn = new PDO( //Se crea una nueva instancia de PDO, que es una clase de PHP para manejar conexiones a bases de datos.
                "mysql:host=" . self::$host . ";dbname=" . self::$dbName, //Se especifica el DSN (Data Source Name) que contiene la información necesaria para conectarse a la base de datos.
                self::$username, //Se pasa el nombre de usuario.
                self::$password //Se pasa la contraseña.
            );
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Se establece el modo de error de PDO para que lance excepciones en caso de error.
            return $conn; //Se devuelve la conexión establecida.
        } catch (PDOException $e) { //Se captura cualquier excepción lanzada por PDO.
            die("Error de conexión: " . $e->getMessage()); //Se detiene la ejecución del script y se muestra un mensaje de error.
        }
    }
}