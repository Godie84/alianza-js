<?php

// Retorna un array asociativo con la configuración para el envío de correos
return [

    // Dirección del servidor SMTP (en este caso Gmail)
    'host' => 'smtp.gmail.com',

    // Correo electrónico desde el que se enviarán los correos (debe estar autenticado)
    'username' => 'tucorreo@gmail.com',

    // Contraseña o clave de aplicación generada desde la configuración de seguridad de Gmail
    
    'password' => 'tucontrasenadeaplicaciones',

    // Dirección de correo que aparecerá como remitente del mensaje
    'from_email' => 'tucorreo@gmail.com',

    // Nombre que aparecerá como remitente (junto al correo)
    'from_name' => 'Cafetería Alianza',

    // Puerto SMTP que se utilizará: 587 para STARTTLS o 465 para SSL
    'port' => 587,

    // Tipo de cifrado para la conexión: 'tls' (STARTTLS) o 'ssl' (TLS implícito)
    'secure' => 'tls',
];
