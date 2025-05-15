<?php
require_once __DIR__ . '/../models/User.php';
//Cargar la libreria de PhpSpreadsheet
require_once __DIR__ . '/../vendor/autoload.php';

//Hacer uso la libreria de Spreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
//Hacer uso la libreria de Dompdf
use Dompdf\Dompdf;
use Dompdf\Options;

class UserController
{
    public function index()
    {
        $userModel = new User();
        $search = $_GET['q'] ?? '';

        // Paginación
        $limit = 5;
        $page = isset($_GET['page']) ? max((int)$_GET['page'], 1) : 1;
        $offset = ($page - 1) * $limit;

        if ($search) {
            $users = $userModel->search($search); // Puedes paginar búsqueda también si lo deseas
            $totalUsers = count($users); // rápida solución, aunque no ideal
        } else {
            $users = $userModel->getAll($limit, $offset);
            $totalUsers = $userModel->countAll();
        }

        $totalPages = ceil($totalUsers / $limit);

        include __DIR__ . '/../views/users/index.php';
    }

    public function create()
    {
        include __DIR__ . '/../views/users/create.php';
    }

    public function edit($id)
    {
        $userModel = new User();
        $user = $userModel->find($id);

        if (!$user) {
            die("Usuario no encontrado");
        }

        include __DIR__ . '/../views/users/edit.php';
    }


    public function store($name, $email, $pass)
    {
        $errors = [];

        if (empty($name)) {
            $errors[] = "El nombre es obligatorio.";
        }

        if (empty($email)) {
            $errors[] = "El correo electrónico es obligatorio.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "El formato del correo no es válido.";
        }

        if (empty($pass)) {
            $errors[] = "El password es obligatorio.";
        }

        if (count($errors) > 0) {
            $oldData = ['name' => $name, 'email' => $email];
            include __DIR__ . '/../views/users/create.php';
        } else {
            // Aquí se aplica el hash
            $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

            $userModel = new User();
            $userModel->create($name, $email, $hashedPass);

            header("Location: index.php?controller=user&action=index&success=1");
            exit;
        }
    }

    public function update($id, $name, $email)
    {
        $errors = [];

        if (empty($name)) $errors[] = "El nombre es obligatorio.";
        if (empty($email)) $errors[] = "El correo es obligatorio.";
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Correo inválido.";

        if ($errors) {
            $user = ['id' => $id, 'name' => $name, 'email' => $email];
            include __DIR__ . '/../views/users/edit.php';
        } else {
            $userModel = new User();
            $userModel->update($id, $name, $email);
            header("Location: index.php?controller=user&action=index&updated=1");
            exit;
        }
    }

    public function delete($id)
    {
        $userModel = new User();
        $userModel->delete($id);
        header("Location: index.php?controller=user&action=index&deleted=1");
        exit;
    }

    //Funcion exportar a excel
    public function exportarExcel()
    {
        //Mostrar errres que se presenten al exportar el archiv a excel
        //Esto es solo para desarrollo, en produccion no se recomienda mostrar errores
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        //Cargar el modelo User
        require_once __DIR__ . '/../models/User.php';
         // Crear una instancia del modelo y llamar al método que devuelve los datos a exportar
        $modelo = new User();
        $usuarios = $modelo->export();// Este método debe devolver un array de usuarios

        // Crear un nuevo archivo de Excel
        $spreadsheet = new Spreadsheet();
        // Obtener la hoja activa (la primera por defecto)
        $sheet = $spreadsheet->getActiveSheet();
         // Establecer el título de la hoja
        $sheet->setTitle('Usuarios');

        // Escribir los encabezados de las columnas en la primera fila
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Nombre');
        $sheet->setCellValue('C1', 'Correo Electrónico');
        

        // Inicializar la fila desde donde comienzan los datos (fila 2)
        $fila = 2;
        // Recorrer el arreglo de usuarios y escribir cada usuario en una fila
        foreach ($usuarios as $usuario) {
            $sheet->setCellValue('A' . $fila, $usuario['id']);
            $sheet->setCellValue('B' . $fila, $usuario['name']);
            $sheet->setCellValue('C' . $fila, $usuario['email']);
            $fila++;// Avanzar a la siguiente fila
        }

        // Centrar horizontal y verticalmente todo el contenido de la hoja
        $sheet->getStyle($sheet->calculateWorksheetDimension())
            ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER)
            ->setVertical(Alignment::VERTICAL_CENTER);

        // Limpiar buffers antes de headers
        if (ob_get_length()) {
            ob_end_clean();
        }

        // Headers y salida
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="usuarios.xlsx"');
        header('Cache-Control: max-age=0');

        // Crear un escritor Xlsx y guardar el archivo directamente en la salida estándar
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        // Terminar el script para evitar contenido adicional
        exit;
    }

    // Funcion exportar a PDF
    public function exportarPDF()
    {
        require_once __DIR__ . '/../vendor/autoload.php';
        require_once __DIR__ . '/../models/User.php';

        // Crear una instancia del modelo
        $modelo = new User();
        // Obtener los datos de los usuarios (se espera un array asociativo)
        $usuarios = $modelo->export(); // Devuelve array asociativo con id, name, email

        // HTML que se convertirá en PDF
        ob_start(); // Inicia el buffer para capturar la vista
?>
<!-- ===== CSS y diseño visual del PDF ===== -->
        <style>
            body {
                font-family: Arial, sans-serif;
                font-size: 12px;
                margin: 0;
                padding: 0;
            }

            table {
                border-collapse: collapse;
                width: 100%;
                margin-top: 20px;
            }

            th,
            td {
                border: 1px solid #000;
                padding: 6px;
                text-align: center;
            }

            th {
                background-color: #f2f2f2;
            }

            .header {
                text-align: center;
                margin-top: 20px;
            }

            .footer {
                position: fixed;
                bottom: 0;
                width: 100%;
                text-align: center;
                font-size: 10px;
                padding: 5px 0;
                border-top: 1px solid #000;
            }

            .logo {
                width: 100px;
                height: auto;
            }
        </style>

        <!-- Header con logo -->
         <!-- Encabezado del PDF con logo y título -->
        <div class="header">
            <img src="ruta/a/tu/logo.png" alt="Logo" class="logo">
            <h2>Lista de Usuarios</h2>
            <p>Este es el reporte de usuarios exportado desde el sistema.</p>
        </div>

        <!-- Tabla con datos -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?= htmlspecialchars($usuario['id']) ?></td>
                        <td><?= htmlspecialchars($usuario['name']) ?></td>
                        <td><?= htmlspecialchars($usuario['email']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Footer -->
        <div class="footer">
            <p>&copy; 2025 Tu Empresa - Todos los derechos reservados</p>
        </div>

<?php
        $html = ob_get_clean(); // Captura el contenido HTML generado

        // Configuración de Dompdf
        $options = new Options();
        $options->set('isRemoteEnabled', true); // Permitir imágenes remotas

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Enviar el archivo PDF al navegador
        $dompdf->stream("usuarios.pdf", ["Attachment" => false]); // true = descargar, false = mostrar
        exit;
    }
}
