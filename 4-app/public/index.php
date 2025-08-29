<?php

require_once __DIR__ . '/../app/controller/UsuarioController.php';
$usuarioController = new UsuarioController();

$ruta = $_GET['ruta'] ?? 'home';

switch ($ruta) {
    case 'home':
        require_once __DIR__ . '/../app/view/home.view.html';
        break;

    case 'login':
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
        require_once __DIR__ . '/../app/view/tablero.view.html';
        break;

    default:
        echo '<h1>Error 404</h1>';
        break;
}