<?php
require_once __DIR__ . '/../src/config/database.php';

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'login';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

$controllerFile = '../src/controllers/' . ucfirst($controller) . 'Controller.php';

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controllerClass = ucfirst($controller) . 'Controller';
    $controllerInstance = new $controllerClass();
    $controllerInstance->$action();
} else {
    echo "Controlador não encontrado.";
}
?>