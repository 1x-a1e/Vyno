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
        if (empty($username) || empty($password)) {
            return false;
        }

        try {
            # query per la selezione dell'utente
            $query = $this->conn->prepare("SELECT usernameProfile, passwd FROM Users WHERE (usernameProfile = :username) AND (passwd = :password);");
            $ex = $query->execute(
                [
                    ':username' => $username,
                    ':password' => $password
                ]
            );

            if ($ex) {
                return true;
            }
        }
        catch (PDOException $e) {
            print_r("Error: " . $e->getMessage());
        }
        return false;
    }

    function getIdFromUsername($username): int {
        if (empty($username)) {
            return -1;
        }

        try {
            $query = $this->conn->prepare("SELECT userId FROM Users WHERE usernameProfile = :username LIMIT 1;");
            $query->execute(
                [
                    ":username" => $username
                ]
            );
            $r = $query->fetchColumn();

            if ($r !== false) {
                return intval($r);
            }
        }
        catch (PDOException $e) {
            print_r("Error: " . $e->getMessage());
        }
        return -1;
    }


    # TODO: completare la funzione di registrazione (img) e hashare la password
    # gestire anche l'import dell'immagine del profilo
    function registerUser($nome, $cognome, $username, $email, $passwd): bool {
        if (empty($nome) || empty($cognome) || empty($username) || empty($email) || empty($passwd)) {
            return false;
        }

        try {
            $query = $this->conn->prepare(
                "INSERT INTO Users(nome, cognome, email, usernameProfile) VALUES (:nome, :cognome, :email, :username);"
            );

            $ex = $query->execute(
                [
                    ':nome' => $nome,
                    ':cognome' => $cognome,
                    ':email' => $email,
                    ':username' => $username
                ]
            );

            if ($ex) {
                #TODO: completare l'inserimento della password
                $query = $this->conn->prepare(
                    ""
                );
            }
        }
        catch (PDOException $e) {
            print_r("Error: " . $e->getMessage());
        }
        return false;
    }

    function livesUserByUsername($username): bool {
        if (empty($username)) {
            return false;
        }

        try {
            $query = $this->conn->prepare("SELECT nome, cognome, email, usernameProfile FROM Users WHERE usernameProfile = :username LIMIT 1;");
            $query->execute(
                [
                    ':username' => $username
                ]
            );

            if ($query->fetchColumn() > 0) {
                return true;
            }
        }
        catch (PDOException $e) {
            print_r("Error: " . $e->getMessage());
        }

        return false;
    }

    function livesUserByEmail($email): bool {
        if (empty($email)) {
            return false;
        }

        try {
            $query = $this->conn->prepare("SELECT nome, cognome, email, usernameProfile FROM Users WHERE email = :email LIMIT 1;");
            $query->execute(
                [
                    ':email' => $email
                ]
            );

            if ($query->fetchColumn() > 0) {
                return true;
            }
        }
        catch (PDOException $e) {
            print_r("Error: " . $e->getMessage());
        }

        return false;
    }
}

$conn = new dbService();
print_r($conn->getIdFromUsername("test"));
print_r("testing...\n");
?>