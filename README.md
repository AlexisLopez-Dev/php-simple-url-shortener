# PHP Simple URL Shortener 🔗

Una aplicación web sencilla para acortar URLs desarrollada en PHP siguiendo el patrón de arquitectura **MVC (Modelo-Vista-Controlador)**. Permite gestionar redirecciones y contar los clicks realizados en cada enlace.

<img width="1919" height="440" alt="image" src="https://github.com/user-attachments/assets/b6a11229-ba50-439d-9310-87213b3ea8b2" />
<img width="622" height="331" alt="image" src="https://github.com/user-attachments/assets/fc2cdd57-594c-4e42-afc0-e44a2cbe1eb5" />



## 🚀 Características

* **Redirección de URLs:** Convierte códigos cortos en URLs de destino.
* **Contador de Visitas:** Registra automáticamente cada click en la base de datos.
* **Panel de Administración:**
    * Listado de todas las redirecciones activas.
    * Creación de nuevos enlaces cortos (con validación de código único).
    * Modificación de URLs de destino.
    * Eliminación de redirecciones.
* **Interfaz Moderna:** Diseño limpio utilizando **Bootstrap 5** y **FontAwesome** (sin dependencias complejas de JS).
* **Seguridad:** Uso de sentencias preparadas (PDO) para evitar inyección SQL.

## 🛠️ Tecnologías

* PHP
* MySQL
* HTML5 / CSS3
* Bootstrap 5 (CDN)

## ⚙️ Instalación y Configuración

1.  **Clonar el repositorio:**
    ```bash
    git clone [https://github.com/tu-usuario/php-simple-url-shortener.git](https://github.com/tu-usuario/php-simple-url-shortener.git)
    ```

2.  **Base de Datos:**
    Crea una base de datos llamada `bddirecciones` y ejecuta el siguiente script SQL para crear la tabla necesaria:

    ```sql
    CREATE TABLE direcciones (
        id INT AUTO_INCREMENT PRIMARY KEY,
        urlCorta VARCHAR(50) NOT NULL UNIQUE,
        urlLarga VARCHAR(255) NOT NULL,
        clicks INT DEFAULT 0
    );
    ```

3.  **Configuración:**
    Revisa el archivo `database/config.inc.php` para ajustar tus credenciales de base de datos y el puerto si es necesario:

    ```php
    const DNS = 'mysql:host=127.0.0.1;port=3306;dbname=bddirecciones';
    const USER = 'root';
    const PASSWORD = '';
    ```

4.  **Despliegue:**
    Sirve el proyecto desde tu servidor local (Apache/Nginx o PHP Built-in server) y accede a `admin.php` para empezar a gestionar enlaces.

## 📝 Nota Académica
Este proyecto fue desarrollado como parte de un examen práctico de **Acceso a Datos**, demostrando el uso de PDO, sesiones y arquitectura por capas en PHP.
