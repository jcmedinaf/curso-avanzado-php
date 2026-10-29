<?php
/**
 * Módulo 3: Autenticación Stateless con JWT (JSON Web Tokens)
 * Codificación y verificación de tokens en PHP puro.
 */

define('JWT_SECRET_KEY', 'MiClaveSecretaUltraSeguraParaTokens2026*');

/**
 * Función para generar un token JWT
 */
function generarJWT(array $payload): string {
    $header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);
    
    // Agregar tiempo de expiración (1 hora)
    $payload['exp'] = time() + 3600;
    $payloadEncrypted = json_encode($payload);

    $base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));
    $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payloadEncrypted));

    $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, JWT_SECRET_KEY, true);
    $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));

    return $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;
}

/**
 * Función para verificar la validez de un token JWT
 */
function verificarJWT(string $jwt): ?array {
    $partes = explode('.', $jwt);
    if (count($partes) !== 3) {
        return null;
    }

    [$base64UrlHeader, $base64UrlPayload, $base64UrlSignature] = $partes;

    $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, JWT_SECRET_KEY, true);
    $esperadaSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));

    if (!hash_equals($esperadaSignature, $base64UrlSignature)) {
        return null; // Firma inválida o alterada
    }

    $payload = json_decode(base64_decode(str_replace(['-', '_'], ['+', '/'], $base64UrlPayload)), true);

    if (isset($payload['exp']) && $payload['exp'] < time()) {
        return null; // Token expirado
    }

    return $payload;
}

// --- PRUEBA DE FUNCIONAMIENTO ---
echo "<h2>Sistema de Autenticación JWT Nativo</h2>";

$datosUsuario = ["id" => 42, "email" => "juan@catedradesoftware.local", "rol" => "Administrador"];
$tokenGenerado = generarJWT($datosUsuario);

echo "<strong>Token Generado:</strong><br><code style='word-break: break-all;'>" . $tokenGenerado . "</code><br><br>";

// Validar el token
$payloadValido = verificarJWT($tokenGenerado);

if ($payloadValido) {
    echo "<p style='color: green;'><strong>¡Token Válido!</strong> Datos del usuario recuperados:</p>";
    echo "<pre>" . print_r($payloadValido, true) . "</pre>";
} else {
    echo "<p style='color: red;'><strong>Token Inválido o Expirado.</strong></p>";
}
?>