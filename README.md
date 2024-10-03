# Desarrollo de un CRUD Básico en Laravel

Este proyecto consiste en la implementación de un CRUD (Crear, Leer, Actualizar y Eliminar) para un sistema de gestión de productos utilizando Laravel, un framework para aplicaciones web con PHP 8.3.12 y MySQL.

## Funcionalidades del CRUD

El CRUD implementa las siguientes funcionalidades para la gestión de productos:

-   **Crear Producto:** Añadir un nuevo producto a la base de datos.
-   **Leer Productos:** Ver una lista de productos o consultar un producto en específico.
-   **Actualizar Producto (PUT):** Modificar los datos completos de un producto existente.
-   **Actualizar Producto (PATCH):** Modificar campos específicos de un producto.
-   **Eliminar Producto:** Eliminar un producto de la base de datos.

### Campos de Producto

Cada producto tiene los siguientes campos:

-   **id:** Identificador único del producto.
-   **name:** Nombre del producto.
-   **description:** Descripción del producto.
-   **price:** Precio del producto.
-   **stock_quantity:** Cantidad disponible del producto.
-   **created_at:** Fecha y hora en que se creó el producto.
-   **updated_at:** Fecha y hora de la última actualización del producto.

## Requisitos

-   PHP 8.3.12 instalado en tu máquina. Puedes descargarlo desde
    [php.net](https://www.php.net/downloads)
-   Composer 2.7.7 para gestionar las dependencias de Laravel. Puedes descargarlo desde
    [getcomposer.org](https://getcomposer.org/download/)
-   Laravel 11.9 instalado globalmente o a través de Composer.
-   XAMPP Control Panel 3.3.0 para la distribución de Apache y creación de la base de datos (db) MySQL. Puedes descargarlo desde
    [apachefriends.org](https://www.apachefriends.org/download.html)

Nota: Windows 11 como sistema operativo (SO).

## Cómo Probar el CRUD

1. **Clona o descarga el repositorio:**
   Clona o descarga el proyecto en tu máquina.

2. **Instala las dependencias:**
   Navega hasta la carpeta del proyecto y ejecuta el comando para instalar las dependencias de Laravel utilizando Composer con el comando: `composer install`.

3. **Configura el archivo .env:**
   Copia el archivo de configuración de ejemplo y actualiza las variables de entorno necesarias: `cp .env.example .env`.

4. **Inicia MySQL:**
   Abre el Panel de Control de XAMPP y asegúrate de iniciar tanto Apache como MySQL para que el servidor web y la base de datos estén activos.

5. **Ejecuta las migraciones:**
   Para crear las tablas necesarias en tu base de datos, ejecuta las migraciones: `php artisan migrate`.

6. **Ejecuta el servidor de desarrollo:**
   Inicia el servidor de desarrollo de Laravel para interactuar con la aplicación y probar las rutas del CRUD con el comando: `uvicorn main:app --reload`

7. **Prueba las funcionalidades:**
   Usa Postman, Insomnia, o cualquier herramienta de tu elección para probar las rutas de la API que gestionan productos.

## Rutas y Controladores

Las siguientes rutas fueron configuradas para manejar las operaciones del CRUD:

-   `GET /products` — Muestra la lista de productos.
-   `GET /products/{id}` — Muestra un producto específico.
-   `POST /products` — Crea un nuevo producto.
-   `PUT /products/{id}` — Actualiza completamente un producto existente.
-   `PATCH /products/{id}` — Actualiza parcialmente un producto.
-   `DELETE /products/{id}` — Elimina un producto.

Los controladores correspondientes fueron implementados con todas las acciones necesarias para cada operación.

## Validación de Datos

Se añadieron las siguientes validaciones básicas:

-   **Nombre (`name`):** Obligatorio, debe ser un string único en la tabla `product` y tiene un máximo de 255 caracteres.
-   **Descripción (`description`):** Obligatorio, debe ser un string con un máximo de 1000 caracteres.
-   **Precio (`price`):** Obligatorio, debe ser un número (decimal o entero) y no puede ser negativo.
-   **Cantidad en Stock (`stock_quantity`):** Obligatorio, debe ser un entero y no puede ser negativo.

Las validaciones aseguran que los datos ingresados sean válidos antes de realizar operaciones en la base de datos.

## Contacto

Si tienes alguna pregunta o necesitas soporte adicional, no dudes en contactarme a través de mi [LinkedIn](https://www.linkedin.com/in/renzo-bocanegra-dev/).
