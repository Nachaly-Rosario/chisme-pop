
<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "conexion.php";

try {
    $sql = "SELECT id, autor, comentario, fecha
            FROM comentarios
            ORDER BY fecha DESC, id DESC";

    $stmt = $conexion->query($sql);
    $comentarios = $stmt->fetchAll();

    echo json_encode($comentarios, JSON_UNESCAPED_UNICODE);

} catch (PDOException $e) {
    error_log("Error al recuperar comentarios: " . $e->getMessage());

    http_response_code(500);
    echo json_encode([
        "success" => false,
        "message" => "No se pudieron recuperar los comentarios."
    ]);
}
?>
