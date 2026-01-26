<?php
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$file = __DIR__ . $path;

if ($path !== "/" && file_exists($file) && !is_dir($file)) {
    return false;
}

$page = $path;

switch ($page) {
    case "/home":
        require __DIR__ . '/pages/home/home.php';
        break;

    case "/login":
        require __DIR__ . '/pages/login/index.html';
        break;

    case "/api/login":
        require __DIR__ . '/api/login/login.php';
        break;

    default:
        require __DIR__ . '/pages/404/404.php';
        break;
}

?>