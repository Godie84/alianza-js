<?php
require_once 'conexion.php';
require_once 'funciones.php';

//Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //recibir los datos del formulario
    $nombre = limpiarDatos($_POST["nombre"]);
    $email = limpiarDatos($_POST["email"]);
    $password = $_POST["password"]; //No limpiar la contrasena inicialmente

    // Validaciones básicas
    if (empty($nombre)) { //valida campos vacios
        $error = "El nombre es requerido.";
    } elseif (empty($email)) { //valida campos vacios
        $error = "El email es requerido.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) { //valida si es una direccion de correo valida
        $error = "El formato del email no es válido.";
    } elseif (empty($password)) {
        $error = "La contraseña es requerida.";
    } elseif (strlen($password) < 6) { //obtiene la longitud de cadena de caracteres
        $error = "La contraseña debe tener al menos 6 caracteres.";
    }

    if (!isset($error)) { //verificar si no hay errores de validacion
        //verifica si el email ya existe en la base de datos
        $stmt = $conexion->prepare("SELECT id FROM usuarios WHERE email= :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $error = "Este email ya esta registrado";
        } else {
            //Hashear la contraseña de forma segura
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            //Inserta los datos en la base de datos para el nuevo usuario
            $stmt = $conexion->prepare("INSERT INTO usuarios (username, email, password) VALUES (:nombre, :email, :password)");
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashedPassword);

            if ($stmt->execute()) {
                $mensaje = "Resgistro exitoso.";
            } else {
                $error = "Error al registrar el usaurio.";
            }
        }
    }
}
?>

<?php require_once 'cabecera.php'; ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Resultado del Registro</h2>
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error; ?>
                        </div>
                        <p class="text-center"><a href="form-registro.php" class="btn btn-secondary btn-sm">Volver al Registro</a></p>
                    <?php endif; ?>

                    <?php if (isset($mensaje)): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $mensaje; ?>
                        </div>
                        <p class="text-center"><a href="login.php" class="btn btn-primary btn-sm">Ir a Iniciar Sesión</a></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once 'footer.php'; ?>