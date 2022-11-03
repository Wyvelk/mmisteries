@extends('layouts.app')

@section('css')
<link href='/css/adventure.css' rel='stylesheet'>
@endsection


@section('content')
<section class='aventure'>
    <img src='/uploads/fissure1.png'>
    <div class='text'>
        <h2>Carnet de bord</h2>
        @for ($i = 0; $i <= Auth::user()->progression; $i++)
        <div>
            <h3>{{ $missions[$i]->nom }}</h3>
            <p>{{ Auth::user()->name }}, <?php echo substr($missions[$i]->description, 0, 280); ?><br /><br />
            <?php echo substr($missions[$i]->description, 281, 50); echo "<strong id='purple'>". substr($missions[$i]->description, 331, 14) ."</strong>"; echo substr($missions[$i]->description, 345, 68);
             echo "<strong id='yellow'>". substr($missions[$i]->description, 413, 11) ."</strong>"; 
             echo substr($missions[$i]->description, 424, 77);
             echo "<strong id='blue'>". substr($missions[$i]->description, 501, 5) ."</strong>";
             echo substr($missions[$i]->description, 506, 120);?></p>
            <div><h4>Points obtenus : 0 / {{$missions[$i]->pointsmax}}</h4><p>Difficulté : {{$missions[$i]->difficulte}}</p></div>
            <a href='/mission/{{$missions[$i]->id}}'>Se rendre sur la mission</a>
        </div>
        @endfor
        
    </div>
    <div class='barre-progression'>
        <div class='point'><a href='mission/1'>Début de l'aventure</a></div>
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