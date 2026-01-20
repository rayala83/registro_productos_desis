<?php
$host = "db";
$port = "5432";
$dbname = "desis";
$user = "postgres";
$password = "12345";

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
    $pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    // Conexión exitosa
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>