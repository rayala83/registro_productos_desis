<?php
include 'conexion.php';

$codigo = $_GET['codigo'] ?? '';

try {
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM productos WHERE codigo = :codigo");
    $stmt->execute(['codigo' => $codigo]);
    $cantidad = $stmt->fetchColumn();

    header('Content-Type: application/json');
    echo json_encode(['existe' => ($cantidad > 0)]);
    
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
?>