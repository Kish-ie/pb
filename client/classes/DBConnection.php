<?php
class DBConnection {
    private $host = "198.251.88.32";
    private $username = "pbinstituteofre_25";
    private $password = "BF3tHtZ4qKeMzngHrhmE";
    private $database = "pbinstituteofre_25";
    private $conn;

    public function __construct() {
        if (!isset($this->conn)) {
            try {
                $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
                if ($this->conn->connect_error) {
                    throw new Exception("Connection failed: " . $this->conn->connect_error);
                }
            } catch (Exception $e) {
                error_log("Database connection error: " . $e->getMessage());
                $this->conn = null;
            }
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function close() {
        if ($this->conn) {
            $this->conn->close();
            $this->conn = null;
        }
    }
}