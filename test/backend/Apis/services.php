<?php
require_once 'config.php';
header('Content-Type: application/json');

try {
    $stmt = $conn->prepare("SELECT * FROM services");
    $stmt->execute();
    $services = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($services);
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>