<?php
require_once 'config.php';

// Run a simple query to check if the database is connected correctly
$query = "SELECT NOW()";
$result = $conn->query($query);

if ($result) {
    $row = $result->fetch_assoc();
    echo "Database connection successful. Server time: " . $row["NOW()"];
} else {
    echo "Error: " . $conn->error;
}

// Close the connection
$conn->close();
?>
