@extends('layouts.app')

@section('css')
<link href='/css/adventure.css' rel='stylesheet'>
@endsection


@section('content')
<section class='aventure'>
    <img src='/uploads/fissure1.png'>
    <div class='text'>
        <h2>Carnet de bord</h2>
        <div>
            <h3>Mission 0 ~ Début de l'aventure</h3>
            <p>{{ Auth::user()->name }}, Tim a besoin de vous, sans plus attendre ! Ce jeune homme est très silencieux et passe souvent inaperçu. Personne dans l'IUT ne connaît son groupe et ne semble se soucier de lui. Vous allez devoir trouver par vous-même ce qui lui est arrivé avant qu'il ne soit trop tard...<div class=""></div>
            <br />
            Voici ci-contre le chemin de votre enquête, les <strong id='purple'>points violets</strong> correspondent aux missions non débloquées qui vous attendent. Un <strong id='yellow'>point jaune</strong> correspond à l'inverse à une mission que vous avez réussie et la couleur <strong id='blue'>bleue</strong> à celles disponibles. Cliquez sur la mission que vous avez débloqué pour avancer dans votre quête de sauvetage.</p>
            <br />
            <div><h4>Points obtenus : 0 / 230</h4><p>Difficulté : Très facile</p></div>
            <a>Se rendre sur la mission</a>
        </div>
    </div>
    <div class='barre-progression'>
        <div class='point'><a href='#'>Début de l'aventure</a></div>
        <div class='point' id='etudiant'><a href='#'>L'étudiant disparu</a></div>
        <div class='point' id='portail'><a href='#'>Le portail</a></div>
        <div class='point' id='creature'><a href='#'>La créature</a></div>
        <div class='point' id='arme'><a href='#'>L'arme</a></div>
        <div class='point' id='boussole'><a href='#'>La boussole</a></div>
        <div class='point' id='fin'><a href='#'>Fin</a></div>
        <div class='progression'>

        </div>
    </div>
</section>

@endsection