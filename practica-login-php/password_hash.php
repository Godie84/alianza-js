<?php
// $contrasena_original = 'ContrasenaSecreta';
// $contrasena_hasheada = password_hash($contrasena_original, PASSWORD_DEFAULT);

// echo "Contraseña original: " . $contrasena_original . "<br>";
// echo "Contraseña hasheada: " . $contrasena_hasheada . "<br>";

// Contraseña original del usuario (por ejemplo, ingresada en un formulario de registro)


$contrasena_original = 'MiSuperSecreto123';

// 1. Hashing de la contraseña para almacenar en la base de datos
$contrasena_hasheada = password_hash($contrasena_original, PASSWORD_DEFAULT);

echo "Contraseña Original: " . $contrasena_original . "<br>";
echo "Contraseña Hasheada (para almacenar en la BD): " . $contrasena_hasheada . "<br><br>";

// Simulación de la contraseña ingresada por el usuario durante el inicio de sesión
$contrasena_ingresada_correcta = 'MiSuperSecreto123';
$contrasena_ingresada_incorrecta = 'ContraseñaIncorrecta';

// 2. Verificación de la contraseña correcta
if (password_verify($contrasena_ingresada_correcta, $contrasena_hasheada)) {
    echo "¡La contraseña ingresada es correcta!<br>";
    // Aquí podrías iniciar la sesión del usuario
} else {
    echo "La contraseña ingresada es incorrecta.<br>";
}

echo "<br>";

// 3. Verificación de la contraseña incorrecta
if (password_verify($contrasena_ingresada_incorrecta, $contrasena_hasheada)) {
    echo "¡La contraseña ingresada es correcta!<br>";
} else {
    echo "La contraseña ingresada es incorrecta.<br>";
    // Aquí podrías mostrar un mensaje de error al usuario
}


?>

