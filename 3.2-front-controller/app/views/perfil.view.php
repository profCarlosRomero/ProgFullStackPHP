<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Primer web con Front Controller</title>
</head>
<body>
    <nav>
        <ul>
            <li>
                <a href="index.php">Incio</a>
            </li>
            <li>
                <a href="index.php?ruta=login">Acceder</a>
            </li>
            <li>
                <a href="index.php?ruta=contacto">Contacto</a>
            </li>
        </ul>
    </nav>
    <p>Se encuentra en perfil.php</p>

    <h2>Bienvenido <?php echo $_SESSION['usuario'] ?></h2>
    <img src="assets/927-150x150.jpg" alt="Ejemplo de imagen desde assets" width="150">
    <a href="index.php?ruta=logout">Cerrar sesión</a>
</body>
</html>