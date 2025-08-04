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
    <p>Se encuentra en login.php</p>

    <h1>Iniciar sesión</h1>

    <form action="index.php?ruta=login" method="post">
        <label for="txtUsuario">Usuario</label>
        <input type="text" name="usuario" id="txtUsuario">
        <label for="txtContraseña">Contraseña</label>
        <input type="text" name="contraseña" id="txtContraseña">
        <br><br>
        <button type="submit">Ingresar</button>
        <?php if (isset($mensaje)) { ?>
            <p style="color:red"><?= htmlspecialchars($mensaje) ?></p>
        <?php } ?>
    </form>
</body>
</html>