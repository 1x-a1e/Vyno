<?php
require __DIR__ . '../../dbService/dbService.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = new dbService();

    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';


    }

?>