const container = document.querySelector('.container-pokemons');
const search = document.getElementById('search');

// realizamos un metodo con un ciclo para ir creando cada pokemon
const getPokemons = () =>{
    const limit = 500;
    let containerLoad = document.querySelector('.container-load');
    const circleAnimation = document.getElementById('circle');

    // cuando vaya a comenzar a crear los pokemones se agrega el modal de carga hasta que se creen todos
    containerLoad.classList.remove('hidden');

    for(let i = 1; i <= limit; i++){
        fetch(`https://pokeapi.co/api/v2/pokemon/${i}`)
        .then(res => res.json())
        .then(data => {
            getPokemon(data);
            if(i == limit){
                containerLoad.classList.add('hidden');
                circleAnimation.classList.remove('animationLoad');
            }
        });
    }
    // se usa la funcion getPokemon para crear el pokemon e ingresarlo en el contenedor
}
getPokemons();

// para buscar un pokemon
search.addEventListener('keyup', e =>{
    let items = document.querySelectorAll('.container-item');

    // recorremos cada item de pokemon para verificar si incluye en su nombre lo que buscamos 
    items.forEach(item =>{
        if(item.textContent.includes(`${e.target.value.toLowerCase()}`)){
            item.classList.remove('hidden');
        }else{
            item.classList.add('hidden');
        }
    });
});
