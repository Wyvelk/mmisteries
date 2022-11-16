@extends('layouts.app')

@section('css')
<link href='/css/equipe.css' rel='stylesheet'>
@endsection
@section('content')
<section class='equipe'>
    <div>
        <h2>{{Auth::user()->name}}</h2>
        <h3>{{Auth::user()->slogan}}</h3>
    </div>
    <div class='points'>
        <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform:msFilter; ">
            <path d="M2 20h20v2H2z"></path>
            <rect x="5" y="2" width="6" height="16" rx="1"></rect>
            <rect x="13" y="6" width="6" height="12" rx="1"></rect>
        </svg>
        <div>
            <h3>Points de l'équipe</h3>
            <p>Points de réussite</p>
            <p>Points de rapidité</p>
            <p>Points bonus</p>
            <h2>230</h2>
        </div>
    </div>
    </div>

</section>
@endsection