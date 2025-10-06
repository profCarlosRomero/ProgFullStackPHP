document.addEventListener("DOMContentLoaded", () => {
    document.getElementById("username").addEventListener("keypress", (e) => {
    const regex = /^[a-zA-Z0-9]$/; // Solo letras y números
    
    if (!regex.test(e.key)) {
            e.preventDefault();
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

        // Validaciones
        if (username === "") {
            errors.push("El nombre de usuario es obligatorio.");
        } else if (username.length < 3) {
            errors.push("El nombre de usuario debe tener al menos 3 caracteres.");
        }

        if (password === "") {
            errors.push("La contraseña es obligatoria.");
        } else if (password.length < 4) {
            errors.push("La contraseña debe tener al menos 6 caracteres.");
        }

        // Si hay errores, prevenimos el envío
        if (errors.length > 0) {
            e.preventDefault();
            errorMessage.textContent = errors.join(" ");
            errorMessage.style.display = "block";
        }
    });
});

/*
const form = document.getElementById("loginForm");
const usernameInput = document.getElementById("username");
const passwordInput = document.getElementById("password");
const errorMessage = document.getElementById("errorMessage");

form.addEventListener("submit", (event) => {
    // Limpiamos errores previos
    errorMessage.style.display = "none";
    errorMessage.textContent = "";

    const username = usernameInput.value.trim();
    const password = passwordInput.value.trim();
    let errors = [];

    // Validaciones
    if (username === "") {
        errors.push("El nombre de usuario es obligatorio.");
    } else if (username.length < 3) {
        errors.push("El nombre de usuario debe tener al menos 3 caracteres.");
    }

    if (password === "") {
        errors.push("La contraseña es obligatoria.");
    } else if (password.length < 6) {
        errors.push("La contraseña debe tener al menos 6 caracteres.");
    }

    // Si hay errores, prevenimos el envío
    if (errors.length > 0) {
        event.preventDefault();
        errorMessage.textContent = errors.join(" ");
        errorMessage.style.display = "block";
    }
});
*/