<?php
/**
 * Módulo 2: Desarrollo de APIs RESTful Nativas
 * Manejo de verbos HTTP, cabeceras CORS y respuestas JSON estructuradas.
 */

// Configurar cabeceras para permitir peticiones AJAX (CORS) y retornar JSON
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

$method = $_SERVER['REQUEST_METHOD'];

// Capturar datos enviados en formato JSON crudo (para POST, PUT)
$inputData = json_decode(file_get_contents("php://input"), true);

switch ($method) {
    case 'GET':
        // Simulación de consulta de recursos
        http_response_code(200);
        echo json_encode([
            "status" => "success",
            "code" => 200,
            "message" => "Recursos obtenidos correctamente vía GET",
            "data" => [
                ["id" => 1, "producto" => "Servidor VPS", "precio" => 25.00],
                ["id" => 2, "producto" => "Dominio .com", "precio" => 12.00]
            ]
        ], JSON_UNESCAPED_UNICODE);
        break;

    case 'POST':
        // Simulación de creación de recurso
        if (isset($inputData['producto'], $inputData['precio'])) {
            http_response_code(201); // Creado exitosamente
            echo json_encode([
                "status" => "success",
                "code" => 201,
                "message" => "Recurso creado exitosamente",
                "recibido" => $inputData
            ], JSON_UNESCAPED_UNICODE);
        } else {
            http_response_code(400); // Solicitud incorrecta
            echo json_encode([
                "status" => "error",
                "code" => 400,
                "message" => "Faltan datos obligatorios (producto, precio)"
            ], JSON_UNESCAPED_UNICODE);
        }
        break;

    case 'DELETE':
        http_response_code(200);
        echo json_encode([
            "status" => "success",
            "code" => 200,
            "message" => "Recurso eliminado correctamente"
        ], JSON_UNESCAPED_UNICODE);
        break;

    default:
        http_response_code(405); // Método no permitido
        echo json_encode([
            "status" => "error",
            "code" => 405,
            "message" => "Método HTTP no soportado"
        ], JSON_UNESCAPED_UNICODE);
        break;
}
exit;
?>