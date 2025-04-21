<?php
if ($_POST) {
    $nombre = $_POST['nombre'] ?? null;
    echo "Hola $nombre <br>";
}
?>
