<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name='csrf-token' content="{{ csrf_token() }}">
    <title>MMISTERIES</title>
    <script src="https://ajax.googleapis.com/ajax/libs/d3js/7.6.1/d3.min.js"></script>
    <link rel="icon" type="image/png" href="/uploads/icon.png" />
    <link href="/css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    @section('css')

    @show

</head>

<body>
    <header>
        <div class='menu-nav'>
            <div>
            <img id='fissure' src="/uploads/fissure2.png" />
            <img id='logo' src="/uploads/logo.png" />
            <img id='fissure' src="/uploads/fissure3.png" />
</div>
        </div>
        <div id='login-team'>
            @auth
            <div>
            <a href='/equipe'>@if(Auth::user()->img_url == null)
              <img src= '/uploads/profil.png'>
              @else
                <img src= '/storage/{{Auth::user()->img_url }}'>
              @endif
            <span id="nom">{{ Auth::user()->name }}</span></a>
            </div>
            @endauth
            @guest
            <a href='/login'><img src='/uploads/login.png'>
            <span id="nom">Se connecter</span></a>
            @endguest
        </div>
        <nav>
            <a href='/accueil'>Accueil</a>
            <a href='/journal'>Journal</a>
            <a href='/adventure'>Aventure</a>
            <a href='/contact'>Informations</a>
        </nav>
        <div id="mySidenav" class="sidenav">
                <a id="closeBtn" href="#" class="close">×</a>
                <ul>
                    <li><a href='/accueil'>Accueil</a></li>
                    <li><a href='/journal'>Journal</a></li>
                    <li><a href='/adventure'>Aventure</a></li>
                    <li><a href='/contact'>Informations</a></li>
                </ul>
            </div>
        <a href="#" id="openBtn">
                <span class="burger-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>
    </header>


    @yield('content')


    @section('bottomMenu')
    @include('layouts.bottomMenu')
    @show

    <script>
            var sidenav = document.getElementById("mySidenav");
            var openBtn = document.getElementById("openBtn");
            var closeBtn = document.getElementById("closeBtn");

            openBtn.onclick = openNav;
            closeBtn.onclick = closeNav;

            /* Set the width of the side navigation to 250px */
            function openNav() {
                sidenav.classList.add("active");
            }

            /* Set the width of the side navigation to 0 */
            function closeNav() {
                sidenav.classList.remove("active");
            }
        </script>
</body>

</html>