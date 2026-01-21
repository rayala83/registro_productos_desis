<?php
include 'conexion.php';


if (isset($_GET['bodega_id'])) {
    header('Content-Type: application/json');
    try {
        $stmt = $pdo->prepare("SELECT id, nombre FROM sucursales WHERE bodega_id = :id ORDER BY nombre");
        $stmt->execute(['id' => $_GET['bodega_id']]);
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    } catch (PDOException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
    exit;
}

try {
    $stmtB = $pdo->query("SELECT id, nombre FROM bodegas ORDER BY nombre");
    $bodegas = $stmtB->fetchAll(PDO::FETCH_ASSOC);

    $stmtM = $pdo->query("SELECT id, nombre FROM monedas ORDER BY nombre");
    $monedas = $stmtM->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $bodegas = [];
    $monedas = [];
}
?>