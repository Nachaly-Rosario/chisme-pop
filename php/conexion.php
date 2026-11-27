<?php

$host = "sql107.infinityfree.com";
$dbname = "if0_43546417_chismepop";
$username = "if0_43546417";
$password = "sxGYaIuSXP9LgjW";

try {
    $conexion = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password
    );

    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    error_log("Error de conexión: " . $e->getMessage());
    http_response_code(500);
    die("Error al conectar con la base de datos.");
}
?>
