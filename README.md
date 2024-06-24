  
# Examen de Software 1


## Tecnologías Utilizadas para el Proyecto

<p align="center">
  <img width="15%" src="https://www.vectorlogo.zone/logos/nodejs/nodejs-ar21.svg">
  <img width="15%" src="https://www.vectorlogo.zone/logos/laravel/laravel-ar21.svg">
  <img width="15%" src="https://www.vectorlogo.zone/logos/mysql/mysql-ar21.svg">
  <img width="15%" src="https://www.vectorlogo.zone/logos/git-scm/git-scm-ar21.svg">
  <img width="15%" src="https://www.vectorlogo.zone/logos/docker/docker-ar21.svg">
  <img width="15%" src="https://www.vectorlogo.zone/logos/github/github-ar21.svg">
  <img width="10%" src="https://raw.githubusercontent.com/vscode-icons/vscode-icons/90c6efb7c5cd0e21b5f09f87d2e838bc1ab2f6a5/icons/file_type_composer.svg">
  <img width="15%" src="https://www.vectorlogo.zone/logos/visualstudio_code/visualstudio_code-ar21.svg">
  <img width="15%" src="https://www.vectorlogo.zone/logos/php/php-ar21.svg">
</p>

## Integrantes

- Sergio Canaviri Felix
- Elvis David Quinteros Siles
- Jhonny Lamas Soto
- Ines Quiroga Castro
- José Cesar Sañez Salce

## Descripción del Proyecto

El objetivo de este proyecto es desarrollar una aplicación web utilizando el framework Laravel, una base de datos MySQL, y Docker para la contenedorización y despliegue. La aplicación se centrará en la gestión y registro de tres entidades principales: Producto, Cliente y Empleado. 

### Maestro de Producto

- **Registro de productos:** Campos como nombre, descripción, precio, stock, categoría y otros atributos relevantes.
- **Funcionalidades:** Agregar, editar, eliminar y visualizar productos.
- **Listado y búsqueda avanzada:** Opciones para filtrar y encontrar productos rápidamente.

### Maestro de Cliente

- **Registro de clientes:** Información como nombre, dirección, teléfono, correo electrónico y detalles adicionales.
- **Funcionalidades:** Agregar, editar, eliminar y visualizar clientes.
- **Listado y búsqueda avanzada:** Opciones para gestionar y encontrar clientes fácilmente.

### Maestro de Empleado

- **Registro de empleados:** Datos como nombre, puesto, salario, fecha de contratación y otra información pertinente.
- **Funcionalidades:** Agregar, editar, eliminar y visualizar empleados.
- **Listado y búsqueda avanzada:** Herramientas para manejar y localizar empleados eficientemente.

## Tecnologías Utilizadas

- **Backend:** Laravel Framework (PHP)
- **Base de Datos:** MySQL
- **Frontend:** Blade Templates (integrados en Laravel), HTML, CSS, y JavaScript.
- **Servidor:** Apache o Nginx (según configuración del entorno de desarrollo y producción).
- **Contenedorización:** Docker

## Características Principales

- **Autenticación y Autorización:** Sistema de login para asegurar que solo los usuarios autorizados puedan acceder y gestionar los datos.
- **Validación de Datos:** Validación en el lado del servidor para asegurar la integridad y consistencia de la información ingresada.
- **Interfaz de Usuario Intuitiva:** Diseño responsivo y amigable para facilitar la navegación y el uso de la aplicación.
- **Reportes y Estadísticas:** Generación de reportes básicos sobre productos, clientes y empleados.
- **Seguridad:** Implementación de medidas de seguridad para proteger los datos y la privacidad de los usuarios.
- **Despliegue y Escalabilidad:** Uso de Docker para contenedorización, facilitando el despliegue, la escalabilidad y la portabilidad de la aplicación.

## Configuración de Docker

Docker Compose: Archivo `docker-compose.yml` para definir y ejecutar múltiples contenedores Docker.

- Contenedor para la aplicación Laravel.
- Contenedor para la base de datos MySQL.
- Contenedor para Nginx (si se utiliza como servidor web).

## Desarrollo y Entregables

- **Fase de Planificación:** Recolección de requisitos, diseño de la arquitectura del sistema, y planificación de sprints de desarrollo.
- **Fase de Desarrollo:** Codificación de las funcionalidades principales. Configuración de Docker y Docker Compose. Integración de la base de datos y creación de las interfaces de usuario.
- **Fase de Pruebas:** Testeo exhaustivo de la aplicación para identificar y corregir errores, así como para asegurar la funcionalidad y usabilidad del sistema.
- **Fase de Implementación:** Despliegue de la aplicación en un entorno de producción y capacitación a los usuarios finales.
- **Fase de Mantenimiento:** Soporte y mantenimiento continuo para resolver cualquier problema post-lanzamiento y realizar mejoras necesarias.


# Pasos para Descargar y Hacer Funcionar el Proyecto en tu Máquina

1. **Clonar el Repositorio:**
    ```sh
    git clone https://github.com/10ElvisDqs/sistema-venta.git
    cd sistema-venta
    ```

2. **Instalar Dependencias con Composer:**
    ```sh
    composer install
    ```

3. **Configurar el Archivo de Entorno:**
    ```sh
    cp .env.example .env
    php artisan key:generate
    ```

4. **Editar el Archivo `.env`:**
    Configura las variables de entorno para la base de datos y otras configuraciones necesarias:
    ```env
    DB_CONNECTION=mysql
    DB_HOST=mysql
    DB_PORT=3306
    DB_DATABASE=nombre_de_tu_base_de_datos
    DB_USERNAME=nombre_de_usuario
    DB_PASSWORD=contraseña
    ```

5. **Crear y Ejecutar los Contenedores con Docker:**
    Asegúrate de tener Docker y Docker Compose instalados.
    ```sh
    docker-compose up -d
    ```

6. **Migrar la Base de Datos:**
    Dentro del contenedor de la aplicación, ejecuta las migraciones para crear las tablas en la base de datos.
    ```sh
    docker-compose exec laravel.test php artisan migrate
    ```

7. **Acceder a la Aplicación:**
    Abre tu navegador web y visita `http://localhost` para ver la aplicación en funcionamiento.

### Archivo `docker-compose.yml`

```yaml
version: '3.8'

services:
    laravel.test:
        build:
            context: ./vendor/laravel/sail/runtimes/8.3
            dockerfile: Dockerfile
            args:
                WWWGROUP: '${WWWGROUP}'
        image: sail-8.3/app
        extra_hosts:
            - 'host.docker.internal:host-gateway'
        ports:
            - '${APP_PORT:-80}:80'
            - '${VITE_PORT:-5173}:${VITE_PORT:-5173}'
        environment:
            WWWUSER: '${WWWUSER}'
            LARAVEL_SAIL: 1
            XDEBUG_MODE: '${SAIL_XDEBUG_MODE:-off}'
            XDEBUG_CONFIG: '${SAIL_XDEBUG_CONFIG:-client_host=host.docker.internal}'
            IGNITION_LOCAL_SITES_PATH: '${PWD}'
        volumes:
            - '.:/var/www/html'
        networks:
            - sail
        depends_on:
            - mysql
    mysql:
        image: 'mysql/mysql-server:8.0'
        ports:
            - '${FORWARD_DB_PORT:-3306}:3306'
        environment:
            MYSQL_ROOT_PASSWORD: '${DB_PASSWORD}'
            MYSQL_ROOT_HOST: '%'
            MYSQL_DATABASE: '${DB_DATABASE}'
            MYSQL_USER: '${DB_USERNAME}'
            MYSQL_PASSWORD: '${DB_PASSWORD}'
            MYSQL_ALLOW_EMPTY_PASSWORD: 1
        volumes:
            - 'sail-mysql:/var/lib/mysql'
            - './vendor/laravel/sail/database/mysql/create-testing-database.sh:/docker-entrypoint-initdb.d/10-create-testing-database.sh'
        networks:
            - sail
        healthcheck:
            test:
                - CMD
                - mysqladmin
                - ping
                - '-p${DB_PASSWORD}'
            retries: 3
            timeout: 5s

networks:
    sail:
        driver: bridge

volumes:
    sail-mysql:
        driver: local
