<?php
class Database {
    private $db;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        try {
            $this->db = new PDO('sqlite:backend/db.sqlite3');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getDb() {
        return $this->db;
    }
}
?>
