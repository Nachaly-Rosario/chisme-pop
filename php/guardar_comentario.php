
<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    echo json_encode([
        "success" => false,
        "message" => "Método no permitido."
    ]);
    exit;
}

$nombre = trim($_POST["nombre"] ?? "");
$comentario = trim($_POST["comentario"] ?? "");

if ($nombre === "" || $comentario === "") {
    http_response_code(400);
    echo json_encode([
        "success" => false,
        "message" => "Debes completar el nombre y el comentario."
    ]);
    exit;
}

if (mb_strlen($nombre) > 100) {
    http_response_code(400);
    echo json_encode([
        "success" => false,
        "message" => "El nombre no puede superar los 100 caracteres."
    ]);
    exit;
}

if (mb_strlen($comentario) > 2000) {
    http_response_code(400);
    echo json_encode([
        "success" => false,
        "message" => "El comentario no puede superar los 2000 caracteres."
    ]);
    exit;
}

try {
    $sql = "INSERT INTO comentarios (autor, comentario)
            VALUES (:autor, :comentario)";

    $stmt = $conexion->prepare($sql);

    $stmt->execute([
        ":autor" => $nombre,
        ":comentario" => $comentario
    ]);

    echo json_encode([
        "success" => true,
        "message" => "¡Tu comentario fue publicado exitosamente!"
    ]);

} catch (PDOException $e) {
    error_log("Error al guardar comentario: " . $e->getMessage());

    http_response_code(500);
    echo json_encode([
        "success" => false,
        "message" => "No se pudo guardar el comentario."
    ]);
}
?>
