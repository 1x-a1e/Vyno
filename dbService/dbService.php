<?php

class dbService {
    private $host = "127.0.0.1";
    private $port = 3306;
    private $user = "root";
    private $password = "";
    private $dbName = "VYNOTesting";
    private $conn;

    function __construct() {
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbName};port={$this->port}", $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    function loginUser($username, $password) {
        
    }
}
?>