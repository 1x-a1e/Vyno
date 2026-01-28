<?php
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$file = __DIR__ . $path;

if ($path !== "/" && file_exists($file) && !is_dir($file)) {
    return false;
}

$page = $path;

switch ($page) {
    case "/":
        require __DIR__ . "/pages/home/home.php";
        break;

    case "/login":
        require __DIR__ . "/pages/login/login.php";
        break;

    case "/api/login":
        require __DIR__ . "/api/login/login.php";
        break;

    case "/register":
        require __DIR__ . "/pages/register/register.php";
        break;

    case "/api/register":
        require __DIR__ . "/api/register/register.php";
        break;

    default:
        require __DIR__ . "/pages/404/404.html";
        break;
}

?>