<?php
/**
 * Módulo 5: Base de Datos Avanzada
 * Lección: Ejecución segura de Procedimientos Almacenados con MySQLi (Prepared Statements)
 */

echo "<h2>Ejecución de Procedimientos Almacenados en MySQLi</h2>";

$host = "localhost";
$user = "root";
$pass = "";
$db   = "curso_php_avanzado";

$conexion = mysqli_connect($host, $user, $pass, $db);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

mysqli_set_charset($conexion, "utf8");

// ID de usuario que vamos a consultar
$usuarioIdBuscado = 1;

// Llamada al procedimiento almacenado usando sintaxis CALL con marcadores de posición (?)
$sql = "CALL sp_obtener_transacciones_usuario(?)";

if ($stmt = mysqli_prepare($conexion, $sql)) {
    
    // Vincular el parámetro de entrada
    mysqli_stmt_bind_param($stmt, "i", $usuarioIdBuscado);
    
    // Ejecutar el procedimiento
    if (mysqli_stmt_execute($stmt)) {
        
        // Obtener los resultados retornados por el procedimiento
        $resultado = mysqli_stmt_get_result($stmt);
        
        echo "Transacciones encontradas para el usuario ID: <strong>" . $usuarioIdBuscado . "</strong><br><br>";
        
        if (mysqli_num_rows($resultado) > 0) {
            echo "<table border='1' cellpadding='8' style='border-collapse: collapse;'>";
            echo "<tr><th>ID Transacción</th><th>Monto</th><th>Estado</th><th>Fecha</th></tr>";
            
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>" . $fila['id'] . "</td>";
                echo "<td>$" . number_format($fila['monto'], 2) . "</td>";
                echo "<td>" . htmlspecialchars($fila['estado']) . "</td>";
                echo "<td>" . $fila['fecha'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No se encontraron registros para este usuario.";
        }
        
    } else {
        echo "Error al ejecutar el procedimiento almacenado: " . mysqli_stmt_error($stmt);
    }
    
    mysqli_stmt_close($stmt);
} else {
    echo "Error al preparar la sentencia: " . mysqli_error($conexion);
}

// Cerrar conexión
mysqli_close($conexion);
?>