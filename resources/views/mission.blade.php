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
            <h4><a href='/journal'>Chapitre {{$mission[0]->id}}</a> à lire avant de commencer cette mission !</h4>
            @if($mission[0]-> id == 1)
            <p><strong>Description</strong><br /><br />
                La sonnerie d'un téléphone a retenti plusieurs fois depuis quelques jours à l'étage du bâtiment MMI.
                Retrouver la provenance de ce bruit vous permettrait de comprendre où se cache Tim. Mais il semble
                la situation soit déjà prise en main par certains professeurs qui souhaitent garder cette affaire secrète.<br /><br />
                Mme Hayenne fut la première à s'y intéresser et n'accepterait pas une seconde que des étudiants s'en mêlent. Il vous
                faut choisir entre précision ou prudence. Interroger Mme Hayenne ou chercher le téléphone sans indices malencontreusement divulgués de sa part ?
            </p>
            @elseif($mission[0]->id == 2)
            <p><strong>Description</strong><br /><br />
                Tim est en danger, des monstres rôdent dans les couloirs et menaçent de le dévorer. Les frappements sur la porte de la salle 100F seraient les coups de Tim
                qui ne parvient pas à y entrer pour se cacher... Dans sa dimension, cette est fermée à clé et un mot de passe est nécessaire pour l'ouvrir.<br /><br />
                Cette pièce possède une forte connexion avec notre monde et si Tim parvient à y entrer, vous pourrez peut-être réussir à communiquer plus facilement avec lui.
                Mais il vous faut lui partager le bon code... Cherchez bien et ouvez l'oeil, la réponse pourrait bien être sous vos yeux...
            </p>
            @endif
            <div class='bottom'></div>
            <div>
                <h2 id='dispo'>100</h2>
                <p>POINTS ENCORE DISPONIBLES</p>
                @if($reussi == 0)
                <p><i>Aucune équipe n'a encore réussi cette mission.</i></p>
                @elseif($reussi == 1)
                <p><i>1 équipe a réussi cette mission.</i></p>
                @else
                <p><i>{{ $reussi }} équipes ont réussi cette mission.</i></p>
                @endif
            </div>
        </div>
        <div class='enigmes'>
            <h3>Objectif : {{$mission[0]->objectif}}</h3>
            <img src='/uploads/Tim_normal.png'>
            <div>
                @if(Auth::user()->progression < 3) <p>
                    </p>
                    @endif
                    <div class='postit'>
                        <div id='i1'>
                            <img src='/uploads/postit.png'>
                            <p>Indice 1</p>
                        </div>
                        <div id='i2'>
                            <img src='/uploads/postit.png'>
                            <p>???</p>
                        </div>
                        <div id='i3'>
                            <img src='/uploads/postit.png'>
                            <p>???</p>
                        </div>
                    </div>
                    <div class='resolution'>@if($mission[0]->id == 1)

                        <form>
                            <label>Une fois le téléphone trouvé, résolvez l'éngime qui se cache avec lui en tapant votre réponse ci-dessous.</label>
                            <input type='text' placeholder='Entrez le mot-code'>
                        </form>
                        @elseif($mission[0]->id == 2)
                        <img src='/uploads/affiche.jpg'>
                        <form>
                            <label>Ayez le sens du détail et le mot de passe se révélera à vous.</label>
                            <input type='text' placeholder='Entrez le mot de passe' value='4BA6C1'>
                        </form>
                        @endif
                    </div>
            </div>
        </div>
    </div>
    <div class='terminer'>
        <a id='abandon' href='#'>Abandonner</a>
        <a href='#'>Valider la mission</a>
    </div>
    <script>
        var n = <?php echo $dispo; ?>;
        var difficulte = <?php echo json_encode($mission[0]->difficulte); ?>;
        if (difficulte == 'Très facile')
            var pointsbonus = 20
        if (difficulte == 'Facile')
            var pointsbonus = 30
        if (difficulte == 'Normale')
            var pointsbonus = 40
        if (difficulte == 'Difficile')
            var pointsbonus = 50
        let indice1 = document.getElementById('i1')
        let indice2 = document.getElementById('i2')
        let indice3 = document.getElementById('i3')
        let nombreindices = <?php echo json_encode($indice); ?>;
        indice1.ondblclick = function() {
            indice1.innerHTML = <?php echo json_encode($indice[0]); ?>;
            document.getElementById('dispo').innerHTML = n - pointsbonus * 0.2
        };

        if (nombreindices.length >= 2) {
            indice2.ondblclick = function() {
                indice2.innerHTML = <?php if(isset($indice[1])){ echo json_encode($indice[1]);} ?>
                document.getElementById('dispo').innerHTML = n - pointsbonus * 0.3
            };
        }

        if (nombreindices.length == 3) {
            indice3.ondblclick = function() {
                indice3.innerHTML = <?php if(isset($indice[2])){ echo json_encode($indice[2]);} ?>
                document.getElementById('dispo').innerHTML = n - pointsbonus * 0.5
            };
        }
    </script>
    <script src='/js/mission.js'></script>

    </script>
</section>


@endsection