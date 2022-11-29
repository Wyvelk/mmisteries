@extends('layouts.app')

@section('css')
<link href='/css/mission.css' rel='stylesheet'>
@endsection


@section('content')
<section class='mission'>
    <h2 id='titre' data-label="Mission {{$mission[0]->id - 1}} ~ {{$mission[0]->nom}}"></h2>

    <div class='tableau'>
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
                Tim reste hors de danger pour le moment. Mais parler avec lui reste tout de même encore compliqué, bien que la salle 103F soit adaptée. Quelque chose d'étrange brouille les pistes et détriore la qualité de communication.
                <br /><br />
                Trouvez l'amplificateur d'ondes et informez Tim de sa position pour communiquer avec lui. En réussissant, Tim pourra vous envoyer sa vidéo et vous gagnerez la possibilité d'obtenir un dernier indice supplémentaire...
            </p>
            @elseif($mission[0]->id == 5)
            <p><strong>Description</strong><br /><br />
                Voici ci-contre la vidéo envoyée par Tim. C'est une chance inouïe que vous l'ayez reçue ne serait-ce qu'en basse qualité. Ouvrez-la, et tentez de comprendre le message en clarifiant au mieux possible la vidéo qui a subi 
                des modifications involontaires suite à l'envoi.
                <br /><br />Une fois ceci fait, donnez la réponse à l'énigme qui se dissimule à l'intérieur du fichier et vous pourrez continuer de suivre le déroulement des évènements.
            </p>
            @elseif($mission[0]->id == 6)
            <p><strong>Description</strong><br /><br />
                Tim tente de suivre discrètement la créature pour savoir quel est son parcours habituel, mais le monstre ne cesse d'assombrir les couloirs et l'obscurité devient presque totale dans cette dimension. N'ayant aucune lumière
                sous la main pour se repérer, vous devez l'aider à retrouver la tanière du monstre avant que celui-ci ne recouvre le monde de ses ténèbres.<br /><br />
                La seule piste que vous possédez se trouve ci-contre et pourrait bien être d'une aide très précieuse, mais n'ayez pas peur du noir...
            </p>
            @elseif($mission[0]->id == 7)
            <p><strong>Description</strong><br /><br />
            Le noir est complet dans l'Autre Dimension. Tim ne peut plus se repérer qu'avec les sons de son environnement, et vous ne pourrez l'aider qu'ainsi aussi, désormais. L'arme parfaite pour tuer le monstre se trouverait là où une lumière 
            puissante brille. <br /><br />Rendez-vous à l'heure et emplacement exacts pour tenter de révéler cet endroit. Attention, si vous êtes en retard, il n'y aura pas de seconde chance, vous n'avez pas le droit à l'erreur...

            </p>
            @elseif($mission[0]->id == 8)
            <p><strong>Description</strong><br /><br />
            Vous y êtes presque... Tim n'a besoin que de trouver la boussole qui lui permettra de détecter le portail et de sortir de ce monde. La lumière est revenue dans l'IUT de l'Autre Dimension et sur son ordinateur, Tim possède quelques informations
            intéressantes pour retrouver la boussole.<br /><br />
            Votre but est d'aider Tim à comprendre le texte découvert afin de lui transmettre la position exacte de l'objet qu'il recherche. 
            </p>
            @elseif($mission[0]->id == 9)
            <p><strong>Description</strong><br /><br />
            Pour cette dernière mission, vous avez plusieurs tâches à accomplir :
                <br />- Décoder la boussole afin de savoir comment orienter le chemin.
                <br />- Trouver à quel endroit sur le plan il faut placer le point de départ du chemin.
                <br />- Suivre le chemin jusqu'au portail.
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
                        @if(count($userindice) != 0 and $userindice[0]->indice1 != NULL)
                        <div id='i1'>
                            <p>{{$mission[0]->indice1}}</p>
                        </div>
                        @else
                        <div id='i1' class='reveler'><a href='/aide/{{$mission[0]->id}}'>
                                <img src='/uploads/postit.png'>
                                <p>Indice 1 <br/><strong>-30% points bonus</strong></p>
                            </a></div>
                        @endif
                        @if(count($userindice) != 0 and $userindice[0]->indice1 != NULL)
                        @if($userindice[0]->indice2 != NULL)
                        <div id='i2'>
                            <p>{{$mission[0]->indice2}}</p>
                        </div>
                        @else
                            <div id='i2' class='reveler'><a href='/aide/{{$mission[0]->id}}'>
                                <img src='/uploads/postit.png'>
                                <p>Indice 2 <br/><strong>-50% points bonus</strong></p>
                                </a></div>
                        
                        @endif
                        @else
                        <div id='i2'>
                            <img src='/uploads/postit.png'>
                            <p>???</p>
                        </div>
                        @endif
                        @if(count($userindice) != 0 and $userindice[0]->indice2 != NULL)
                        @if($userindice[0]->indice3 != NULL)
                        <div id='i3'>
                            <p>{{$mission[0]->indice3}}</p>
                        </div>
                        @else
                            <div id='i3' class='reveler'><a href='/aide/{{$mission[0]->id}}'>
                                <img src='/uploads/postit.png'>
                                <p>Indice 3 <br/><strong>-100% points bonus</strong></p></a>
                            </div>
                        @endif
                        @else
                        <div id='i3'>
                            <img src='/uploads/postit.png'>
                            <p>???</p>
                        </div>
                        @endif
                    </div>
                    @if($mission[0]->id == 1)
                    <div id="m1" class='resolution'>
                        <form action="/valider/{{$mission[0]->id}}" name='enigme' method='post'>
                            @csrf
                            <label>Une fois le téléphone trouvé, résolvez l'éngime qui se cache avec lui en tapant votre réponse ci-dessous.</label>
                            <input type='text' name='reponse' placeholder='Entrez le mot-code'>
                        </form>
                    </div>
                    @elseif($mission[0]->id == 2)
                    <div id="m2" class='resolution'>
                        <img src='/uploads/affiche.jpg'>
                        <form action="/valider/{{$mission[0]->id}}" name='enigme' method='post'>
                            @csrf
                            <label>Ayez le sens du détail et le mot de passe se révélera à vous.</label>
                            <input type='text' name='reponse' placeholder='Entrez le mot de passe' value='4BA6C1'>
                        </form>
                    </div>
                    @elseif($mission[0]->id == 3)
                    <div id="m3" class='resolution'>
                        <img id='m3' src='/uploads/mission3.png'>
                        <form action="/valider/{{$mission[0]->id}}" name='enigme' method='post'>
                            @csrf
                            <input type='text' name='reponse' placeholder='Entrez la solution'>
                        </form>
                    </div>
                    @elseif($mission[0]->id == 4)
                    <div id="m4" class='resolution'>
                        <a href="/uploads/unknown.zip" download="Unknown.zip">Télécharger</a>
                        <form action="/valider/{{$mission[0]->id}}" name='enigme' method='post'>
                            @csrf
                            <input type='text' name='reponse' placeholder="Où se trouve l'amplificateur ?">
                        </form>
                    </div>
                    @elseif($mission[0]->id == 5)
                    <div id="m5" class='resolution'>
                    <form action="/valider/{{$mission[0]->id}}" name='enigme' method='post'>
                            @csrf
                            <input type='text' name='reponse' placeholder="Entrez la solution">
                        </form>
                    </div>
                    @elseif($mission[0]->id == 6)
                    <div id="m6" class='resolution'>
                        <a href="/uploads/Mission5.zip" download="Mission5.zip">Télécharger</a>
                        <form action="/valider/{{$mission[0]->id}}" name='enigme' method='post'>
                            @csrf
                            <input type='text' name='reponse' placeholder="Comment s'appelle la créature ?">
                        </form>
                    </div>
                    @elseif($mission[0]->id == 7)
                    <div id="m7" class='resolution'>
                        <h2>08121312IMMLLAH</h2>
                        <form action="/valider/{{$mission[0]->id}}" name='enigme' method='post'>
                            @csrf
                            <input type='text' name='reponse' placeholder="Entrez le mot entendu sans fautes">
                        </form>
                    </div>
                    @elseif($mission[0]->id == 8)
                    <div id="m8" class='resolution'>
                        <h2>énigme</h2>
                        <form action="/valider/{{$mission[0]->id}}" name='enigme' method='post'>
                            @csrf
                            <input type='text' name='reponse' placeholder="Entrez le code entendu">
                        </form>
                    </div>
                    @elseif($mission[0]->id == 9)
                    <div id="m9" class='resolution'>
                        <h3>Le Nord est le Sud. <br />Le Sud est l'Est.<br /> L'Est est à la fois le Sud et l'Ouest. <br />La boussole pointe vers le Sud-Est.
                        </h3>
                        <form action="/valider/{{$mission[0]->id}}" name='enigme' method='post'>
                            @csrf
                            <input type='text' name='reponse' placeholder="Entrez le code final">
                        </form>
                    </div>
                    @endif
            </div>
        </div>
    </div>
    </div>
    <div class='terminer'>
        @if(count($abandon) == 0) 
            <a id='abandon' href='/abandon/{{$mission[0]->id}}'>Abandonner</a>
            <button type='submit' id='valider'>Valider</button>
        @else
        <h3>Vous avez perdu cette mission.</h3>
        @endif
    </div>
    <script>
        var n = <?php echo $dispo; ?>;
        let bouton = document.querySelector('.reveler');
        bouton.addEventListener('click', (e) => {
            if(confirm("Voulez-vous vraiment révéler cet indice ?")){
            } else {
                e.preventDefault();
            }
        })

        let abandon = document.querySelector('#abandon')
        abandon.addEventListener('click', (e) => {
            if(confirm("Voulez-vous vraiment abandonner cette mission ? Vous pourrez passer à la suivante mais n'aurez aucun point de gagné...")){
            } else {
                e.preventDefault();
            }
        })

        let valider = document.querySelector('#valider')
        valider.onclick = function() { 
            if(confirm("Souhaitez-vous vraiment valider cette mission ? Si vous n'avez pas la bonne réponse, vous passerez cette mission sans les points !")){
                document.forms['enigme'].submit()
            } else {
                e.preventDefault();
            }
        }
    </script>
    <script src='/js/mission.js'></script>

    </script>
</section>


@endsection