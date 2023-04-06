<?php
require_once '../config.php';

header('Content-Type: application/json');

$db = new Database();
$conn = $db->getDb();

try {
    $stmt = $conn->prepare("SELECT * FROM testimonials");
    $stmt->execute();
    $testimonials = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($testimonials);
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}