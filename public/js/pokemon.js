const idPokemon = document.getElementById('pokemon');
const pokemonCart = document.querySelector('.container_cart');

const getPokemon = data =>{
    fetch(`https://pokeapi.co/api/v2/pokemon/${idPokemon.textContent}`)
        .then(res => res.json())
        .then(data => setPokemon(data));
}
getPokemon();

// llenamo la carta con la información del pokemon
const setPokemon = data =>{
    pokemonCart.classList.add(data.types[0].type.name);
    pokemonCart.firstElementChild.innerHTML = data.name;
    pokemonCart.children[1].setAttribute('src', data.sprites.other.dream_world.front_default);
    const buttonBack = document.getElementById('button-back');
    buttonBack.classList.add(data.types[0].type.name);

    for(let i = 0; i < data.abilities.length; i++){
        pokemonCart.lastElementChild.innerHTML += `<div class="ability">${data.abilities[i].ability.name}</div>`;
    }
}