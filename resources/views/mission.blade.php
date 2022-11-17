@extends('layouts.app')

@section('css')
<link href='/css/mission.css' rel='stylesheet'>
@endsection


@section('content')
<section class='mission'>
    <h2 id='titre' data-label="Mission {{$mission[0]->id - 1}} ~ {{$mission[0]->nom}}"></h2>

    <div class = 'tableau'>
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
                Tim est en danger, des monstres rôdent dans les couloirs et menaçent de le dévorer. Les frappements sur la porte de la salle 103F seraient les coups de Tim
                qui ne parvient pas à y entrer pour se cacher... Dans sa dimension, cette est fermée à clé et un mot de passe est nécessaire pour l'ouvrir.<br /><br />
                Cette pièce possède une forte connexion avec notre monde et si Tim parvient à y entrer, vous pourrez peut-être réussir à communiquer plus facilement avec lui.
                Mais il vous faut lui partager le bon code... Cherchez bien et ouvez l'oeil, la réponse pourrait bien être sous vos yeux...
            </p>
            @elseif($mission[0]->id == 3)
            <p><strong>Description</strong><br /><br />
                Les coups ont cessé, tout comme les rugissements. Vous avez permis à Tim d'être en sécurité pour un temps. La prochaine étape est de communiquer avec Tim plus facilement, afin de percer le mystère planant depuis
                le début de cette enquête : que lui est-il vraiment arrivé ?<br /><br />
                Tim se trouve actuellement en salle 103F et cherche à vous parler sérieusement. Rendez-vous sur le lieu en question pour y trouver une piste, et y rétablir une
                communication plus poussée. En réussissant, Tim pourra vous parler plus vite et vous gagnerez la possibilité d'obtenir un indice supplémentaire à vos missions.
            </p>
            @elseif($mission[0]->id == 4)
            <p><strong>Description</strong><br /><br />
                Tim reste hors de danger pour le moment. Mais parler avec lui reste tout de même encore compliqué, bien que la salle 103F soit adaptée. Quelque chose d'étrange brouille les pistes et détriore la qualité de communication.<br /><br />
                Trouvez l'amplificateur d'ondes et informez Tim de sa position pour communiquer avec lui. En réussissant, Tim pourra vous envoyer sa vidéo et vous gagnerez la possibilité d'obtenir un dernier indice supplémentaire...
            </p>
            @endif
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
                    @if($mission[0]->id == 1)
                    <div id="m1" class='resolution'>
                        <form>
                            <label>Une fois le téléphone trouvé, résolvez l'éngime qui se cache avec lui en tapant votre réponse ci-dessous.</label>
                            <input type='text' placeholder='Entrez le mot-code'>
                        </form>
                    </div>
                    @elseif($mission[0]->id == 2)
                    <div id="m2" class='resolution'>
                        <img src='/uploads/affiche.jpg'>
                        <form>
                            <label>Ayez le sens du détail et le mot de passe se révélera à vous.</label>
                            <input type='text' placeholder='Entrez le mot de passe' value='4BA6C1'>
                        </form>
                    </div>
                    @elseif($mission[0]->id == 3)
                    <div id="m3" class='resolution'>
                        <img id='m3' src='/uploads/mission3.png'>
                        <form>
                            <input type='text' placeholder='Entrez la solution'>
                        </form>
                    </div>
                    @elseif($mission[0]->id == 4)
                    <div id="m4" class='resolution'>
                        <a href="/uploads/unknown.zip" download="Unknown.zip">Télécharger</a>
                        <form>
                            <input type='text' placeholder="Où se trouve l'amplificateur ?">
                        </form>
                    </div>
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
                indice2.innerHTML = <?php if (isset($indice[1])) {
                                        echo json_encode($indice[1]);
                                    } ?>
                document.getElementById('dispo').innerHTML = n - pointsbonus * 0.3
            };
        }

        if (nombreindices.length == 3) {
            indice3.ondblclick = function() {
                indice3.innerHTML = <?php if (isset($indice[2])) {
                                        echo json_encode($indice[2]);
                                    } ?>
                document.getElementById('dispo').innerHTML = n - pointsbonus * 0.5
            };
        }
    </script>
    <script src='/js/mission.js'></script>

    </script>
</section>


@endsection