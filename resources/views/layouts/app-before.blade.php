<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name='csrf-token' content ="{{ csrf_token() }}">
    <title>MMISTERIES</title>
    <link rel="icon" type="image/png" href="/uploads/icon.png" />
    <link href="/css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    @section('css')

    @show

</head>

<body>
    <header>
        <img src="/uploads/fissure2.png" />
        <img id='logo' src="/uploads/logo.png" />
        <img src="/uploads/fissure3.png" />
    </header>


    @yield('content')
  

  @section('bottomMenu')
    @include('layouts.bottomMenu')
@show


</body>
</html>