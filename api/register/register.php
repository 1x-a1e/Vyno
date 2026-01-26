<?php
# TODO: sistemare la registrazione
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require __DIR__ . '/../../dbService/dbService.php';

    $nome = $_POST['nome'] ?? '';
    $cognome = $_POST['cognome'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $username = $_POST['username'] ?? '';

    $dbService = new dbService();

    if ($dbService->registerUser($nome, $cognome, $username, $email, $password)) {
        http_response_code(201);
        header("Location: /login?success=account created");
        exit();
    } else {
        http_response_code(400);
        header("Location: /register?error=registration failed");
        exit();
    }
}

?>