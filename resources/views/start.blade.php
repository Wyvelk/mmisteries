@extends('layouts.app-before')

@section('css')
<link href='/css/start.css' rel='stylesheet'>
@endsection

@section('content')

<section class='start'>
<video class='video' width="250" muted loop autoplay playsinline>
    <source src="/uploads/final_1.mp4"
            type="video/mp4">
    </video>
    <div class='join'>
        <h3>L'IUT n'est pas ce que vous croyez...</h3>

        @auth
        <p>Début de l'aventure</p>
        <div>
            <div>
                <span id='jours'></span>
                <p>JOUR(S)</p>
            </div>
            <div>
                <span id='heures'></span>
                <p>HEURE(S)</p>
            </div>
            <div>
                <span id='minutes'></span>
                <p>MINUTE(S)</p>
            </div>
            <div>
                <span id='secondes'></span>
                <p>SECONDE(S)</p>
            </div>
        </div>
        <a>Votre aventure débutera bientôt !</a>
        <script type="text/javascript" src="/js/decompte-aventure.js"></script>
        @endauth
        @guest
        <p>Fin des inscriptions</p>
        <div>
            <div>
                <span id='jours'></span>
                <p>JOUR(S)</p>
            </div>
            <div>
                <span id='heures'></span>
                <p>HEURE(S)</p>
            </div>
            <div>
                <span id='minutes'></span>
                <p>MINUTE(S)</p>
            </div>
            <div>
                <span id='secondes'></span>
                <p>SECONDE(S)</p>
            </div>
        </div>
        <a href='/registration'>Rejoignez l'aventure dès maintenant !</a>
        <script type="text/javascript" src="/js/decompte.js"></script>
        @endguest
        
    </div>
</section>
@endsection('content')