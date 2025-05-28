<?php
// Carga automática de clases usando Composer (necesario para PHPMailer)
require_once __DIR__ . '/../../vendor/autoload.php';

// Importación de clases específicas de PHPMailer que se van a usar
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Definición de la clase MailService para enviar correos electrónicos
class MailService
{
    // Variable privada para almacenar la configuración de correo
    private $config;

    // Constructor: carga la configuración desde el archivo mail_config.php
    public function __construct()
    {
        $this->config = require __DIR__ . '/../../config/mail_config.php';
    }

    // Método para enviar un correo electrónico
    public function send($toEmail, $toName, $subject, $body)
    {
        // Crear una nueva instancia de PHPMailer con manejo de excepciones
        $mail = new PHPMailer(true);

        // Nivel de depuración del servidor SMTP (útil para desarrollo)
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER; // Puedes cambiar a SMTP::DEBUG_OFF para producción

        try {
            // Configuración del correo saliente
            $mail->isSMTP();                              // Usar protocolo SMTP
            $mail->Host       = $this->config['host'];    // Servidor SMTP
            $mail->SMTPAuth   = true;                     // Activar autenticación SMTP
            $mail->Username   = $this->config['username']; // Usuario SMTP
            $mail->Password   = $this->config['password']; // Contraseña SMTP
            $mail->SMTPSecure = $this->config['secure'];  // Tipo de cifrado ('tls' o 'ssl')
            $mail->Port       = $this->config['port'];    // Puerto del servidor SMTP
            $mail->CharSet    = 'UTF-8';                  // Codificación del mensaje

            // Configurar remitente
            $mail->setFrom($this->config['from_email'], $this->config['from_name']);

            // Agregar destinatario
            $mail->addAddress($toEmail, $toName);

            // Configurar el contenido del correo
            $mail->isHTML(true);              // El cuerpo del mensaje será en HTML
            $mail->Subject = $subject;        // Asunto del correo
            $mail->Body    = $body;           // Cuerpo del mensaje en HTML

            // Enviar el mensaje
            $mail->send();
            return true;                      // Si llega aquí, el correo fue enviado correctamente

        } catch (Exception $e) {
            // Si ocurre un error, lanzar una excepción con el mensaje de error
            throw new Exception("Mailer Error: {$mail->ErrorInfo}");
        }
    }
}
