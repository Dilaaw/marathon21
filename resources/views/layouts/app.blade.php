<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<header>
    <a href="{{ url('/') }}">
        <img class="header-logo" src="/img/Logo.png" alt="TV List">
    </a>

    <nav>
    <ul>
    <li><a class="nav-bleu" href="{{route('liste')}}"> Les séries</a></li>
        @guest
            
            <li ><a class="nav-rose" href="{{ route('register') }}">S'inscrire</a></li>
            <li ><a  class="nav-bleu" href="{{ route('login') }}">Se connecter</a></li>
            
            
        @else
            <li> Bonjour {{ Auth::user()->name }}</li>
            @if (Auth::user())
                <li><a href="#">Des liens spécifiques pour utilisateurs connectés..</a></li>
            @endif
            <li><a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    Logout
                </a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        @endguest
    </ul>
</nav>
</header>
<!-- Authentication Links -->

<div id="main">
    @yield('content')
    <footer>
<span>Site créé par la ShrekTeam - Tout droits reservés</span>
<a href="{{ url('/') }}">
        
        <img class="footer-logo" src="/img/Logo.png" alt="TV List">
    </a>
</footer>
</div>

<!-- Scripts -->

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
