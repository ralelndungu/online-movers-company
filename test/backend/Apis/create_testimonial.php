<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $testimonial = $_POST["testimonial"];

    try {
        $db = new PDO("sqlite:your_database_name.db");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $db->prepare("INSERT INTO testimonials (name, testimonial) VALUES (:name, :testimonial)");
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
