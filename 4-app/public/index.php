<?php

session_start();

require_once __DIR__ . '/../app/controller/UsuarioController.php';
$usuarioController = new UsuarioController();

require_once __DIR__ . '/../app/controller/AuthController.php';
$authController = new AuthController();

require_once __DIR__ . '/../app/controller/PartidaController.php';
$partidaController = new PartidaController();

$ruta = $_GET['ruta'] ?? 'home';

switch ($ruta) {
    case 'home':
        require_once __DIR__ . '/../app/view/home.view.html';
        break;

    case 'login':
        
        if (isset($_SESSION['usuario1']) && isset($_SESSION['usuario2'])) {
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

        //$partidaController = new PartidaController($_SESSION['usuario1'], $_SESSION['usuario2']);
        
        require_once __DIR__ . '/../app/view/tablero.view.php';
        break;

    case 'partida':
        $partidaController->save();
        break;

    default:
        echo '<h1>Error 404</h1>';
        break;
}