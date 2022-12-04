@extends('layouts.app')

@section('css')
<link href='/css/equipe.css' rel='stylesheet'>
@endsection
@section('content')
<section class='equipe'>
    <div class='nom'>
        @if(Auth::user()->img_url == null)
        <img src='/uploads/profil.png'>
        @else
        <img src='/storage/{{Auth::user()->img_url }}'>
        @endif
        <div>
            <h2>{{Auth::user()->name}}</h2>
            <h3>{{Auth::user()->slogan}}</h3>
        </div>
        <a href='/signout'>Se déconnecter</a>
    </div>
    <div class="recap">
        <div class='points'>
            <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform:msFilter; ">
                <path d="M2 20h20v2H2z"></path>
                <rect x="5" y="2" width="6" height="16" rx="1"></rect>
                <rect x="13" y="6" width="6" height="12" rx="1"></rect>
            </svg>
            <div>
                <h3>Points de l'équipe</h3>
                <div>
                    <p>Points de réussite</p>
                    <?php
                    $reussite = 0;
                    foreach ($points as $p)
                        $reussite += $p->reussite
                    ?>
                    <p>+ {{$reussite}}</p>
                </div>
                <div>
                    <p>Points de rapidité</p>
                    <?php
                    $rapidite = 0;
                    foreach ($points as $p)
                        $rapidite += $p->rapidite
                    ?>
                    <p>+ {{$rapidite}}</p>
                </div>
                <div>
                    <p>Points bonus</p>
                    <?php
                    $bonus = 0;
                    foreach ($points as $p)
                        $bonus += $p->bonus
                    ?>
                    <p>+ {{$bonus}}</p>
                </div>
                <h3>{{ $total }}</h3>
            </div>
        </div>
        <div class='classement'>
            <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: msFilter;">
                <path d="M5 8.999a6.99 6.99 0 0 0 2.879 5.646l.001.001a6.972 6.972 0 0 0 1.881.979l.051.019a6.906 6.906 0 0 0 1.163.271 6.79 6.79 0 0 0 1.024.085H12c.35 0 .69-.034 1.027-.084l.182-.028c.336-.059.664-.139.981-.243l.042-.016C17 14.693 19 12.078 19 8.999 19 5.14 15.86 2 12 2S5 5.14 5 8.999zM12 4c2.756 0 5 2.242 5 4.999h-2A3.003 3.003 0 0 0 12 6V4zM7.521 16.795V22L12 20.5l4.479 1.5.001-5.205a8.932 8.932 0 0 1-8.959 0z"></path>
            </svg>
            <div>
                <h3>Classement des équipes</h3>
                @foreach($classement as $u)
                    @if($u[3] == 1)
                    <div>
                        <h2>1er</h2>
                        <p>{{$u[1]}} ~ {{$u[0]}} points</p>
                    </div>
                    @endif
                @endforeach
                @foreach($classement as $u)
                    @if($u[3] == 2)
                    <div>
                        <h2>2ème</h2>
                        <p>{{$u[1]}} ~ {{$u[0]}} points</p>
                    </div>
                    @endif
                @endforeach
                @foreach($classement as $u)
                    @if($u[3] == 3)
                    <div>
                        <h2>3ème</h2>
                        <p>{{$u[1]}} ~ {{$u[0]}} points</p>
                    </div>
                    @endif
                @endforeach

                <p>Votre position est : @foreach($classement as $u)
                    @if($u[2] == Auth::user()->id)
                        @if($u[3] == 1)
                            {{$u[3]}}er
                        @else
                            {{$u[3]}}ème
                        @endif
                    @endif
                @endforeach </p>
            </div>
        </div>
    </div>
    <div class='objets'>
        @if(count($objets[0])==0)
        <img src='/uploads/TELEPHONnoir.png'>
        @else
        <img src='/uploads/TELEPHON.png'>
        @endif
        @if(count($objets[1])==0)
        <img src='/uploads/talkie-walkienoir.png'>
        @else
        <img src='/uploads/talkie-walkie.png'>
        @endif
        @if(count($objets[2])==0)
        <img src='/uploads/videoprojonoir.png'>
        @else
        <img src='/uploads/videoprojo.png'>
        @endif
        @if(count($objets[3])==0)
        <img src='/uploads/boussolenoir.png'>
        @else
        <img src='/uploads/boussole.png'>
        @endif
    </div>
    </div>

</section>
@endsection