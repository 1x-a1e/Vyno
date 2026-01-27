<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require __DIR__ . '/../../service/dbService.php';

    $nome = $_POST['nome'] ?? '';
    $cognome = $_POST['cognome'] ?? '';
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';


    $dbService = new dbService();

    if ($nome === '' || $cognome === '' || $username === '' || $email === '' || $password === '') {
        http_response_code(400);
        header("Location: /register?error=All fields are required");
        exit();
    }
    else {
        try {
            # check email
            if ($dbService->livesUserByEmail($email)) {
                http_response_code(400);
                header("Location: /register?error=Registration failed");
                exit();
            }

            # check username
            if ($dbService->livesUserByUsername($username)) {
                http_response_code(400);
                header("Location: /register?error=Username already exists");
                exit();
            }

            # registrazione utente
            if ($dbService->registerUser($nome, $cognome, $username, $email, $password)) {
                http_response_code(302);
                header("Location: /login?success=Account created");
                exit();
            } else {
                http_response_code(400);
                header("Location: /register?error=Registration failed");
                exit();
            }
        }
        catch (Exception $e) {
            print_r($e->getMessage());
            http_response_code(500);
            header("Location: /register?error=Server error");
            exit(); 
        }
    }
}

?>