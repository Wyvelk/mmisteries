@extends('layouts.app')

@section('css')
<link href='/css/story.css' rel='stylesheet'>
@endsection


@section('content')
<div class='progress'></div>
<section class='story'>
    <div class='stats'>
        <h3>Progression dans l'histoire</h3>
        <div class='chemin'>
            <?php $avancee = $progression * (100 / 8);

                                        echo "<div class='danschemin'>
    <style> .danschemin{ width:" . $avancee. "%; animation: barre 3s ease-out;}
        @keyframes barre{ from{width: 0%; background-color:black;} to{ background-color:#F0C600; width:" . $avancee . "%;}}

}</style>";

                                        ?></div>
        </div>
        <div class='list'>
            <a href='#chap1'>Chapitre 1</a>
            <a href='#chap2'>Chapitre 2</a>
            <a href='#chap3'>Chapitre 3</a>
            <a href='#chap4'>Chapitre 4</a>
            <a href='#chap5'>Chapitre 5</a>
            <a href='#chap6'>Chapitre 6</a>
            <a href='#chap7'>Chapitre 7</a>
            <a href='#chap8'>Chapitre 8</a>
            <a href='#chap9'>Chapitre 9</a>
        </div>
        <h2>{{$avancee}}%</h2>

    </div>
    <div id='chap1' class="chapitre">
        <h3>Chapitre 1</h3>
        <p>Les vacances de la Toussaint s'achevèrent lorsque Tim retourna en cours, en première année de MMI. Un nouvel univers qu’il venait de découvrir depuis seulement quelques mois, et dans lequel un esprit familial régnait. Les journées se déroulaient bien pour Tim, sans difficulté particulière pour lui. Il était un jeune homme très silencieux, et qui ne parlait jamais de lui. Solitaire, cet étudiant savait se faire très discret aux yeux de ses camarades ainsi que des professeurs. La timidité étant le trait de personnalité qui le caractérisait le plus.

            <br /><br />Ce fut un mercredi matin que tout commença. Avant de se rendre à son cours d’infographie vers huit heures, Tim alla boire un chocolat chaud dans le hall MMI. L’étudiant fut pris de surprise lorsque la machine à café se mit à trembler avec force, en émettant d’étranges rugissements à la place de la voix habituelle. Seul, personne ne put être témoin avec lui de l’événement, et Tim, choqué de ce qu’il venait de se passer sous ses yeux, préféra fuir en se disant qu’il venait de rêver.
            <br /><br />Le vendredi soir arriva très vite, la semaine était passée à une vitesse plutôt remarquable pour le jeune homme qui s’impatientait de rentrer chez lui pour profiter de quelques jours de pauses avec sa famille. À plusieurs reprises, des bruits angoissants semblaient sortir des murs et se déplacer dans les couloirs, Tim sentait également une présence le suivre durant ses cours. L’IUT commençait à devenir un endroit pesant pour lui, et il n’avait personne à qui parler en raison de son manque de sociabilité…
            <br />Autant dire que sa disparition passa inaperçue. Aux yeux de tous à l'IUT. Plus de signatures sur les feuilles d'appel, plus aucune trace de lui aux alentours de ses salles de cours... Tim s'était volatilisé, du jour au lendemain. Et durant plus d'une semaine, personne ne se douta de la moindre chose.
            <br /><br />Néanmoins un soir vers environ dix-huit heures, lorsque Mme Hayenne sortait de la salle des professeurs, elle entendit un cri glaçant qui avait retenti au premier étage. Bouleversée par la détresse de ce hurlement, elle reconnut la voix de Tim avec qui elle avait déjà pu échanger et chercha la provenance du bruit qui pourtant semblait venir de si près d'elle. Tous les étudiants étaient pourtant rentrés chez eux, et elle ne trouva plus personne nulle part dans l'IUT. Mme Hayenne resta perturbée et n'attendit guère longtemps avant d'en parler aux autres professeurs, en classant cette affaire de secrète.

            <br /><br />Après de nombreux débats sur l'importance de l'événement qui s'était produit, cette affaire reste à ce jour toujours dissimulée et cherche encore à être réglée. Les autres professeurs et gérant de l'établissement laissèrent de côté cette histoire bien que tous restaient d'accord sur un point crucial : un phénomène paranormal venait de se produire au sein de l'établissement...

        </p>
        <img src='/uploads/Tim_line.png'>
    </div>

    <div id='chap2' class="chapitre">
        <img src='/uploads/TELEPHON.png'>
        <h3>Chapitre 2</h3>
        <p>Le téléphone de Tim, retrouvé dans les toilettes, fut la seule et unique trace encore visible de l'étudiant. Et le cri entendu par Mme Hayenne provenait de cet endroit précisément. Certaines théories stipulaient qu’il s’agissait d’un appel à l’aide, alors que d’autres pensaient plutôt à des cris de souffrance et qu’il était déjà trop tard. Tim se trouvait dans un endroit dans lequel personne ne pouvait se rendre, où les actions effectuées dans ce monde n’avaient que très peu d’influence dans celui dans lequel semblait se trouver le garçon…

            <br /><br />La panique semblait être de taille chez Tim. Seul depuis plusieurs jours dans un monde dépourvu de vie humaine, il chercha avant tout de l’aide. Une âme charitable qui saurait lui expliquer tout en détail. Malheureusement, il ne trouva personne, pas la moindre personne, ni même le moindre animal vivant. L’Autre Dimension, - nommée ainsi par Tim –, était vide de sens, ne laissant qu’un paysage de désolation autour du jeune homme. La peur l’envahissait de plus en plus chaque jour, et Tim resta caché dans les toilettes du premier étage pendant des heures, des nuits, et des jours entiers, le monde normal lui étant toujours inaccessible…

            <br /><br />Cependant, il sembla tout de même y avoir une certaine connexion entre notre monde et celui de Tim, une liaison minime mais suffisamment grande pour laisser entendre des bruits étranges et permettre à Tim de communiquer certains mots… En effet, depuis peu, des coups assourdissants ainsi que des rugissements se firent entendre au niveau de la porte de la salle 103F. Il arrivait même parfois que les murs tremblent ou que des bruits de pas résonnent plusieurs fois chaque jour. Quelque chose rôdait dans les couloirs de l’IUT, dans cette autre dimension. La seule chose vivante de cette dimension qui s’était réveillée depuis quelques heures sentait la présence de Tim et s’approchait de lui.

            <br /><br />Cette créature, maître des lieux, finit par être à la poursuite de l’étudiant et le prit pour cible. Les toilettes de l’IUT furent plongées dans un noir absolu indescriptible, et dans l’une des cabines à moitié détruire, seul deux grands yeux jaunes perçaient cette obscurité avec intensité. Face à cette vision, Tim hurla et dut fuir pour sa vie. Il opta pour plusieurs cachettes mais cette chose le retrouvait à chaque fois. Toujours en train de fuir cette bête, Tim commençait à perdre espoir… Qui aurait pu imaginer qu’un tel monde parallèle existait à l’IUT ? Personne ne le croirait… Quel genre de créature menace donc la vie de Tim ? S’il souhaitait se rendre dans cette salle pour échapper au danger mais que la porte s’avérait verrouillée, il fallait trouver un moyen de l’ouvrir au plus vite.

        </p>
    </div>

    <div id='chap3' class="chapitre">
        <h3>Chapitre 3</h3>
        <p>Une certaine obscurité s’était abattue dans les couloirs lorsque Tim put ouvrir la porte de la salle 103F. De ce fait, il ne put voir quelle était la chose qui semblait s’approcher dangereusement de lui… Heureusement, l’étudiant était désormais en sécurité, sain et sauf. Avec un peu de temps devant lui, il put enfin souffler et tenter de garder son calme malgré les bruits inquiétants venant de toutes les directions.

            <br /><br />L’Autre Dimension ressemblait à un monde froid et abandonné. Un IUT délabré baignant dans une atmosphère silencieuse et fantomatique aux tons mauves. Pour comprendre son environnement et réussir à s’en échapper, Tim cherchait à communiquer des informations plus claires jusqu’au monde normal, pour tenter d’entrer en communication avec des personnes susceptibles de l’aider, car s’il y avait une entrée à cette dimension, il devait aussi exister une sortie. Mais la communication entre les deux univers était très faible. En effet, des sortes d’ondes interdimensionnelles connectaient les deux parties et permettaient d’entendre des sons ou vibrations de l’autre monde. Et certains endroits spécifiques de l’IUT étaient plus réceptifs à ce type de connexions.

            <br /><br />Une ombre se dessina sous la porte de la salle 103F, pendant qu’une température glaçante s’empara de l’air de la pièce. Quelque chose de froid et d’imposant patientait silencieusement derrière, dans le couloir du premier étage, Tim en était persuadé, il sentait sa présence très peu rassurante… Toute la nuit, il était resté au pied de la porte pour observer ces mouvements étranges, sans pouvoir fermer l’œil. C’était comme si les ténèbres frappaient à sa porte pour l’envahir. Dans cette pièce où se déroulaient habituellement des cours basiques, Tim pensait qu’il se cachait sûrement un moyen de communiquer plus facilement avec l’Autre Dimension.
        </p>
    </div>
    <script>
        var offsetStart = 0;
        var offsetEnd = 0;

        window.addEventListener('scroll', () => {
            document.documentElement.style.setProperty('--scroll', (window.pageYOffset - offsetStart) / (document.body.offsetHeight - offsetStart - offsetEnd - window.innerHeight));
        }, false);
    </script>
</section>
@endsection