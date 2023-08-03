@extends('layout')

@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="{{url('css/colors.css')}}">
<link rel="stylesheet" href="{{url('css/index.css')}}">

<style>
    .container-load{
        color: #555;
        background: rgb(230,230,230, .5);
        width: 100vw;
        height: 100vh;
        display:flex;
        justify-content: center;
        align-items: center;

        z-index: 100;
        position: absolute;
        left: 0;
        top: 0;
    }
    .load{
        width: 200px;
        height: 200px;
        padding: 10px;
        border-radius: 15px;
        background: #fff;
        
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 15px;

        
    }
    .load div{
        width: 100px;
        height: 100px;

        border-radius: 50%;
        border: 5px solid #222;
        border-bottom-color: transparent;
        border-top-color: transparent;
        border-right-color: transparent;
    }
    .animationLoad{
        animation: load 1s linear infinite;
    }
    @keyframes load {
        0%{
            transform: rotate(0);
        }
        100%{
            transform: rotate(360deg);
        }
    }
</style>
@stop

@section('content')
<div class="container-load hidden">
    <div class="load">
        <div id="circle" class="animationLoad"></div>
        <p>Loading</p>
    </div>
</div>

<header>
    <nav class="container-nav">
        <div id="container-nav-search">
            <input id="search" type="text" placeholder="look for one">
        </div>
        <div id="container-nav-info">
            <!-- validar que el usuario haya iniciado sesion -->
            @if(session()->has('user'))
            {{session('user')->name}}
            <a href="{{route('exit')}}" title="exit"><i class="fa fa-sign-out" style="color: #fff"></i></a>
            @endif  
        </div>
    </nav>

</header>

<div class="container-pokemons">
    
</div>
@stop

@section('script')
<script src="{{url('js/index.js')}}"></script>
<script>
    // obtener un pokemon para introducirlo en el contenedor de los pokemones
    const getPokemon = data =>{
        let item = document.createElement('A');
        item.classList.add('container-item', `${data.types[0].type.name}`);
        item.style.order = `${data.id}`;
        item.setAttribute('id', data.id);
        item.tabIndex = `${data.id}`;
        item.setAttribute('href', `{{url('/user/pokemon/${data.id}')}}`);
        item.innerHTML = data.name;
        container.appendChild(item);
    }
</script>
@stop
