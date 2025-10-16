let idPokePlay1 = 0;
let idPokePlay2 = 0;

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

            e.dataTransfer.setData("text/plain", JSON.stringify({
                name: card.querySelector(".card-name").textContent,
                img: card.querySelector(".card-image").src,
                player: playerName,
                idpkmn: card.id,
                tooltip: card.getAttribute("data-tooltip")
            }));
        });
    });

    // 2. Permitir drop
    gameBoard.addEventListener("dragover", (e) => {
        e.preventDefault();
    });

    let playJ1 = false;
    let playJ2 = false;
    // 3. Manejar drop
    gameBoard.addEventListener("drop", (e) => {
        e.preventDefault();
        const data = JSON.parse(e.dataTransfer.getData("text/plain"));

        const newCard = document.createElement("div");
        newCard.classList.add("card");
        newCard.setAttribute("pkmnID", data.idpkmn);
        newCard.setAttribute("data-tooltip", data.tooltip);

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
                alert("Carta existente " + card.id);
                cardExist = true;
            }
        });

        // Posicionamiento centrado solo si viene del jugador de arriba (top)
        // if (data.player === "player-1") {
        if (String(data.idpkmn).includes("p1")) {
            newCard.style.position = "absolute";
            newCard.style.top = "10px"; // margen desde arriba
            newCard.style.left = "50%";
            newCard.style.transform = "translateX(-50%)"; // centrar horizontalmente
            newCard.id = "player-1";

            playJ1 = true;
        }

        // if (data.player === "player-2") {
        if (String(data.idpkmn).includes("p2")) {
            newCard.style.position = "absolute";
            newCard.style.bottom = "10px"; // margen
            newCard.style.left = "50%";
            newCard.style.transform = "translateX(-50%)"; // centrar horizontalmente
            newCard.id = "player-2";
            playJ2 = true;
        }

        if (!cardExist) {
            gameBoard.appendChild(newCard);

            if(newCard.id === "player-1") {
                idPokePlay1 = parseInt(String(data.idpkmn).at(String(data.idpkmn).length - 1)) - 1; // Obtengo el id del pokemon jugado
                j1_poke[idPokePlay1].turno++;
            }
            if(newCard.id === "player-2") {
                idPokePlay2 = parseInt(String(data.idpkmn).at(String(data.idpkmn).length - 1)) - 1; // Obtengo el id del pokemon jugado
                j2_poke[idPokePlay2].turno++;
            }
        }

    });

    // Hacer que gameBoard sea relativo para que las cards absolutas se posicionen dentro
    gameBoard.style.position = "relative";

    let stat = randomStat();

    let contTurno = 1;
    document.getElementById("partida").addEventListener("submit", (e) => {
        e.preventDefault();

        let statPokeJ1;
        let statPokeJ2;
        for (const statPokePlay of j1_poke[idPokePlay1].pokeStats) {
            if (stat.toLowerCase() == statPokePlay.statName.toLowerCase()) {
                statPokeJ1 = statPokePlay.statValue
            }
        }
        for (const statPokePlay of j2_poke[idPokePlay2].pokeStats) {
            if (stat.toLowerCase() == statPokePlay.statName.toLowerCase()) {
                statPokeJ2 = statPokePlay.statValue
            }
        }
        
        if (statPokeJ1 > statPokeJ2) {
            alert("Ganó jugador 1");
        } else if(statPokeJ1 < statPokeJ2) {
            alert("Ganó jugador 2");
        } else {
            alert("Empate");
        }

        sendGame(j1Name, j1_poke);
        // sendGame(j2Name, j2_poke);
    })
});


const stats = ["Attack", "Defense", "Special-Attack", "Special-Defense", "Speed"];
function randomStat() {
    const num = Math.floor(Math.random() * 5);
    return document.getElementById("play-stat").textContent = stats.splice(num, 1).toString();
}

async function sendGame(jugador, pokes) {
    const formData = new FormData();
    formData.append("idPartida", 1);
    formData.append("jugador", jugador);
    formData.append("equipo", JSON.stringify(pokes));

    const response = await fetch("index.php?ruta=partida", {
        method: "POST",
        body: formData
    });

    const data = await response.json();
    console.log(data);
}