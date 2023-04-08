<?php
require_once 'config.php';

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $description = $_POST["description"];

    $db = new Database();
    $conn = $db->getDb();

    try {
        $stmt = $conn->prepare("INSERT INTO services (name, description) VALUES (:name, :description)");
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":description", $description);
        $stmt->execute();

        echo json_encode(["message" => "Service created successfully."]);
    } catch (PDOException $e) {
        echo json_encode(["message" => "Error: " . $e->getMessage()]);
    }
} else {
    http_response_code(405);
    echo json_encode(["message" => "Method not allowed."]);
}

?>
