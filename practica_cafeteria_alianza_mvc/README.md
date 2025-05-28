# Sistema de Gestión de Ventas - Cafetería [Ejemplo Educativo]

Este repositorio contiene una aplicación web de ejemplo desarrollada para simular el sistema de gestión de ventas de una cafetería. Está diseñado con fines educativos para estudiantes de ingeniería de software, programación web o tecnologías de la información.

---

## Descripción del Proyecto

La aplicación permite:

- [Registrar ventas de productos](#2-registro-de-ventas) (cafés, postres, bebidas, etc.).
- [Administrar el catálogo](#1-gestión-de-productos)de productos disponibles.
- [Generar reportes](#3-reportes) de ventas por día y por producto.
- Gestionar usuarios con roles definidos (administrador y vendedor).
- [Recuperacion de contraseña](#4-recuperación-de-contraseña)

---

## Roles de Usuario

## Datos de ingreso:
- usuario: admin@hotmail.com
- password: 1234567890

### 🧑‍💼 Administrador

- Agregar, modificar o eliminar productos del menú.
- Consultar reportes de ventas por fecha o por categoría.
- Crear y gestionar cuentas de vendedores.

### 👩‍🍳 Vendedor

- Registrar ventas desde un panel simplificado.
- Consultar productos disponibles.
- Visualizar su historial de ventas.

---

## Funcionalidades Principales

### 1. Gestión de Productos

- Registro de nuevos productos (nombre, precio, categoría).
- Edición y eliminación de productos existentes.
- Clasificación por tipo: café, postre, snack, bebida fría, etc.

![Donas](./docs/img/imagen1.jpg)

### 2. Registro de Ventas

- Selección de productos desde una interfaz ágil.
- Registro automático con hora, producto y vendedor.
- Visualización diaria de ventas realizadas.

![café](./docs/img/imagen2.jpg)

### 3. Reportes

- Reporte por día (ventas totales, productos más vendidos).
- Reporte por producto (cantidad vendida, ingresos).
- Exportación a PDF o Excel (opcional).

![Cafetera](./docs/img/imagen3.jpg)

---

## Tecnologías Utilizadas

- **Backend:** PHP (Laravel)
- **Base de Datos:** MySQL / MariaDB
- **Frontend:** HTML5, CSS3, Bootstrap, JavaScript
- **Versionamiento:** Git

---

### 4. Recuperación de Contraseña
El sistema implementa un flujo completo de restablecimiento de contraseña para usuarios registrados. Este proceso incluye:

- Formulario de Solicitud
El usuario accede a un formulario donde ingresa su correo electrónico para solicitar la recuperación de su contraseña.

- Generación de Token Seguro
Si el correo existe en la base de datos, se genera un token aleatorio y único con expiración de 1 hora, el cual se almacena junto con el usuario.

- Envío de Correo con Enlace de Recuperación
Se utiliza PHPMailer para enviar un correo HTML al usuario, incluyendo un botón con un enlace que contiene el token.

- Formulario de Nueva Contraseña
El usuario accede al enlace enviado por correo y se le presenta un formulario para establecer una nueva contraseña. El sistema valida que el token sea válido y no haya expirado.

- Actualización de Contraseña y Limpieza del Token
Una vez ingresada la nueva contraseña, se guarda de forma segura (usando password_hash) y se elimina el token de recuperación de la base de datos.

- Mensajes y Redirección Automática
Después de cada acción (solicitud o cambio de contraseña), el sistema muestra un mensaje de éxito o error y redirige automáticamente al usuario a la pantalla correspondiente.

## Instalación

1. Clona el repositorio:
   ```bash
   git clone https://github.com/usuario/sistema_cafeteria.git
