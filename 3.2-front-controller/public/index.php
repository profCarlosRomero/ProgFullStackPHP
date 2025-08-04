<?php

// Front Controller

session_start();

$ruta = $_GET['ruta'] ?? 'home'; // ?? operador de fusión nula. Luego de PHP 7

// $ruta = isset($_GET['ruta']) ? $_GET['ruta'] : 'home'; // antes de PHP 7

switch ($ruta) {
    case 'home':
        require_once __DIR__ . '/../app/views/home.view.html';
        break;

    case 'login':
        if (isset($_SESSION['usuario'])) {
            // require_once __DIR__ . '/../app/views/perfil.php';

            header("Location: index.php?ruta=perfil");
        }
        else
            require_once __DIR__ . '/../app/controllers/login.php';
        break;

    case 'logout':
        if (isset($_SESSION['usuario']))
            require_once __DIR__ . '/../app/controllers/logout.php';
        else
            header("Location: index.php?ruta=home");
            // require_once __DIR__ . '/../app/controllers/login.php';

        break;

    case 'perfil':
        if (isset($_SESSION['usuario'])) 
            require_once __DIR__ . '/../app/views/perfil.view.php';
        else
            header("Location: index.php?ruta=home");

            // require_once '../app/views/home.html';
        break;
    
    case 'contacto':
        require_once __DIR__ . '/../app/views/contacto.view.html';
        break;
    
    default:
        echo '<h1>Error 404</h1>';
        break;
}