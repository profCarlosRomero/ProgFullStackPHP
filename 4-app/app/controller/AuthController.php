<?php

require_once __DIR__ . '/../model/Usuario.php';

class AuthController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Sanitización básica
            $username = isset($_POST['username']) ? trim(htmlspecialchars($_POST['username'])) : '';
            $pass = isset($_POST['password']) ? trim($_POST['password']) : '';

            // Validar campos vacíos
            if ($username === '' || $pass === '') {
                $mensaje = 'Debe completar todos los campos.';
                require_once __DIR__ . '/../view/login.view.php';
                return;
            }

            $usuario = (new Usuario())->getUserByUsername($username);

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
        $_SESSION = [];
        session_destroy();
        header('Location: index.php?ruta=login');
    }

}