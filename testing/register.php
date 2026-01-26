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
                $query = $this->conn->prepare("SELECT usernameProfile, passwd FROM Users WHERE (usernameProfile = :username) AND (passwd = :password);");
                $query->bindParam(':username', $username);
                $query->bindParam(':password', $password);
                $query->execute();

                # TODO: migliorare
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

    # TODO: completare la funzione di registrazione (img) e hashare la password
    # gestire anche l'import dell'immagine del profilo
    function registerUser($nome, $cognome, $username, $email, $password): bool {
        if (!empty($nome) && !empty($cognome) && !empty($username) && !empty($email) && !empty($password)) {
            try {
                $query = $this->conn->prepare("INSERT INTO Users(nome, cognome, email, passwd, usernameProfile) VALUES (:nome, :cognome, :email, :password, :username);");
                $query->bindParam(':nome', $nome);
                $query->bindParam(':cognome', $cognome);
                $query->bindParam(':email', $email);
                $query->bindParam(':password', $password);
                $query->bindParam(':username', $username);
                $query->execute();

                print_r($query->rowCount());
            }
            catch (PDOException $e) {
                print_r("Error: " . $e->getMessage());
            }
        }
        return false;
    }
};

$test = new dbService();
$test->registerUser("Mario", "Rossi", "mariorossi", "test@example.com", "password");

?>
