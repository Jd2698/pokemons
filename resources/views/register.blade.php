@extends('layout')

@section('head')
<link rel="stylesheet" href="{{url('css/register.css')}}">
@stop

@section('content')
<div class="container-main">
    <form class="container_form" action="{{route('userCreate')}}" method="POST">
        <!-- @if(session('error'))
        <div class="container-message">
            <div class="error">{{session('error')}}</div>
        </div>
        @endif -->
        @if ($errors->any())
            <div class="container-message">
              <ul class="error">
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
            <h2 style="text-align:center; letter-spacing: 2px;">Register</h2>
            <div class="form-container-input">
                <input type="text" name="name"autofocus="" value="{{old('name')}}" required minlength="5">
                <span>Name</span>
            </div>
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
                <a class="button" href="{{route('login')}}">Go back</a>
            </div>    
        </div>
    </form>
</div>
@stop