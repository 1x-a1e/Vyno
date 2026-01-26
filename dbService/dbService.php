<?php

class dbService {
    # parametri di connessione per il database
    private $host = "127.0.0.1";
    private $port = 3306;
    private $user = "root";
    private $password = "";
    private $dbName = "VYNOTesting";
    private $conn;

    # inizializza la connessione al database tramite il costrutto
    function __construct() {
        try {
            # creazione della connessione
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbName};port={$this->port}", $this->user, $this->password);
            # disabilizzazione della emulazione del codice preparato in php
            $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            # impostazione del modo di gestione degli errori
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    function loginUserByUsername($username, $password): bool {
        # controllo se i parametri non sono vuoti
        if (!empty($username) && !empty($password)) {
            try {
                # query per la selezione dell'utente
                $query = $this->conn->prepare("SELECT usernameProfile, password FROM User WHERE (usernameProfile = :username) AND (password = :password);");
                $query->bindParam(':username', $username);
                $query->bindParam(':password', $password);
                $query->execute();

                echo $query->rowCount();

                # controllo se la query riceve almeno un output maggiore di 0
                if ($query->rowCount() > 0) {
                    return true;
                }
            }
            catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
        return false;
    }

    function registerUser($nome, $cognome, $username, $email, $password, $profileImagePath): bool {
        if (!empty($nome) && !empty($cognome) && !empty($username) && !empty($email) && !empty($password)) {
            try {
                $query = $this->conn->prepare("");
            }
            catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
        return false;
    }
}
?>