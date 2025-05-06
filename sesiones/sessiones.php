<?php
session_start();//Mantiene los datos de la pagina para saber quien esta logeado en el sistema

$_SESSION["usuario"] = "Profe_Diego";
$_SESSION["status"] = "Activo";

echo "Variables de sesión establecidas:<br>";
echo "Usuario: " . $_SESSION["usuario"] . "<br>";
echo "Estatus: " . $_SESSION["status"] . "<br>";
?>