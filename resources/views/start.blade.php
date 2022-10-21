@extends('layouts.app-before')

@section('css')
<link href='/css/start.css' rel='stylesheet'>
@endsection

@section('content')
<section class='start'>
    <div class='video'></div>
    <div class='join'>
        <h3>L'IUT n'est pas ce que vous imaginez...</h3>
        <p>Fin des inscriptions dans :</p>
        <p id='demo'></p>
        
        <a href='/register'>Rejoignez l'aventure dès maintenant !</a>
    </div>
</section>
<script type="text/javascript" src="/js/decompte.js"></script>
@endsection('content')