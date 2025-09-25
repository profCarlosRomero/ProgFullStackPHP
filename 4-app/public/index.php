<?php

session_start();

require_once __DIR__ . '/../app/controller/UsuarioController.php';
$usuarioController = new UsuarioController();

require_once __DIR__ . '/../app/controller/AuthController.php';
$authController = new AuthController();

$ruta = $_GET['ruta'] ?? 'home';

switch ($ruta) {
    case 'home':
        require_once __DIR__ . '/../app/view/home.view.html';
        break;

    case 'login':
        
        if (isset($_SESSION['usuario'])) {
            header('Location: index.php?ruta=tablero');
        } else {
            $authController->login();
        }
        break;

    case 'logout':
        if (!isset($_SESSION['usuario'])) {
            header('Location: index.php?ruta=tablero');
        } else {
            $authController->logout();
        }
        break;

    case 'users':
        // require_once __DIR__ . '/../app/view/users.view.php';
        $usuarioController->listAll();
        break;

    case 'user-delete':
        $usuarioController->delete();
        break;
    
    case 'user-create':
        $usuarioController->create();
        break;

    case 'user-select':
        $usuarioController->getByCI();
        break;

    case 'user-update':
        $usuarioController->update();
        break;

    case 'tablero':
        require_once __DIR__ . '/../app/view/tablero.view.php';
        break;

    default:
        echo '<h1>Error 404</h1>';
        break;
}