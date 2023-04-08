<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    require_once 'config.php';

    try {
        $conn = $db->getDb(); // Get the PDO instance
        $stmt = $conn->query("SELECT * FROM inquiries"); // Use the query() method on the PDO instance
        $inquiries = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($inquiries);
    } catch (PDOException $e) {
        echo json_encode(["message" => "Error: " . $e->getMessage()]);
    }
} else {
    http_response_code(405);
    echo json_encode(["message" => "Method not allowed."]);
}
?>
