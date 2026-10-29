# Esquema Programático - Curso de PHP Avanzado

Este documento detalla la estructura modular, los objetivos específicos y los archivos asociados para el nivel avanzado del curso de PHP.

---

## 🔀 Módulo 1: Enrutamiento Avanzado (Router Custom)
* **Objetivo:** Interceptar las peticiones del servidor de manera centralizada para direccionar la lógica de la aplicación sin depender de archivos físicos estáticos.
* **Temas Clave:**
  * Configuración de controladores frontales y reglas de reescritura.
  * Análisis de URI, segmentación de rutas y captura de parámetros dinámicos.
  * Gestión de respuestas para rutas inexistentes (Error 404).
* **Archivo Asociado:** `01_router.php`

---

## ⚡ Módulo 2: Desarrollo de APIs RESTful Nativas
* **Objetivo:** Transformar PHP en un backend capaz de comunicarse mediante una arquitectura desacoplada orientada a servicios.
* **Temas Clave:**
  * Manipulación de cabeceras HTTP y políticas de control de acceso (CORS).
  * Gestión de los verbos HTTP (`GET`, `POST`, `PUT`, `DELETE`).
  * Lectura de payloads en formato JSON crudo y emisión de códigos de estado HTTP normalizados.
* **Archivo Asociado:** `02_api_rest.php`

---

## 🔐 Módulo 3: Autenticación Stateless con JWT
* **Objetivo:** Implementar mecanismos modernos de autenticación y autorización seguros para aplicaciones distribuidas.
* **Temas Clave:**
  * Estructura y componentes de un Token JWT (Header, Payload, Signature).
  * Encriptación y firma digital utilizando algoritmos HMAC SHA-256 nativos de PHP.
  * Validación de integridad y control de tiempo de expiración de tokens.
* **Archivo Asociado:** `03_jwt_auth.php`

---

## 🌐 Módulo 4: Comunicación Externa con cURL
* **Objetivo:** Dotar al sistema de la capacidad de interactuar fluidamente con pasarelas de pago, APIs externas y servicios de terceros.
* **Temas Clave:**
  * Inicialización y configuración avanzada de sesiones cURL.
  * Envío de peticiones HTTP personalizadas con cabeceras y cuerpos JSON.
  * Control de tiempos de espera (`timeouts`) y captura de errores de red.
* **Archivo Asociado:** `04_curl_service.php`

---

## 🚀 Módulo 5: Optimización y Procedimientos Almacenados en Base de Datos
* **Objetivo:** Elevar el rendimiento del servidor delegando la lógica de negocio pesada directamente al motor de base de datos de forma segura.
* **Temas Clave:**
  * Uso de índices estratégicos para optimizar consultas de alto tráfico.
  * Creación y llamada de Procedimientos Almacenados (`Stored Procedures`).
  * Ejecución segura desde PHP utilizando sentencias preparadas de MySQLi.
* **Archivo Asociado:** `05_stored_procedures.php`

---

## 📋 Metodología de Estudio
1. Cada módulo cuenta con un archivo ejecutable autocontenido con comentarios técnicos detallados.
2. Se fomenta el desarrollo de arquitecturas limpias y seguras bajo entornos locales estructurados.