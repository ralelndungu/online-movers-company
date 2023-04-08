<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    $db = new Database(); // Add this line
    $conn = $db->getDb(); // Add this line

    try {
        $stmt = $conn->prepare("DELETE FROM testimonials WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        echo json_encode(["message" => "Testimonial deleted successfully."]);
    } catch (PDOException $e) {
        echo json_encode(["message" => "Error: " . $e->getMessage()]);
    }
} else {
    http_response_code(405);
    echo json_encode(["message" => "Method not allowed."]);
}
?>
