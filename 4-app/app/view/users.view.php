<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jugadores - PokeCard</title>
    <link rel="stylesheet" href="assets/style.users.css">
    <link rel="stylesheet" href="assets/style.header.css">
</head>
<body>
    <?php include_once __DIR__ . '/partials/header.php'; ?>
    <div class="main-container">
        <h1 class="page-title">Jugadores PHP</h1>
        <a href="#" class="add-user-button">Agregar Usuario</a>
        <ul class="user-list">
            <?php foreach ($usuarios as $usuario) { ?>
                <li class="user-item">
                    <div class="user-info">
                        <span class="user-name"><?php echo htmlspecialchars($usuario['ci']); ?></span>
                        <span class="user-name"><?php echo htmlspecialchars($usuario['nombre']); ?></span>
                        <span class="user-name"><?php echo htmlspecialchars($usuario['apellido']); ?></span>
                        <span class="user-name"><?php echo htmlspecialchars($usuario['user_name']); ?></span>
                    </div>
                    <div class="user-actions">
                            <button class="action-button reset-button" id="update-user-button" data-ci="<?php echo htmlspecialchars($usuario['ci']); ?>">Modificar</button>
                        <form method="POST" action="index.php?ruta=user-delete" style="display:inline;">
                            <input type="hidden" name="ci" value="<?php echo htmlspecialchars($usuario['ci']); ?>">
                            <button class="action-button delete-button">Eliminar</button>
                        </form>
                    </div>
                    <div class="user-score">
                        <span class="score-label">Score</span>
                        <span class="user-name"><?php echo htmlspecialchars($usuario['puntaje']); ?></span>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>

    <!-- Modal para agregar usuario -->
    <div id="userModal" class="modal">
        <div class="modal-content">
            <span class="close-button">&times;</span>
            <h2>Agregar Nuevo Usuario</h2>
            <form action="index.php?ruta=user-create" method="post" class="addUser-form">
                <input type="text" id="ci" name="ci" placeholder="Cedula" class="input-field" required>
                <input type="text" id="nombre" name="nombre" placeholder="Prueba" class="input-field" required>
                <input type="text" id="apellido" name="apellido" placeholder="Prueba" class="input-field" required>
                <input type="text" id="username" name="username" placeholder="pruebita" class="input-field" required>
                <input type="password" id="password" name="password" placeholder="contraseña" class="input-field" required>
                <button type="submit" class="addUser-button">Agregar</button>
            </form>
        </div>
    </div>

    <!-- Modal para modificar usuario -->
    <div id="editUserModal" class="modal">
        <div class="modal-content">
            <span id="edit-close-button" class="close-button">&times;</span>
            <h2>Modificar Usuario</h2>
            <form action="index.php?ruta=user-update" method="post" class="addUser-form">
                <input type="text" id="editCi" name="ci" placeholder="Cedula" class="input-field" readonly>
                <input type="text" id="editNombre" name="nombre" placeholder="Prueba" class="input-field" required>
                <input type="text" id="editApellido" name="apellido" placeholder="Prueba" class="input-field" required>
                <button type="submit" class="addUser-button">Agregar</button>
            </form>
        </div>
    </div>

    <script>
        // Abrir modal
        const addUserButton = document.querySelector('.add-user-button');
        const modal = document.getElementById('userModal');
        const closeButton = document.querySelector('.close-button');

        addUserButton.addEventListener('click', (e) => {
            e.preventDefault();
            modal.style.display = 'flex';
        });

        closeButton.addEventListener('click', () => {
            modal.style.display = 'none';
        });

        window.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.style.display = 'none';
            }
        });

        const editModal = document.getElementById('editUserModal');
        const editCloseButton = document.getElementById('edit-close-button');

        document.querySelectorAll('#update-user-button').forEach(button => {
            button.addEventListener('click', async (e) => {
                e.preventDefault();

                const ci = button.getAttribute('data-ci'); // atributo con el CI del usuario
                
                try {
                    const res = await fetch(`index.php?ruta=user-select&ci=${ci}`);
                    const data = await res.json();
                    document.getElementById('editCi').value = data.ci;
                    document.getElementById('editNombre').value = data.nombre;
                    document.getElementById('editApellido').value = data.apellido;
                    editModal.style.display = 'flex';
                } catch (err) {
                    console.error(err);
                }
                
            });
        });

        editCloseButton.addEventListener('click', () => {
            editModal.style.display = 'none';
        });

        window.addEventListener('click', (e) => {
            if (e.target === editModal) {
                editModal.style.display = 'none';
            }
        });

    </script>
</body>
</html>