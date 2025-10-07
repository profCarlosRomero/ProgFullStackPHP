<?php

require_once __DIR__ . '/../model/Usuario.php';

class AuthController {
    public function login() {
        $regex = '/^[a-zA-Z0-9]+$/';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Sanitización básica
            $username = isset($_POST['username']) ? trim(htmlspecialchars($_POST['username'])) : '';
            $pass = isset($_POST['password']) ? trim($_POST['password']) : '';

            // Validar campos vacíos
            if ($username === '' || $pass === '') {
                $mensaje = 'Debe completar todos los campos.';
                require_once __DIR__ . '/../view/login.view.php';
                exit;
            }

            // Validar la expresión regular y largo de nombre de usuario
            if (!preg_match($regex, $username) || strlen($username) < 3) {
                $mensaje = 'Nombre de usuario inválido';
                require_once __DIR__ . '/../view/login.view.php';
                exit;
            }

            // Valida largo de contraseña
            if (strlen($pass) < 4) {
                $mensaje = 'La contraseña debe tener al menos 4 caracteres.';
                require_once __DIR__ . '/../view/login.view.php';
                exit;
            }

            $usuario = (new Usuario())->getUserByUsername($username);

            if (!empty($usuario) && ($pass === $usuario['pass'])) {
                $_SESSION['usuario'] = $usuario['user_name'];
                header('Location: index.php?ruta=tablero');
                exit;
            } else {
                $mensaje = 'Usuario o contraseña incorrectos.';
                require_once __DIR__ . '/../view/login.view.php';
            }
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