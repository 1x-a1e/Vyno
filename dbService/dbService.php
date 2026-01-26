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
            # Create a new PDO connection
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbName};port={$this->port}", $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    function loginUserByUsername($username, $password): bool {
        try {
            $query = $this->conn->prepare("select User.usernameProfile, User.password from User where (User.password = :password) and (User.usernameProfile = :username);");
            $query->bindParam(':username', $username);
            $query->bindParam(':password', $password);
            $query->execute();

            if ($query->rowCount() > 0) {
                return true;
            }
        }
        catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        return false;
    }
}
?>