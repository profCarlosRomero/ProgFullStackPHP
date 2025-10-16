<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego - PokeCard</title>
    <link rel="stylesheet" href="assets/style.tablero.css">
    <link rel="stylesheet" href="assets/style.header.css">
</head>

<body>
    <?php include_once __DIR__ . '/partials/header.php'; ?>

    <main class="main-container">
        <div class="player-section">
            <h2 class="player-name" id="player-1"><?= $_SESSION['usuario1'] ?></h2>
            <a href="index.php?ruta=logout&<?= $_SESSION['usuario1'] ?>" class="nav-icon">Logout</a>
            <div class="card-row">
                <div class="card" id="p1-pk-1">
                    <img src="" alt="" class="card-image">
                    <span class="card-name"></span>
                </div>
                <div class="card" id="p1-pk-2">
                    <img src="" alt="" class="card-image">
                    <span class="card-name"></span>
                </div>
                <div class="card" id="p1-pk-3">
                    <img src="" alt="" class="card-image">
                    <span class="card-name"></span>
                </div>
            </div>
        </div>

        <div class="game-area">
            <div class="game-board"></div>

            <div id="play-stat" class="stat-indicator">Velocidad</div>
            <form action="index.php?ruta=partida" method="post" id="partida">
                <button type="submit">Siguiente</button>
            </form>
        </div>

        <div class="player-section">
            <h2 class="player-name" id="player-2"><?= $_SESSION['usuario2'] ?></h2>
            <div class="card-row">
                <div class="card" id="p2-pk-1">
                    <img src="" alt="" class="card-image">
                    <span class="card-name"></span>
                </div>
                <div class="card" id="p2-pk-2">
                    <img src="" alt="" class="card-image">
                    <span class="card-name"></span>
                </div>
                <div class="card" id="p2-pk-3">
                    <img src="" alt="" class="card-image">
                    <span class="card-name"></span>
                </div>
            </div>
        </div>
    </main>
    
    <script>
        const j1Name = "<?= $_SESSION['usuario1'] ?>";
        const j2Name = "<?= $_SESSION['usuario2'] ?>";
    </script>
    <script src="assets/js/tablero.js"></script>
    <script src="assets/js/random-poke.js"></script>
    
</body>

</html>