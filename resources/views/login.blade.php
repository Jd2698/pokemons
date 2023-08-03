@extends('layout')

@section('head')
<link rel="stylesheet" href="{{url('css/login.css')}}">
@stop

@section('content')
<div class="container-main">
    <form class="container_form" action="{{route('userCheck')}}" method="POST">
        
        @if(session('exito'))
            <div class="container-message">
                <div class="message" style="background: #91cb91;">{{session('exito')}}</div>
            </div>
        @endif

        @if ($errors->any())
            <div class="container-message">
              <ul class="message" style="background: #faa;">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
        @endif


        <div class="container-img">
            <img src="{{url('img/logo2.png')}}" alt="">
        </div>
        <div class="container-right">
            @csrf
            <h2 style="text-align: center; letter-spacing: 2px;">Login</h2>
            <div class="form-container-input">
                <input type="email" name="email"autofocus="" value="{{old('email')}}" required>
                <span>Email</span>
            </div>
            <div class="form-container-input">
                <input type="password" name="password" required>
                <span>Password</span>
            </div>

            <div class="form-buttons">
                <input class="button" type="submit" value="Continue">
                <a class="button" href="{{route('formCreate')}}">Sign up</a>

                <a id="button-back" href="{{route('index')}}">Go back</a>
            </div>    
        </div>
    </form>
</div>
@stop