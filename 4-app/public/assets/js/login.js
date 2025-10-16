document.addEventListener("DOMContentLoaded", () => {
    document.getElementById("username").addEventListener("keypress", (e) => { 
        const regex = /^[a-zA-Z0-9]$/; // Solo letras y números (string de 1 solo caracter)
        if (!regex.test(e.key)) {
                e.preventDefault(); // Se consume el evento de la tecla presionada y por lo tanto no se escribe
            }
    });

    const usernameInput = document.getElementById("username");
    const passwordInput = document.getElementById("password");
    const errorMessage = document.getElementById("errorMessage");

    document.querySelector(".login-form").addEventListener("submit", (e) => {
        // Limpiamos errores previos
        errorMessage.style.display = "none";
        errorMessage.textContent = "";

        const username = usernameInput.value.trim();
        const password = passwordInput.value.trim();
        let errors = [];

        const regex = /^[a-zA-Z0-9]+$/; // Solo letras y números

        // Validaciones
        if (username === "") {
            errors.push("El nombre de usuario es obligatorio.");
        } else if (!regex.test(username) || username.length < 3) {
            errors.push("El nombre de usuario no es válido.");
        }

        if (password === "") {
            errors.push("La contraseña es obligatoria.");
        } else if (password.length < 4) {
            errors.push("La contraseña debe tener al menos 4 caracteres.");
        }

        // Si hay errores, prevenimos el envío
        if (errors.length > 0) {
            e.preventDefault();
            errorMessage.textContent = errors.join(" ");
            errorMessage.style.display = "block";
        }
    });
});