<?php
/**
 * Módulo 1: Enrutamiento Avanzado (Router Custom)
 * Gestiona las rutas limpias de la aplicación de forma procedural.
 */

// Obtener la ruta solicitada desde la URL (ej: /usuarios/editar/5)
$requestUri = $_SERVER['REQUEST_URI'];
$basepath = '/curso-avanzado-php/'; // Ajustar según tu entorno local

// Limpiar la ruta base de la URI
$route = str_replace($basepath, '', $requestUri);
$route = strtok($route, '?'); // Remover parámetros GET si los hay
$route = trim($route, '/');

// Dividir la ruta en segmentos para análisis (ej: ["usuarios", "editar", "5"])
$segments = explode('/', $route);

$recurso = $segments[0] ?? 'home';
$accion   = $segments[1] ?? 'index';
$parametro = $segments[2] ?? null;

echo "<h2>Enrutador Nativo PHP</h2>";
echo "Recurso detectado: <strong>" . htmlspecialchars($recurso) . "</strong><br>";
echo "Acción detectada: <strong>" . htmlspecialchars($accion) . "</strong><br>";
echo "Parámetro recibido: <strong>" . htmlspecialchars($parametro ?? 'Ninguno') . "</strong><br><hr>";

// Estructura de control para despachar la petición al controlador correspondiente
switch ($recurso) {
    case '':
    case 'home':
        echo "<p>Bienvenido a la página principal del sistema avanzado.</p>";
        break;

    case 'usuarios':
        if ($accion === 'ver' && $parametro) {
            echo "<p>Mostrando el perfil del usuario con ID: " . intval($parametro) . "</p>";
        } else {
            echo "<p>Listado general de usuarios registrados en el sistema.</p>";
        }
        break;

    case 'api':
        // Redirigir la lógica hacia un controlador de API REST
        require_once __DIR__ . '/02_api_rest.php';
        break;

    default:
        http_response_code(404);
        echo "<h3>Error 404: La ruta solicitada no existe.</h3>";
        break;
}
?>