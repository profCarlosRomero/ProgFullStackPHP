<?php

require_once __DIR__ . '/../model/Usuario.php';

class UsuarioController {

    public function listAll() {
        $usuarios = (new Usuario())->getAllUsers();

        require_once __DIR__ . '/../view/users.view.php';
    }

    public function delete() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ci = $_POST['ci'];

            (new Usuario())->delete($ci);
            header('Location: index.php?ruta=users');
        }
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // (ci, nombre, apellido, user_name, pass, puntaje)
            $ci = $_POST['ci'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $user_name = $_POST['username'];
            $pass = $_POST['password'];

            (new Usuario())->create($ci, $nombre, $apellido, $user_name, $pass);

            header('Location: index.php?ruta=users');
        }
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ci = $_POST['ci'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];

            (new Usuario())->update($ci, $nombre, $apellido);

            header('Location: index.php?ruta=users');
        }
    }

    public function getByCI () {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $ci = $_GET['ci'];

            $usuario = (new Usuario())->getUserByCI($ci);

            header('Content-Type: application/json');
            echo json_encode($usuario);
            exit;
        }

    }

}

