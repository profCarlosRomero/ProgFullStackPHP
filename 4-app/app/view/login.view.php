<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - PokeCard</title>
    <link rel="stylesheet" href="assets/style.login.css">
</head>
<body>
    <header class="header">
        <a href="./home.view.html" class="back-link">Inicio</a>
    </header>

    <main class="container">
        <h1 class="title">PokeCard</h1>
        <div class="form-info">
            <h2 class="form-title">Jugador 1</h2>
            <p class="form-subtitle">Ingresa tu usuario y contraseña</p>
        </div>
        <form action="#" method="post" class="login-form">
            <input type="text" id="username" name="username" placeholder="usuario" class="input-field" required>
            <input type="password" id="password" name="password" placeholder="contraseña" class="input-field" required>
            <button type="submit" class="login-button">Login</button>
        </form>
    </main>
</body>
</html>