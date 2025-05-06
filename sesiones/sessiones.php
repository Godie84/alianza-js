<?php
session_start(); //Mantiene los datos de la pagina para saber quien esta logeado en el sistema

$_SESSION['nombre'] = "Diego";
$_SESSION["apellido"] = "Reina";
$_SESSION["cedula"] = "12345667890";
$_SESSION["email"] = "profe@alianza.edu.co";
$_SESSION["estado"] = "Activo";
$_SESSION["rol"] = "Profesor";

echo "Bienvenido estimad@: " . $_SESSION['nombre'] . " " . $_SESSION["apellido"] . ". " . "Sus datos de acceso son los siguientes: <br>";
echo "Nombre: " . $_SESSION["nombre"] . "<br>";
echo "Apellido: " . $_SESSION["apellido"] . "<br>";
echo "Cedula: " . $_SESSION["cedula"] . "<br>";
echo "Email: " . $_SESSION["email"] . "<br>";
echo "Estado: " . $_SESSION["estado"] . "<br>";
echo "Rol: " . $_SESSION["rol"] . "<br>";
