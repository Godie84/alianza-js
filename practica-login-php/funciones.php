<?php
function limpiarDatos($data)//Funcion que limpia los campos del formulario antes de ser procesado
{
    $data = trim($data);//quietar espacios
    $data = stripslashes($data);//Quita caracteres como /
    $data = htmlspecialchars($data);//convierte caracteres especiales a texto plano
    return $data;
}
?>