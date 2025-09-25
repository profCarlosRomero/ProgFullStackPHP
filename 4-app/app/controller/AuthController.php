<?php

require_once __DIR__ . '/../model/Usuario.php';

class AuthController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $pass = $_POST['password'];

            $usuario = (new Usuario())->getUserByUsername($username);
            // echo '<p>' . $usuario . '</p>'; die();

            if (!empty($usuario) && ($pass === $usuario['pass'])) {
                // session_start();
                $_SESSION['usuario'] = $usuario['user_name'];
                header('Location: index.php?ruta=tablero');
            }

            $mensaje = 'Usuario o contraseña incorrectos.';
            require_once __DIR__ . '/../view/login.view.php';
        } else {
            require_once __DIR__ . '/../view/login.view.php';
        }
    }

    public function logout() {
        // session_start();
        $_SESSION = [];
        session_destroy();
        header('Location: index.php?ruta=login');
    }

}