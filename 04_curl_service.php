<?php
/**
 * Módulo 4: Consumo de Servicios Externos con cURL
 * Realización de peticiones HTTP POST/GET robustas hacia APIs externas.
 */

echo "<h2>Consumo de API Externa con cURL</h2>";

$urlEndpoint = "https://jsonplaceholder.typicode.com/posts";

// Datos a enviar en la petición POST
$datosEnvio = [
    "title" => "Curso Avanzado de PHP",
    "body" => "Aprendiendo a consumir servicios externos de forma nativa.",
    "userId" => 1
];

// Inicializar cURL
$ch = curl_init($urlEndpoint);

// Configurar opciones de cURL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Retornar el resultado como cadena en lugar de imprimirlo
curl_setopt($ch, CURLOPT_POST, true);           // Definir método POST
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($datosEnvio)); // Enviar payload JSON
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json; charset=UTF-8',
    'Accept: application/json'
]);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);          // Tiempo máximo de espera (timeout en segundos)

// Ejecutar la petición
$respuestaRemota = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$errorCurl = curl_error($ch);

// Cerrar la sesión cURL
curl_close($ch);

if ($errorCurl) {
    echo "<p style='color: red;'>Error en la conexión cURL: " . htmlspecialchars($errorCurl) . "</p>";
} else {
    echo "Código de Estado HTTP recibido: <strong>" . $httpCode . "</strong><br><br>";
    echo "<strong>Respuesta del Servidor Externo:</strong><br>";
    echo "<pre>" . htmlspecialchars($respuestaRemota) . "</pre>";
}
?>