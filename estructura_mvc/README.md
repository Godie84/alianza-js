# Sistema de Gestión de Ventas - Cafetería [Ejemplo Educativo]

Este repositorio contiene una aplicación web de ejemplo desarrollada para simular el sistema de gestión de ventas de una cafetería. Está diseñado con fines educativos para estudiantes de ingeniería de software, programación web o tecnologías de la información.

---

## Descripción del Proyecto

La aplicación permite:

- [Registrar ventas de productos](#2-registro-de-ventas) (cafés, postres, bebidas, etc.).
- [Administrar el catálogo](#1-gestión-de-productos)de productos disponibles.
- [Generar reportes](#3-reportes) de ventas por día y por producto.
- Gestionar usuarios con roles definidos (administrador y vendedor).

---

## Roles de Usuario

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

## Instalación

1. Clona el repositorio:
   ```bash
   git clone https://github.com/usuario/sistema_cafeteria.git
