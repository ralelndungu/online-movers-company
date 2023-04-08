<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $testimonial = $_POST["testimonial"];

    $db = new Database();
    $conn = $db->getDb();

    try {
        $stmt = $conn->prepare("INSERT INTO testimonials (name, testimonial) VALUES (:name, :testimonial)");
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":testimonial", $testimonial);
        $stmt->execute();

        echo json_encode(["message" => "Testimonial created successfully."]);
    } catch (PDOException $e) {
        echo json_encode(["message" => "Error: " . $e->getMessage()]);
    }
} else {
    http_response_code(405);
    echo json_encode(["message" => "Method not allowed."]);
}
?>
