@extends('layouts.app')

@section('css')
<link href='/css/mission.css' rel='stylesheet'>
@endsection


@section('content')
<section class='mission'>
    <h2 id='titre' data-label="Mission {{$mission[0]->id - 1}} ~ {{$mission[0]->nom}}"></h2>

    <div>
        <div class='infos'>
            <h3>Informations</h3>
            <h4><a href=''>Chapitre {{$mission[0]->id}}</a> à lire avant de commencer cette mission !</h4>
            @if($mission[0]-> id == 1)
            <p><strong>Description</strong><br /><br />
                La sonnerie d'un téléphone a retenti plusieurs fois depuis quelques jours à l'étage du bâtiment MMI.
                Retrouver la provenance de ce bruit vous permettrait de comprendre où se cache Tim. Mais il semble
                la situation soit déjà prise en main par certains professeurs qui souhaitent garder cette affaire secrète.<br /><br />
                Mme Hayenne fut la première à s'y intéresser et n'accepterait pas une seconde que des étudiants s'en mêlent. Il vous
                faut choisir entre précision ou prudence. Interroger Mme Hayenne ou chercher le téléphone sans indices malencontreusement divulgués de sa part ?
            </p>
            @endif
            <div class='bottom'></div>
            <div>
                <h2 id='dispo'>100</h2>
                <p>POINTS ENCORE DISPONIBLES</p>
                @if($reussi == 0)
                <p><i>Aucune équipe n'a encore réussi cette mission.</i></p>
                @else
                <p><i>{{ $reussi }} équipe(s) ont réussi cette mission.</i></p>
                @endif
            </div>
        </div>
        <div class='enigmes'>
            <h3>Objectif : {{$mission[0]->objectif}}</h3>
            <img src='/uploads/Tim_normal.png'>
            <div>
                <div class='postit'>
                    <div>
                        <img src='/uploads/postit.png'>
                        <p>???</p>
                    </div>
                    <div>
                        <img src='/uploads/postit.png'>
                        <p>???</p>
                    </div>
                    <div>
                        <img src='/uploads/postit.png'>
                        <p>???</p>
                    </div>
                </div>@if($mission[0]->id == 1)

                <form>
                    <label>Une fois le téléphone trouvé, résolvez l'éngime qui se cache avec lui en tapant votre réponse ci-dessous.</label>
                    <input type='text' placeholder='Entrez le mot-code'>
                </form>
                @elseif($mission[0]->id == 2)
                <form>
                    <label>Le mot de passe de la salle se cache derrière la différence.</label>
                    <input type='text' placeholder='Entrez le mot de passe'>
                </form>
                @endif
            </div>
        </div>
    </div>
    <div class='terminer'>
        <a id='abandon' href='#'>Abandonner</a>
        <a href='#'>Valider la mission</a>
    </div>
    <script>
        var n = <?php echo $dispo; ?>;
    </script>
    <script src='/js/mission.js'></script>
    </script>
</section>


@endsection