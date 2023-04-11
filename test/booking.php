<?php
require_once 'config.php';

// Get the raw POST data
$raw_data = file_get_contents('php://input');

// Decode the JSON data
$data = json_decode($raw_data, true);

$name = isset($data['name']) ? $data['name'] : '';
$email = isset($data['email']) ? $data['email'] : '';
$message = isset($data['message']) ? $data['message'] : '';

$sql = "INSERT INTO messages (name, email, message) VALUES (:name, :email, :message)";
$stmt = $pdo->prepare($sql);
$result = $stmt->execute([
    'name' => $name,
    'email' => $email,
    'message' => $message
]);

header('Content-Type: application/json');
echo json_encode(['success' => $result]);
?>
