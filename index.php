<?php
# File routing

$page = $_SERVER['REQUEST_URI'];

switch ($page) {
    case "/home":
        require __DIR__ . '/pages/home/home.php';
        break;
    case "/login":
        require __DIR__ . '/pages/login/index.html';
        break;
    default:
        require __DIR__ . '/pages/404/404.php';
        break;
}

?>