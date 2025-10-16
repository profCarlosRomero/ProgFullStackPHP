let j1_poke = JSON.parse(localStorage.getItem("j1")) || [];
let j2_poke = JSON.parse(localStorage.getItem("j2")) || [];
const maxPoke = 3;

document.addEventListener('DOMContentLoaded', async () => {
    if (j1_poke.length == 0 && j2_poke.length == 0) {
        await getPokemonRandom(j1_poke);
        console.log("j1_poke");
        console.log(j1_poke);

        await getPokemonRandom(j2_poke);
        console.log("j2_poke");
        console.log(j2_poke);

        await saveLocalStorage();
    }
    
    await loadImgPkmn(j1_poke.concat(j2_poke));
});

async function getPokemonRandom(pokeArray) {
    for (let i = 0; i < maxPoke; i++) {
        const num = Math.floor(Math.random() * 151) + 1;
        
        const res = await fetch(`https://pokeapi.co/api/v2/pokemon/${num}`);
        const pokemonApi = await res.json();

        const auxStats = [];
        pokemonApi.stats.forEach(stat => {
            if (stat.stat.name != "hp") {
                const auxStat = {
                    statName: stat.stat.name,
                    statValue: stat.base_stat
                }
                auxStats.push(auxStat);
            }
        });

        const pokeImgUrl = pokemonApi.sprites.other['official-artwork'].front_default;
        const pokemon = {
            pokeName: pokemonApi.name,
            pokeStats: auxStats,
            pokeImg: pokeImgUrl,
            turno: 0
        };
        pokeArray.push(pokemon);
    }
}

async function loadImgPkmn(pokeArray) {
    const cards = document.querySelectorAll(".card");

    let i = 0;
    cards.forEach(card => {
        let statTooltip = '';
        
        pokeArray[i].pokeStats.forEach(stat => {
                statTooltip += `${stat.statName}: ${stat.statValue} | `
            }); 
        // const stats = pokeArray[i].pokeStats;
        // for (const statName in stats) {
        //     statTooltip += `${statName}: ${stats[statName]} | `;
        // }
        card.setAttribute("data-tooltip", statTooltip);
        card.querySelector(".card-name").textContent = `${String(pokeArray[i].pokeName).charAt(0).toUpperCase()}${String(pokeArray[i].pokeName).substring(1, String(pokeArray[i].pokeName).length)}`;
        card.querySelector(".card-image").src = pokeArray[i].pokeImg;

        i++;
    });
}

async function saveLocalStorage() {
    localStorage.setItem("j1", JSON.stringify(j1_poke));
    localStorage.setItem("j2", JSON.stringify(j2_poke));
    console.log(localStorage.getItem("j1"));
    console.log(localStorage.getItem("j2"));
}