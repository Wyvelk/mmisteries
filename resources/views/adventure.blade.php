@extends('layouts.app')

@section('css')
<link href='/css/adventure.css' rel='stylesheet'>
@endsection


@section('content')
<section class='aventure'>
    <img src='/uploads/fissure1.png'>
    <div class='text'>
        <h2>Carnet de bord</h2>
        <p>Bienvenue {{Auth::user()->name}}. Vous vous trouvez sur votre carnet de bord. Voici ci-contre le chemin de votre enquête, les <strong id='purple'>points violets</strong> correspondent
            aux missions non débloquées qui vous attendent. Un tracé jaune représentera votre avancée. Un <strong id='yellow'>point jaune</strong> correspond à
            l'inverse à une mission que vous avez réussie et la couleur <strong id='blue'>bleue</strong> à celles disponibles. Si vous échouez lors d'une mission, elle apparaîtra <strong id='red'>rouge</strong>. Mais ne vous
            en faites pas, le classement se fait par rapport aux nombres de points et pourrez toujours continuer l'aventure.
            Cliquez sur la mission que vous avez débloqué pour avancer dans votre quête de sauvetage.</p>
        @for ($i = 0; $i <= Auth::user()->progression; $i++)
            <div>
                @if (isset($points[$i]))
                @if($points[$i]->reussie != 0)
                <h3 class='reussi'>Mission {{$i}} ~ {{ $missions[$i]->nom }}</h3>
                @else
                <h3 class='rate'>Mission {{$i}} ~ {{ $missions[$i]->nom }}</h3>
                @endif
                @else
                <h3 class='encours'>Mission {{$i}} ~ {{ $missions[$i]->nom }}</h3>
                @endif
                <p>{{$missions[$i]->description}}</p>
                <div>
                    <h4>Points obtenus :
                        @if (isset($points[$i]) == false)
                        0
                        @else
                        {{$points[$i]->rapidite + $points[$i]->bonus + $points[$i]->reussite}}
                        @endif
                        / {{$missions[$i]->pointsmax}}
                    </h4>
                    <p>Difficulté : {{$missions[$i]->difficulte}}</p>
                </div>
                <a href='/mission/{{$missions[$i]->id}}'>Se rendre sur la mission</a>
            </div>
            @endfor

    </div>
    <div class='barre-progression'>
        <?php echo $couleur;


        $avancee = ['0', '20%', '40%', '50%', '65%', '78%', '85%', '90%', '99%'];

        echo "<div class='progression'>
            <style> .progression{ height:" . $avancee[$progression] . "; animation: barre 3s ease-out;}
                @keyframes barre{ from{height: 0%;} to{ height:" . $avancee[$progression] . ";}}
        
        }</style>";

        ?>
    </div>
    </div>
    </div>
</section>

@endsection