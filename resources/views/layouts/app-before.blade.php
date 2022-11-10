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
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
                <a href=''><img src='/uploads/profil.png'>
                <span id="nom">{{ Auth::user()->name }}</span></a>
            </div>
            <a href='/signout'><img src='/uploads/logout.png'></a>
            @endauth
            @guest
            <div>
              <a href='/login'><img src='/uploads/login.png'>
              <span id="nom">Se connecter</span></a>
            </div>
            @endguest
        </div>

  </header>




  @yield('content')


  @section('bottomMenu')
  @include('layouts.bottomMenu')
  @show


</body>

</html>