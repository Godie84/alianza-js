<?php
if ($_GET) {
    $nombre = $_GET['nombre'] ?? null;
    echo "Hola $nombre <br>";
}
?>
