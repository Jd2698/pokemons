@extends('layout')

@section('head')
    <link rel="stylesheet" href="{{url('css/colors.css')}}">
    <link rel="stylesheet" href="{{url('css/pokemon.css')}}">
@stop

@section('content')
    <!-- guardamos el id del pokemon que recibimos por get para recuperarlo con js -->
    <div id="pokemon" class="hidden" id="{{$id}}">{{$id}}</div>

    <div class="container-main">
        <div class="container-button">
            <a id="button-back" href="{{route('login')}}">Go back</a>
        </div>
        <div class="container_cart">
            <div class="name"></div>
            <img class="img"></img>
            <div class="container_abilities">
                
            </div>
        </div>
    </div>
@stop

@section('script')
<script src="{{url('js/pokemon.js')}}"></script>
@stop
