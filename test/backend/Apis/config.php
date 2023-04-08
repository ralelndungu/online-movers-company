<?php

class Database
{
    private $host = "localhost";
    private $dbname = "your_database_name";
    private $username = "your_username";
    private $password = "your_password";
    private $conn;

    public function getDb()
    {
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        return $this->conn;
    }
}

$db = new Database();
$db->getDb();
?>
