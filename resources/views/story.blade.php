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
            <img src='/uploads/Marche_Tim.gif'>
            <?php $avancee = $progression * (100 / 8);
                    if($avancee > 100)
                        $avancee = 100;
            echo "<div class='danschemin'>
    <style> .danschemin{ width:" . $avancee . "%; animation: barre 3s ease-out;}
        @keyframes barre{ from{width: 0%; background-color:black;} to{ background-color:#F0C600; width:" . $avancee . "%;}}

}</style></div><style>
.chemin{
    position: relative;
}
.chemin img{
    width: 10%;
    position: absolute;
    left: ". $avancee - 5 ."%;
    animation: image 3s ease-out;
}

@keyframes image {
    0% {
      left: 0;
    }
    100% {
      left: ".$avancee - 5 . "%;
    }
  }
</style>";

            ?>
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
    @if(Auth::user()->progression >= 0)
    <div id='chap1' class="chapitre">
        <h3>Chapitre 1</h3>
        <p>Les vacances de la Toussaint s'achevèrent lorsque Tim retourna en cours, en première année de MMI. Un nouvel univers qu’il venait de découvrir depuis seulement quelques mois, et dans lequel un esprit familial régnait. Les journées se déroulaient bien pour Tim, sans difficulté particulière pour lui. Il était un jeune homme très silencieux, et qui ne parlait jamais de lui. Solitaire, cet étudiant savait se faire très discret aux yeux de ses camarades ainsi que des professeurs. La timidité étant le trait de personnalité qui le caractérisait le plus.

            <br /><br />Ce fut un mercredi matin que tout commença. Avant de se rendre à son cours d’infographie vers huit heures, Tim alla boire un chocolat chaud dans le hall MMI. L’étudiant fut pris de surprise lorsque la machine à café se mit à trembler avec force, en émettant d’étranges rugissements à la place de la voix habituelle. Seul, personne ne put être témoin avec lui de l’événement, et Tim, choqué de ce qu’il venait de se passer sous ses yeux, préféra fuir en se disant qu’il venait de rêver.
            <br /><br />Le vendredi soir arriva très vite, la semaine était passée à une vitesse plutôt remarquable pour le jeune homme qui s’impatientait de rentrer chez lui pour profiter de quelques jours de pauses avec sa famille. À plusieurs reprises, des bruits angoissants semblaient sortir des murs et se déplacer dans les couloirs, Tim sentait également une présence le suivre durant ses cours. L’IUT commençait à devenir un endroit pesant pour lui, et il n’avait personne à qui parler en raison de son manque de sociabilité…
            <br />Autant dire que sa disparition passa inaperçue. Aux yeux de tous à l'IUT. Plus de signatures sur les feuilles d'appel, plus aucune trace de lui aux alentours de ses salles de cours... Tim s'était volatilisé, du jour au lendemain. Et durant plus d'une semaine, personne ne se douta de la moindre chose.
            <br /><br />Néanmoins un soir vers environ dix-huit heures, lorsque Mme Hayenne sortait de la salle des professeurs, elle entendit un cri glaçant qui avait retenti au premier étage. Bouleversée par la détresse de ce hurlement, elle reconnut la voix de Tim avec qui elle avait déjà pu échanger et chercha la provenance du bruit qui pourtant semblait venir de si près d'elle. Tous les étudiants étaient pourtant rentrés chez eux, et elle ne trouva plus personne nulle part dans l'IUT. Mme Hayenne resta perturbée et n'attendit guère longtemps avant d'en parler aux autres professeurs, en classant cette affaire de secrète.

            <br /><br />Après de nombreux débats sur l'importance de l'événement qui s'était produit, cette affaire reste à ce jour toujours dissimulée et cherche encore à être réglée. Les autres professeurs et gérant de l'établissement laissèrent de côté cette histoire bien que tous restaient d'accord sur un point crucial : un phénomène paranormal venait de se produire au sein de l'établissement...

        </p>
        <img class="appear" src='/uploads/Tim_line.png'>
    </div>
    @endif
    @if(Auth::user()->progression >= 1)
    <div id='chap2' class="chapitre">
        <img src='/uploads/TELEPHON.png'>
        <h3>Chapitre 2</h3>
        <p>Le téléphone de Tim, retrouvé dans les toilettes, fut la seule et unique trace encore visible de l'étudiant. Et le cri entendu par Mme Hayenne provenait de cet endroit précisément. Certaines théories stipulaient qu’il s’agissait d’un appel à l’aide, alors que d’autres pensaient plutôt à des cris de souffrance et qu’il était déjà trop tard. Tim se trouvait dans un endroit dans lequel personne ne pouvait se rendre, où les actions effectuées dans ce monde n’avaient que très peu d’influence dans celui dans lequel semblait se trouver le garçon…

            <br /><br />La panique semblait être de taille chez Tim. Seul depuis plusieurs jours dans un monde dépourvu de vie humaine, il chercha avant tout de l’aide. Une âme charitable qui saurait lui expliquer tout en détail. Malheureusement, il ne trouva personne, pas la moindre personne, ni même le moindre animal vivant. L’Autre Dimension, - nommée ainsi par Tim –, était vide de sens, ne laissant qu’un paysage de désolation autour du jeune homme. La peur l’envahissait de plus en plus chaque jour, et Tim resta caché dans les toilettes du premier étage pendant des heures, des nuits, et des jours entiers, le monde normal lui étant toujours inaccessible…

            <br /><br />Cependant, il sembla tout de même y avoir une certaine connexion entre notre monde et celui de Tim, une liaison minime mais suffisamment grande pour laisser entendre des bruits étranges et permettre à Tim de communiquer certains mots… En effet, depuis peu, des coups assourdissants ainsi que des rugissements se firent entendre au niveau de la porte de la salle 103F. Il arrivait même parfois que les murs tremblent ou que des bruits de pas résonnent plusieurs fois chaque jour. Quelque chose rôdait dans les couloirs de l’IUT, dans cette autre dimension. La seule chose vivante de cette dimension qui s’était réveillée depuis quelques heures sentait la présence de Tim et s’approchait de lui.

            <br /><br />Cette créature, maître des lieux, finit par être à la poursuite de l’étudiant et le prit pour cible. Les toilettes de l’IUT furent plongées dans un noir absolu indescriptible, et dans l’une des cabines à moitié détruire, seul deux grands yeux jaunes perçaient cette obscurité avec intensité. Face à cette vision, Tim hurla et dut fuir pour sa vie. Il opta pour plusieurs cachettes mais cette chose le retrouvait à chaque fois. Toujours en train de fuir cette bête, Tim commençait à perdre espoir… Qui aurait pu imaginer qu’un tel monde parallèle existait à l’IUT ? Personne ne le croirait… Quel genre de créature menace donc la vie de Tim ? S’il souhaitait se rendre dans cette salle pour échapper au danger mais que la porte s’avérait verrouillée, il fallait trouver un moyen de l’ouvrir au plus vite.

        </p>
    </div>
    @endif
    @if(Auth::user()->progression >= 2)
    <div id='chap3' class="chapitre">
        <h3>Chapitre 3</h3>
        <p>Une certaine obscurité s’était abattue dans les couloirs lorsque Tim put ouvrir la porte de la salle 103F. De ce fait, il ne put voir quelle était la chose qui semblait s’approcher dangereusement de lui… Heureusement, l’étudiant était désormais en sécurité, sain et sauf. Avec un peu de temps devant lui, il put enfin souffler et tenter de garder son calme malgré les bruits inquiétants venant de toutes les directions.

            <br /><br />L’Autre Dimension ressemblait à un monde froid et abandonné. Un IUT délabré baignant dans une atmosphère silencieuse et fantomatique aux tons mauves. Pour comprendre son environnement et réussir à s’en échapper, Tim cherchait à communiquer des informations plus claires jusqu’au monde normal, pour tenter d’entrer en communication avec des personnes susceptibles de l’aider, car s’il y avait une entrée à cette dimension, il devait aussi exister une sortie. Mais la communication entre les deux univers était très faible. En effet, des sortes d’ondes interdimensionnelles connectaient les deux parties et permettaient d’entendre des sons ou vibrations de l’autre monde. Et certains endroits spécifiques de l’IUT étaient plus réceptifs à ce type de connexions.

            <br /><br />Une ombre se dessina sous la porte de la salle 103F, pendant qu’une température glaçante s’empara de l’air de la pièce. Quelque chose de froid et d’imposant patientait silencieusement derrière, dans le couloir du premier étage, Tim en était persuadé, il sentait sa présence très peu rassurante… Toute la nuit, il était resté au pied de la porte pour observer ces mouvements étranges, sans pouvoir fermer l’œil. C’était comme si les ténèbres frappaient à sa porte pour l’envahir. Dans cette pièce où se déroulaient habituellement des cours basiques, Tim pensait qu’il se cachait sûrement un moyen de communiquer plus facilement avec l’Autre Dimension.
        </p>
        <img src='/uploads/103F.png'>
    </div>
    @endif
    @if(Auth::user()->progression >= 3)
    <div id='chap4' class="chapitre">
        <img src='/uploads/talkie-walkie.png'>
        <h3>Chapitre 4</h3>
        <p>La résolution de l’énigme offrit à Tim un moyen de partager davantage d’informations et d’éléments importants pour la suite de l’enquête en se connectant sur un ordinateur présent dans la salle. En effet, très doué en informatique, l’étudiant comprit qu’il était possible d’envoyer des messages à son monde depuis l’Autre Dimension, sans qu’il ne puisse expliquer comment cela était possible. Malheureusement, quelque chose vint brouiller les pistes et créa des interférences entre les deux mondes.

            <br /><br />Il fallait trouver un moyen encore plus puissant de communiquer. Tim pensait avoir une idée pour permettre cela, dans l’ordinateur sur lequel il communiquait, il trouva des fichiers qui faisaient référence à un objet particulier améliorant les ondes interdimensionnelles. Malheureusement, l’étudiant ne savait ni où il se trouvait, ni à quoi cet objet ressemblait exactement mis à part que cela faisait fortement penser à un talkie-walkie. Il s’agissait en effet de l’amplificateur d’ondes. Mettre la main sur cet amplificateur pourrait offrir la possibilité à Tim de vous envoyer des images de son monde, pour une meilleure compréhension de son environnement.

            <br /><br />La chose obscure semblait s’être dissipée derrière la porte, peut-être que la voie était de nouveau libre pour passer à l’exploration de l’Autre Dimension, Tim devait simplement savoir quel était le bon chemin à emprunter s’il ne voulait pas perdre de temps…

        </p>
    </div>
    @endif
    @if(Auth::user()->progression >= 4)
    <div id='chap5' class="chapitre">
        <h3>Chapitre 5</h3>
        <p>
            Tim avait entre ses mains l’amplificateur qui pouvait permettre d’envoyer des images et vidéos jusqu’au monde normal de l’IUT. Il lui fallut toute une nuit pour comprendre les fonctionnalités de cet objet qu’il avait retrouvé en 102F, en très mauvais état. Il plaça l’amplificateur près de son poste informatique en 103F et désormais, la connexion était enfin rétablie. Toutes ces informations déjà disponibles avec de simples, cela lui faisait penser qu’il n’était pas le premier à marcher dans cette Autre Dimension, peut-être était-il seulement le dernier d’une longue liste de personnes, qui avaient fini dévorées par ce monstre qui rôdait…

            <br /><br />Tout à coup, des tremblements de terre se firent ressentir sous ses pieds, tandis qu’un grave grognement retentissait derrière la porte fermée de la salle sécurisée. La créature était de retour, à la recherche de Tim qu’elle avait déjà pu croiser sans pouvoir le dévorer… L’étudiant stoppa ses activités et resta immobile sur sa chaise, en évitant de faire le moindre bruit, pour persuader ce monstre de prendre une autre direction. Cependant, il voulut tout de même filmer les événements pour prouver à son entourage qu’il espérait retrouver un jour ce qu’il se produisait. Tim sortit un téléphone portable abandonné qu’il avait trouvé dans l’IUT pour capturer ce moment, ainsi que les rugissements étranges derrière la porte. Au bout de quelques minutes, les bruits de la créature cessèrent et Tim fut rassuré.

            <br /><br />Mais derrière l’une des fenêtres de la salle, Tim aperçut un grand œil jaune perçant et imposant qui l’aveugla pendant plusieurs secondes. L’instant suivant, la vitre fut brisée et le monstre pénétra dans la pièce, en plongeant la salle 103F dans le noir complet. Tim poussa un cri de terreur avant de fuir dans le couloir, les jambes à son coup, en emportant l’amplificateur d’ondes avec lui. Une fois le monstre semé, il reprit son souffle et s’empressa d’envoyer toutes ses vidéos en espérant que l’on lui vienne en aide.
            <img src='/uploads/tim_contact.png'>
        </p>
    </div>
    @endif
    @if(Auth::user()->progression >= 5)
    <div id='chap6' class="chapitre">
        <img src='/uploads/portail_F.png'>
        <h3>Chapitre 6</h3>
        <p>Tim se posa dans une salle discrètement afin de communiquer les faits importants de son histoire ; en effet, ce dernier aurait croisé un étrange portail lumineux et circulaire sur son chemin et, dans un élan de curiosité, aurait malencontreusement atterri dans l’Autre Dimension en le traversant, alors qu’il repartait chez sa famille pour le week-end. Avec de nombreuses recherches dans les ordinateurs de l’IUT, il trouva de nouvelles informations qui lui fit froid dans le dos. Le monstre qui avait tenté de le tuer était une créature de l’ombre qui instaurait une obscurité totale partout où elle décidait de se rendre. L’IUT de cette dimension était donc plongé dans un nuage noir de ténèbres ne laissant passer que très peu de lumière.

            <br /><br />Tim se disait que si ce monde possédait une entrée, il devait bien y avoir également une sortie. Mais comment retrouver ce portail de lumière qui l’avait amené jusqu’ici ? Si la créature repoussait toute lumière, il se devait de l’éliminer avant de pouvoir se mettre à la recherche de sa porte de sortie. Le courage l’animant, il souhaitait en découdre avec cette bête dont il n’avait encore jamais vu le visage. Son plan dangereux et un peu douteux était son seul espoir d’espérer retrouver son monde au plus vite. Ainsi, Tim voulut traquer le monstre, trouver sa niche et de quoi l’affronter.

            <br /><br />Durant la fin de la journée, l’étudiant chercha à retrouver la trace de son ennemi, qui avait disparu depuis plusieurs heures. À l’affût du moindre bruit étrange, il parcourut avec discrétion plusieurs salles de l’IUT pour tenter de le retrouver, mais Tim ne souhaita pas continuer ainsi sous peine de tomber nez à nez avec le monstre sans pouvoir se défendre. Il lui fallait être sûr de son emplacement pour continuer son plan.

        </p>
    </div>
    @endif
    @if(Auth::user()->progression >= 6)
    <div id='chap7' class="chapitre">
        <h3>Chapitre 7</h3>
        <p> L’amphithéâtre MMI était bien l’endroit le plus obscure de tout l’IUT de l’Autre Dimension… La tanière du monstre était là-bas, Tim ne s’en approcha pas pour le moment, mais savait désormais où trouver son adversaire à l’œil jaune. La bête avait besoin d’obscurité complète pour se déplacer, et son œil l’aidait à voir à travers le noir, si Tim passait la moindre tête dans l’amphithéâtre, il se ferait repérer immédiatement et il périrait.

            <br /><br />Les choses se gâtaient de son côté, le noir était complet dans tout le bâtiment MMI et Tim ne pouvait plus se repérer qu’à l’aide de son audition, cela le ralentit dans sa course et il dut faire une pause, dans un endroit qu’il n’avait guère pu déterminer comme il était dépourvu de vision. Tim passa la nuit à dormir dans une angoisse terrible qui ne le confortait pas dans ses intentions futures de se dresser face au monstre, mais il n’avait pas d’autres choix. En effet, la colère de la créature s’était amplifiée et son emprise sur l’IUT avait augmenté, de ce fait, pas le moindre rayon lumineux ne pouvait transpercer ce noir profond qui régnait depuis tard dans la nuit.

            <br /><br />Pour venir à bout d’un monstre qui puisait son essence dans les ténèbres et l’obscurité, il lui fallait une arme lumineuse, très lumineuse. Quelque chose qui produirait de la lumière assez forte pour aveugler la créature jusqu’à la tuer. Tim ayant gardé son amplificateur d’ondes avec lui, il était également en mesure de transmettre les bruits ambiants qui l’entouraient dans le monde normal. Il espérait attirer l’attention de personnes présentes dans l’IUT pour l’aider à mettre la main sur un objet lumineux et facile d’accès.

        </p>
        <img src='/uploads/monstre.png'>
    </div>
    @endif
    @if(Auth::user()->progression >= 7)
    <div id='chap8' class="chapitre">
        <img src='/uploads/boussole.png'>
        <h3>Chapitre 8</h3>
        <p> Muni de son projecteur de lumière trouvé dans le studio audiovisuel MMI, Tim se rendit courageusement dans l’amphithéâtre, alors qu’un cours avait lieu au même endroit, dans le monde normal de l’IUT. Dans la seconde où l’étudiant vit l’œil jaune de la créature, il usa du projecteur et poussa l’intensité au maximum pour brûler le monstre par sa lumière qui transperça miraculeusement le noir de la pièce. Tim put observer le corps long et visqueux de son adversaire répugnant qui tomba au sol, vaincu par l’étudiant.

            <br /><br />La lumière enfin de retour, le portail pourrait de nouveau briller et l’étudiant pourrait enfin sortir de ce cauchemar. Malheureusement, Tim ne faisait que s’approcher de son but, car la lumière du portail était si puissante qu’elle dupait Tim en jaillissant de tous les couloirs, de toutes fenêtres… Ne sachant pas où se rendre pour atteindre la porte interdimensionnelle, Tim retourna en 103F pour réfléchir et trouver une solution à son problème. Et d’après des informations retrouvées dans les postes informatiques de l’IUT, il finit par apprendre l’existence d’une boussole serait capable de diriger vers ce portail qui changeait de position toutes les vingt-quatre heures… La personne ayant conçu cet objet devait être très à l’aise avec l’Autre Dimension et ses secrets, cela attisait la curiosité de l’étudiant…

            <br /><br />La pièce dans laquelle se trouve cette boussole est malheureusement verrouillée par un cadenas à code, et Tim n’avait qu’un fichier textuel pour l’aider. Une chose était sûre, il n’avait pas été le seul à se retrouver piégé à l’intérieur de ce monde, son prédécesseur lui avait laissé des pistes qui lui sauveraient peut-être la vie. Tout n’était pas perdu, l’espoir grandissait de plus en plus chez le jeune homme qui s’impatientait de rentrer chez lui une bonne fois pour toutes.

        </p>
    </div>
    @endif
    @if(Auth::user()->progression >= 8)
    <div id='chap9' class="chapitre">
        <h3>Chapitre 9</h3>
        <p> Le moment était enfin venu. L’heure fatidique. Tim avait sauvé l’IUT de l’emprise du cyclope rampant et possédait désormais tous les objets nécessaires pour pouvoir sortir de l’Autre Dimension. S’il parvenait à revenir de cet endroit, il serait le premier à y parvenir sans avoir failli en amont. Une prouesse remarquable dont il se souviendrait toute sa vie. Le secret de l’Autre Dimension et de son existence resteraient encore dans l’ombre, mais l’important était que Tim sauve sa vie.

            <br /><br />Bientôt libéré et sauvé, ce monde parallèle ne lui offrirait cependant aucun cadeau, jusqu’au bout de son périple. Le monstre avait beau être éliminé, la difficulté restait de taille pour trouver le portail interdimensionnel qui menaçait de se mouvoir dans les heures qui suivraient. Tim se pencha attentivement sur les éléments clés qu’il possédait pour ne pas se tromper de route et put déterminer certaines choses qui viendraient faire obstacle en travers de sa route. Malheureusement, la fatigue le prenait de plus en plus suite à ces nuits difficiles accumulées au sein de cet IUT parallèle, et Tim rencontrait de grandes complications pour réfléchir correctement.

            <br /><br />Le problème principal, restait que la boussole trouvée était différente d’une boussole habituelle, selon les informations trouvées, elle ne pointerait pas directement le portail mais aurait subi un certain décalage au fil du temps, ce qui viendrait biaiser le résultat. Pour savoir dans quelle direction Tim devait se rendre, cette ultime étape était nécessaire. Dans cet environnement devenu si brillant que l’étudiant en était aveuglé, la bonne route à prendre était invisible, et le portail allait changer de position ce soir-là, aux alentours de dix-sept heures. Il ne lui restait donc que quelques heures pour le trouver et ne pas recommencer ses recherches…

        </p>
        <img src='/uploads/run_W.png'>
    </div>
    @endif
    <script>
        var offsetStart = 0;
        var offsetEnd = 0;

        window.addEventListener('scroll', () => {
            document.documentElement.style.setProperty('--scroll', (window.pageYOffset - offsetStart) / (document.body.offsetHeight - offsetStart - offsetEnd - window.innerHeight));
        }, false);
    </script>
</section>
@endsection