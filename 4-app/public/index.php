<?php

session_start();

require_once __DIR__ . '/../app/controller/UsuarioController.php';
$usuarioController = new UsuarioController();

require_once __DIR__ . '/../app/controller/AuthController.php';
$authController = new AuthController();

require_once __DIR__ . '/../app/controller/PartidaController.php';

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
        if (isset($_SESSION['usuario1']) && isset($_SESSION['usuario2'])) {
            $partidaController = new PartidaController();
            $partidaController->create($_SESSION['usuario1CI'], $_SESSION['usuario2CI']);
        }
        break;

    case 'partida':
        if (isset($_SESSION['usuario1']) && isset($_SESSION['usuario2'])) {
            $partidaController = new PartidaController();
            $partidaController->savePokes($_SESSION['partidaID']);
        }
        break;

    default:
        echo '<h1>Error 404</h1>';
        break;
}