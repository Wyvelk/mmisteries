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
                @if (isset($points[$i]))
                    <h3 class='reussi'>{{ $missions[$i]->nom }}</h3>
                @else
                    <h3 class='encours'>{{ $missions[$i]->nom }}</h3>
                @endif
                <p>@if($missions[$i] == $missions[0])
                    {{ Auth::user()->name }}, <?php echo substr($missions[$i]->description, 0, 280); ?><br /><br />
                    <?php echo substr($missions[$i]->description, 281, 50);
                    echo "<strong id='purple'>" . substr($missions[$i]->description, 331, 14) . "</strong>";
                    echo substr($missions[$i]->description, 345, 68);
                    echo "<strong id='yellow'>" . substr($missions[$i]->description, 413, 11) . "</strong>";
                    echo substr($missions[$i]->description, 424, 77);
                    echo "<strong id='blue'>" . substr($missions[$i]->description, 501, 5) . "</strong>";
                    echo substr($missions[$i]->description, 506, 120); ?>
                    @elseif($missions[$i] == $missions[1])
                    <?php echo substr($missions[$i]->description, 0, 278); ?><br /><br />
                    <?php echo substr($missions[$i]->description, 279, 53);
                    echo "<strong id='purple'>" . substr($missions[$i]->description, 332, 23) . "</strong>";
                    echo substr($missions[$i]->description, 355, 242); ?>
                    @endif

                </p>
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
        <a href='mission/1'>Début de l'aventure<div class='point'></div></a>
        <a id='etudiant' href='#'>L'étudiant disparu<div class='point' ></div></a>
        <a id='portail' href='#'>Le portail<div class='point' ></div></a>
        <a id='creature' href='#'>La créature<div class='point' ></div></a>
        <a id='arme' href='#'>L'arme<div class='point' ></div></a>
        <a id='boussole' href='#'>La boussole<div class='point' ></div></a>
        <a id='fin' href='#'>Fin<div class='point' ></div></a>
        <div class='progression'>

        </div>
    </div>
</section>

@endsection