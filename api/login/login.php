<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    # connessione con la classe per la gestione del database
    require __DIR__ . '/../../dbService/dbService.php';

    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    try {
        $dbService = new dbService();

        if ($dbService->loginUserByUsername($username, $password)) {
            # creazione dell'array di sessione per l'utente
            $user = [
                'username' => $username
            ];

            # inizializzazione sessione
            session_start();
            # salvataggio dei dati dell'utente nella sessione
            $_SESSION['user'] = $user;

            http_response_code(200);
            header("Location: /home");
            exit();
        }
        else {
            http_response_code(401);
            header("Location: /login?error=invalid credentials");
            exit();
        }

    }
    catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>