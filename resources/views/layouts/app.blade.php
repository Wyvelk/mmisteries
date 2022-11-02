<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name='csrf-token' content="{{ csrf_token() }}">
    <title>MMISTERIES</title>
    <link rel="icon" type="image/png" href="/uploads/icon.png" />
    <link href="/css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    @section('css')

    @show

</head>

<body>
    <header>
        <div class='menu-nav'>
            <img src="/uploads/fissure2.png" />
            <img id='logo' src="/uploads/logo.png" />
            <img src="/uploads/fissure3.png" />
        </div>
        <div id='login-team'>
            @auth
            <div>
                <a href=''><img src='/uploads/profil.png'></a>
                <span id="nom">{{ Auth::user()->name }}</span>
            </div>
            <a href='/signout'><img src='/uploads/logout.png'></a>
            @endauth
            @guest
            <a href='/login'><img src='/uploads/login.png'></a>
            <span id="nom">Se connecter</span>
            @endguest
        </div>
        <nav>
            <a href='/accueil'>Accueil</a>
            <a>Journal</a>
            <a href='/adventure'>Aventure</a>
            <a href='/contact'>Contact</a>
        </nav>
    </header>


    @yield('content')


    @section('bottomMenu')
    @include('layouts.bottomMenu')
    @show


</body>

</html>