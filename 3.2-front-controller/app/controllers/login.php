<?php

define("USER", "admin");
define("PASS", "1234");

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // $user = isset($_POST['usuario'])
    $user = $_POST['usuario'];
    $pass = $_POST['contraseña'];

    if ($user === USER && $pass === PASS) {
        // session_start();
        $_SESSION['usuario'] = $user;
        header("Location: index.php?ruta=perfil");
    } else {
        $mensaje = "Usuario o contraseña incorrecta.";
    }
}

require_once __DIR__ . '/../views/login.view.php';
