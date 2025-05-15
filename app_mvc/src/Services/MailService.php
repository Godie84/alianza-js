<?php

namespace App\Services; // Ajusta el namespace según tu estructura

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class MailService {

    private $mailConfig;

    public function __construct() {
        $this->mailConfig = require __DIR__ . '/../../config/mail_config.php';
    }

    public function enviarCorreoBienvenida(string $destinatario, string $nombre) {
        $mail = new PHPMailer(true);
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;

        try {
            // Configuración del servidor SMTP desde el archivo de configuración
            $mail->isSMTP();
            $mail->Host       = $this->mailConfig['smtp_host'];
            $mail->SMTPAuth   = $this->mailConfig['smtp_auth'];
            $mail->Username   = $this->mailConfig['smtp_username'];
            $mail->Password   = $this->mailConfig['smtp_password'];
            $mail->SMTPSecure = $this->mailConfig['smtp_encryption'];
            $mail->Port       = $this->mailConfig['smtp_port'];

            // Remitente y destinatario desde la configuración
            $mail->setFrom($this->mailConfig['from_address'], $this->mailConfig['from_name']);
            $mail->addAddress($destinatario, $nombre);

            // Contenido del correo
            $mail->isHTML(true);
            $mail->Subject = '¡Bienvenido a nuestra plataforma!';
            $mail->Body    = 'Hola ' . htmlspecialchars($nombre) . ',<br><br>Gracias por registrarte en nuestra plataforma. ¡Esperamos que disfrutes de nuestros servicios!';
            $mail->AltBody = 'Hola ' . $nombre . ', Gracias por registrarte en nuestra plataforma.';

            $mail->send();
            return true; // Éxito al enviar
        } catch (Exception $e) {
            error_log("Error al enviar correo de bienvenida a {$destinatario}: {$mail->ErrorInfo}");
            return false; // Fallo al enviar
        }
    }
}
