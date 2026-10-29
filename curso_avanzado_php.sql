-- Creación de tabla con índices estratégicos
CREATE TABLE IF NOT EXISTS transacciones_log (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    monto DECIMAL(10,2) NOT NULL,
    estado VARCHAR(50) NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_usuario (usuario_id),
    INDEX idx_fecha (fecha)
) ENGINE=InnoDB;

-- Creación de un Procedimiento Almacenado en MySQL para buscar transacciones por usuario de forma eficiente
DELIMITER //
CREATE PROCEDURE sp_obtener_transacciones_usuario(IN p_usuario_id INT)
BEGIN
    SELECT id, monto, estado, fecha 
    FROM transacciones_log 
    WHERE usuario_id = p_usuario_id 
    ORDER BY fecha DESC;
END //
DELIMITER ;