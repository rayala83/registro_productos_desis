<?php
include 'conexion.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $codigo = $_POST['codigo'] ?? '';
        $nombre = $_POST['nombre'] ?? '';
        $bodega = $_POST['bodega'] ?? '';
        $sucursal = $_POST['sucursal'] ?? '';
        $precio = isset($_POST['precio']) && $_POST['precio'] !== '' ? floatval($_POST['precio']) : 0;
        $moneda = $_POST['moneda'] ?? '';
        $descripcion = $_POST['descripcion'] ?? '';
        $materiales = isset($_POST['material']) ? implode(", ", $_POST['material']) : '';

        
        $sql = "INSERT INTO productos (codigo, nombre, bodega_id, sucursal_id, moneda, precio, materiales, descripcion) 
                VALUES (:codigo, :nombre, :bodega, :sucursal, :moneda, :precio, :materiales, :descripcion)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':codigo' => $codigo,
            ':nombre' => $nombre,
            ':bodega' => $bodega,
            ':sucursal' => $sucursal,
            ':moneda' => $moneda,
            ':precio' => $precio,            
            ':materiales' => $materiales,
            ':descripcion' => $descripcion
        ]);

        echo json_encode([
            "status" => "success",
            "message" => "El producto ha sido registrado correctamente en la base de datos."
        ]);

    } catch (PDOException $e) {
        echo json_encode([
            "status" => "error",
            "message" => "Error en la base de datos: " . $e->getMessage()
        ]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Método no permitido"]);
}