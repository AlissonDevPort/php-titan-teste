<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

$request = $_SERVER['REQUEST_URI'];

$request = strtok($request, '?');

switch ($request) {
    case '/login':
        (new LoginController())->index();
        break;

    case '/funcionarios':
        (new FuncionarioController())->listar();
        break;

    case '/funcionario/cadastrar':
        (new FuncionarioController())->cadastrar();
        break;

    case '/funcionario/editar':
        (new FuncionarioController())->editar();
        break;

    case '/funcionario/excluir':
        (new FuncionarioController())->excluir();
        break;

    case '/logout':
        (new LoginController())->logout();
        break;

    default:
        echo "<h1>Página não encontrada</h1>";
        break;
}
?>
