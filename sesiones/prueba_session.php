<?php
session_start();
if (isset($_SESSION["nombre"]) && isset($_SESSION["apellido"]) && isset($_SESSION["cedula"]) && isset($_SESSION["email"]) && isset($_SESSION["estado"]) && isset($_SESSION["rol"])) {
    echo "Bienvenido estimad@: " . $_SESSION["nombre"] . " " . $_SESSION["apellido"] . ". " . "Sus datos de acceso son los siguientes: <br>";
    echo "Nombre: " . $_SESSION["nombre"] . "<br>";
    echo "Apellido: " . $_SESSION["apellido"] . "<br>";
    echo "Cedula: " . $_SESSION["cedula"] . "<br>";
    echo "Email: " . $_SESSION["email"] . "<br>";
    echo "Estado: " . $_SESSION["estado"] . "<br>";
    echo "Rol: " . $_SESSION["rol"] . "<br>";
} else {
    echo "La sesión no está iniciada o la información del usuario no está disponible.";
}
