document.addEventListener("DOMContentLoaded", () => {
    const cards = document.querySelectorAll(".card");
    const gameBoard = document.querySelector(".game-board");

    // 1. Hacer cada card arrastrable
    cards.forEach(card => {
        card.setAttribute("draggable", true);

        card.addEventListener("dragstart", (e) => {
            // Guardamos info de la card y de qué jugador viene
            const parentPlayer = card.closest(".player-section");
            const playerName = parentPlayer.firstElementChild.id;
            // alert(playerName);

            e.dataTransfer.setData("text/plain", JSON.stringify({
                name: card.querySelector(".card-name").textContent,
                img: card.querySelector(".card-image").src,
                player: playerName
            }));
        });
    });

    // 2. Permitir drop
    gameBoard.addEventListener("dragover", (e) => {
        e.preventDefault();
    });

    // 3. Manejar drop
    gameBoard.addEventListener("drop", (e) => {
        e.preventDefault();
        const data = JSON.parse(e.dataTransfer.getData("text/plain"));

        const newCard = document.createElement("div");
        newCard.classList.add("card");

        const img = document.createElement("img");
        img.src = data.img;
        img.alt = data.name;
        img.classList.add("card-image");

        const span = document.createElement("span");
        span.textContent = data.name;
        span.classList.add("card-name");

        newCard.appendChild(img);
        newCard.appendChild(span);

        const boardCards = gameBoard.childNodes;
        let cardExist = false;
        boardCards.forEach(card => {
            if (card.id === data.player) {
                alert ("Carta existente " + card.id);
                cardExist = true;
            }
        });

        // Posicionamiento centrado solo si viene del jugador de arriba (top)
        if (data.player === "player-1") {
            newCard.style.position = "absolute";
            newCard.style.top = "10px"; // margen desde arriba
            newCard.style.left = "50%";
            newCard.style.transform = "translateX(-50%)"; // centrar horizontalmente
            newCard.id = "player-1";
        }

        if (data.player === "player-2") {
            newCard.style.position = "absolute";
            newCard.style.bottom = "10px"; // margen
            newCard.style.left = "50%";
            newCard.style.transform = "translateX(-50%)"; // centrar horizontalmente
            newCard.id = "player-2";
        }

        if (!cardExist) {
            gameBoard.appendChild(newCard);
        }
        
    });

    // Hacer que gameBoard sea relativo para que las cards absolutas se posicionen dentro
    gameBoard.style.position = "relative";
});