<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/Services/MailService.php';

use App\Services\MailService;

$mailService = new MailService();
$destinatario = 'diego.reina1984@gmail.com'; // Reemplaza con una dirección de correo real
$nombre = 'Fernando Ramirez';

if ($mailService->enviarCorreoBienvenida($destinatario, $nombre)) {
    echo "Correo de prueba enviado correctamente a {$destinatario}\n";
} else {
    echo "Error al enviar el correo de prueba a {$destinatario}\n";
}

?>