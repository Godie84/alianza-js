<?php
session_start();
if (isset($_SESSION["usuario"]) && isset($_SESSION["status"])) {
    
} else {
    echo "La sesión no está iniciada o la información del usuario no está disponible.";
    
}
?>