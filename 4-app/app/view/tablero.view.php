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
    <!-- <header>
        <nav class="top-nav">
            <a href="index.php" class="nav-icon"><img src="https://cdn-icons-png.flaticon.com/512/25/25694.png" alt="Home"></a>
            <a href="#" class="nav-icon"><img src="https://cdn-icons-png.flaticon.com/512/31/31924.png" alt="Calendar"></a>
            <a href="#" class="nav-icon"><img src="https://cdn-icons-png.flaticon.com/512/12/12711.png" alt="Bag"></a>
            <a href="#" class="nav-icon"><img src="https://cdn-icons-png.flaticon.com/512/107/107796.png" alt="Heart"></a>
        </nav>
    </header> -->
    <?php include_once __DIR__ . '/partials/header.php'; ?>

    <main class="main-container">
        <div class="player-section">
            <h2 class="player-name" id="player-1">Yenny</h2>
            <div class="card-row">
                <div class="card">
                    <img src="https://assets.pokemon.com/assets/cms2/img/pokedex/full/001.png" alt="Bulbasaur"
                        class="card-image">
                    <span class="card-name">Bulbasaur</span>
                </div>
                <div class="card">
                    <img src="https://assets.pokemon.com/assets/cms2/img/pokedex/full/001.png" alt="Bulbasaur"
                        class="card-image">
                    <span class="card-name">Bulbasaur</span>
                </div>
                <div class="card">
                    <img src="https://assets.pokemon.com/assets/cms2/img/pokedex/full/001.png" alt="Bulbasaur"
                        class="card-image">
                    <span class="card-name">Bulbasaur</span>
                </div>
            </div>
        </div>

        <div class="game-board">
        </div>

        <div class="player-section">
            <!-- <h2 class="player-name">Omar</h2> -->
            <h2 class="player-name" id="player-2"><?= $_SESSION['usuario'] ?></h2>
            <a href="index.php?ruta=logout&<?= $_SESSION['usuario'] ?>" class="nav-icon">Logout</a>
            <div class="card-row">
                <div class="card">
                    <img src="https://assets.pokemon.com/assets/cms2/img/pokedex/full/001.png" alt="Bulbasaur"
                        class="card-image">
                    <span class="card-name">Bulbasaur</span>
                </div>
                <div class="card">
                    <img src="https://assets.pokemon.com/assets/cms2/img/pokedex/full/001.png" alt="Bulbasaur"
                        class="card-image">
                    <span class="card-name">Bulbasaur</span>
                </div>
                <div class="card">
                    <img src="https://assets.pokemon.com/assets/cms2/img/pokedex/full/001.png" alt="Bulbasaur"
                        class="card-image">
                    <span class="card-name">Bulbasaur</span>
                </div>
            </div>
        </div>
    </main>
    
    <script src="assets/js/tablero.js"></script>

</body>

</html>