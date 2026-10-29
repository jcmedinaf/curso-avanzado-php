# Curso de PHP Avanzado

Repositorio oficial para el desarrollo del **Curso de PHP Avanzado**, diseñado para desarrolladores que buscan dominar la arquitectura de sistemas, la seguridad a nivel criptográfico, el desarrollo de APIs RESTful y la optimización de bases de datos con `mysqli`, sin depender de frameworks pesados.

## 🎯 Objetivos del Curso
* Implementar sistemas de enrutamiento nativos (`Router Custom`) mediante control de URLs amigables.
* Desarrollar y consumir APIs RESTful robustas gestionando cabeceras CORS, verbos HTTP y códigos de estado precisos.
* Autenticar usuarios y proteger rutas mediante tokens seguros basados en **JWT (JSON Web Tokens)** implementados en PHP puro.
* Optimizar la persistencia y rendimiento de bases de datos utilizando índices avanzados y **Procedimientos Almacenados (`Stored Procedures`)**.

## 🛠️ Entorno de Requerimientos
* **Servidor Web / Entorno:** XAMPP o similar (Apache con módulo `mod_rewrite` habilitado + MySQL / MariaDB).
* **Versión de PHP:** PHP 8.0 o superior recomendado.
* **Extensiones habilitadas:** cURL, OpenSSL.

## 📂 Estructura del Repositorio
Los archivos están numerados secuencialmente para guiar el orden lógico de estudio y arquitectura:

| Orden | Archivo | Descripción Principal |
| :---: | :--- | :--- |
| 01 | `01_router.php` | Enrutamiento nativo y procesamiento de rutas amigables en el servidor. |
| 02 | `02_api_rest.php` | Creación de endpoints RESTful con control de verbos HTTP y JSON. |
| 03 | `03_jwt_auth.php` | Generación y validación de JSON Web Tokens (JWT) con criptografía nativa. |
| 04 | `04_curl_service.php` | Consumo avanzado de servicios web externos mediante peticiones cURL. |
| 05 | `05_stored_procedures.php` | Ejecución segura de Procedimientos Almacenados con consultas preparadas. |
| - | `README.md` | Documentación general e instrucciones del curso. |
| - | `ESQUEMA.md` | Contenido programático desglosado por módulos y objetivos avanzados. |

---
*Autor: Juan Carlos Medina*