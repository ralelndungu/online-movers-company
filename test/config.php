<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "Moha1234";
$dbname = "online_movers";

// Create a new connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Successfully connected to the database";
}
if (!extension_loaded('mysqli')) {
    dl('php_mysqli.dll');
}

// Close the connection
$conn->close();
?>
