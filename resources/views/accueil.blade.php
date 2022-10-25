@extends('layouts.app-before')

@section('css')
<link href='/css/accueil.css' rel='stylesheet'>
@endsection

@section('content')
<section class='start'>
    <div class='video'></div>
    <img  class='arbre' src='/uploads/arbre.png' alt='image arbre'>
</section>

<section class='avancee'>
<div class='pfp'> </div>
<div><p class='resultat'>Equipe <p class='teamname'>Nom de la team</p>, voici vos résultats actuels</p></div>

<div><p class=timer> Temps restant: 3j, 9h, 34min et 20s</p></div>

<div class='bandeau'>
    <div> <div>vpoints</div>
    <i class='bx bxs-bar-chart-alt-2'></i>
    <div> 189pts </div>
    </div>

    <div> <div>dernier accomplissement</div>
    <i class='bx bxs-trophy' ></i>
    <div> sauver tim </div>
    </div>

    <div> <div>Classement</div>
    <i class='bx bxs-award' ></i>
    <div> 2ème</div>
    </div>

</div>

</section>

<section class='recompenses'>
<div class="recompense first">1</div>
<div class="recompense second">2</div>
<div class="recompense third">3</div>
</section>


<script type="text/javascript" src="/js/decompte.js"></script>
@endsection('content')