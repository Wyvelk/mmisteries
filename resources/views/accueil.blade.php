@extends('layouts.app')

@section('css')
<link href='/css/accueil.css' rel='stylesheet'>
@endsection

@section('content')
<section class='accueil'>
    <video class='video' width="250" muted loop autoplay>
    <source src="/uploads/final_1.mp4"
            type="video/mp4">
    </video>
    <img class='arbre' src='/uploads/arbre.png' alt='image arbre'>
</section>

<section class='avancee'>
    <h1>Votre avancée</h1>
    <div class='equipe'>
    @if(Auth::user()->img_url == null)
              <img src= '/uploads/profil.png'>
              @else
                <img src= '/storage/{{Auth::user()->img_url }}'>
              @endif
        <h3>Équipe <i>{{ Auth::user()->name }}</i>, voici vos résultats actuels.</h3>
    </div>



    <div class='bandeau'>
        <div>
            <h4>Vos points d'équipe</h4>
            <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform:msFilter; ">
                <path d="M2 20h20v2H2z"></path>
                <rect x="5" y="2" width="6" height="16" rx="1"></rect>
                <rect x="13" y="6" width="6" height="12" rx="1"></rect>
            </svg>
            <h3>{{ $total }}</h3>
        </div>

        <div>
            <h4>Votre dernier accomplissement</h4>
            <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform:msFilter; ">
                <path d="M21 4h-3V3a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1v1H3a1 1 0 0 0-1 1v3c0 4.31 1.8 6.91 4.82 7A6 6 0 0 0 11 17.91V20H9v2h6v-2h-2v-2.09A6 6 0 0 0 17.18 15c3-.1 4.82-2.7 4.82-7V5a1 1 0 0 0-1-1zM4 8V6h2v6.83C4.22 12.08 4 9.3 4 8zm14 4.83V6h2v2c0 1.3-.22 4.08-2 4.83z"></path>
            </svg>
            <h3>@if(isset($achievement[0]) == false)
                    Créer une équipe
                @else
                    {{$achievement[0]->objectif}}
                @endif
                </h3>
        </div>

        <div>
            <h4>Votre classement</h4>
            <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: msFilter;">
                <path d="M5 8.999a6.99 6.99 0 0 0 2.879 5.646l.001.001a6.972 6.972 0 0 0 1.881.979l.051.019a6.906 6.906 0 0 0 1.163.271 6.79 6.79 0 0 0 1.024.085H12c.35 0 .69-.034 1.027-.084l.182-.028c.336-.059.664-.139.981-.243l.042-.016C17 14.693 19 12.078 19 8.999 19 5.14 15.86 2 12 2S5 5.14 5 8.999zM12 4c2.756 0 5 2.242 5 4.999h-2A3.003 3.003 0 0 0 12 6V4zM7.521 16.795V22L12 20.5l4.479 1.5.001-5.205a8.932 8.932 0 0 1-8.959 0z"></path>
            </svg>
            <h3>@foreach($classement as $u)
                    @if($u[2] == Auth::user()->id)
                        @if($u[3] == 1)
                            {{$u[3]}}er
                        @else
                            {{$u[3]}}ème
                        @endif
                    @endif
                @endforeach
            </h3>
        </div>

    </div>

</section>

<section class='recompenses'>
    <h1>Récompenses à la clé</h1>
    <div class="recompense first">1</div>
    <div class="recompense second">2</div>
    <div class="recompense third">3</div>
</section>



@endsection('content')