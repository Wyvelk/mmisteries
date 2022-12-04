@extends('layouts.app')
@section('css')
<link href='/css/infos.css' rel='stylesheet'>
@endsection
@section('content')
<section class='explications'>
    <h2>Informations</h2>
    <img src='/uploads/pose_Tim.png'>
    <h3>Stop ! Arrêtez tout ! L'équipe <strong>{{ Auth::user()->name}}</strong> est arrivée, plus de soucis à se faire. <br />Avant de démarrer votre aventure, merci de lire ces informations importantes :</h3>
    <div class='important'>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="108" height="108" viewBox="0 0 24 24" style="fill: rgba(243, 213, 33, 1);">
                <path d="M13 8h-2v5h5v-2h-3z"></path>
                <path d="M19.999 12c0-2.953-1.612-5.53-3.999-6.916V3a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v2.083C5.613 6.469 4.001 9.047 4.001 12a8.003 8.003 0 0 0 4.136 7H8v2.041a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V19h-.139a8 8 0 0 0 4.138-7zm-8 5.999A6.005 6.005 0 0 1 6.001 12a6.005 6.005 0 0 1 5.998-5.999c3.31 0 6 2.691 6 5.999a6.005 6.005 0 0 1-6 5.999z"></path>
            </svg>
            <p>Durant votre périple, vous allez débloquer plusieurs <strong>missions</strong>, retenez que vous ne pouvez pas avancer plus vite que le jeu en lui-même ! Si vous avez réussi toutes les missions du jour, il vous faudra <strong>attendre</strong> le lendemain pour continuer...</p>
        </div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="108" height="108" viewBox="0 0 24 24" style="fill: rgba(243, 213, 33, 1);">
                <path d="M3.299 17.596c.432 1.332 1.745 2.182 3.146 2.182H6.5A2.78 2.78 0 0 0 9.223 22c.457 0 .884-.115 1.262-.313a.992.992 0 0 0 .515-.882V3.027a.997.997 0 0 0-.785-.983 2.324 2.324 0 0 0-1.479.201c-.744.356-1.18 1.151-1.18 1.978v.055a2.778 2.778 0 0 0-2.744 4.433A3.327 3.327 0 0 0 2 12c0 1.178.611 2.211 1.533 2.812-.43.771-.571 1.746-.234 2.784zm15.889-8.885a2.778 2.778 0 0 0-2.744-4.433v-.055c0-.826-.437-1.622-1.181-1.978a2.32 2.32 0 0 0-1.478-.201.998.998 0 0 0-.785.983v17.777c0 .365.192.712.516.882.378.199.804.314 1.261.314a2.78 2.78 0 0 0 2.723-2.223h.056c1.4 0 2.714-.85 3.146-2.182.337-1.038.196-2.013-.234-2.784A3.35 3.35 0 0 0 22 12a3.327 3.327 0 0 0-2.812-3.289z"></path>
            </svg>
            <p>Votre statégie doit fonctionner en <strong>trois</strong> étapes distinctes : Lire le chapitre débloqué (JOURNAL), lire la description de la nouvelle mission (AVENTURE), et résoudre son énigme. Si vous oubliez l'une de ces étapes, il se peut que vous passiez à côté de certains éléments qui sont <strong>importants</strong> ! </p>
        </div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="90" height="90" viewBox="0 0 24 24" style="fill: rgba(243, 213, 33, 1);">
                <path d="M21 4h-3V3a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1v1H3a1 1 0 0 0-1 1v3c0 4.31 1.8 6.91 4.82 7A6 6 0 0 0 11 17.91V20H9v2h6v-2h-2v-2.09A6 6 0 0 0 17.18 15c3-.1 4.82-2.7 4.82-7V5a1 1 0 0 0-1-1zM4 8V6h2v6.83C4.22 12.08 4 9.3 4 8zm14 4.83V6h2v2c0 1.3-.22 4.08-2 4.83z"></path>
            </svg>
            <p>Le classement des équipes s'effectuent avec leur <strong>nombre de points</strong>. Lorsque vous échouez à une mission, votre aventure <strong>continue</strong>, mais vous n'avez pas de points. Les points se divisent en trois critères spécifiques.</p>
        </div>

        <div class='points'>
            <div>
                <h4>points de réussite</h4>
                <p>Réussite d'une mission</p>
            </div>
            <div>
                <h4>points de rapidité </h4>
                <p>Moins il y a d'équipes à réussir une mission avant vous, plus vous gagnerez des points</p>
            </div>
            <div>
                <h4>points bonus </h4>
                <p>Ils diminuent plus vous utilisez des indices</p>
            </div>
        </div>

        <p>Les indices vous permettent de vous aider si vous avez des <strong>difficultés</strong> lors d'une mission. Moins vous en usez, plus vous aurez de points bonus. Vous devez toujours utiliser les indices dans l'<strong>ordre croissant</strong> (révéler le premier avant le second, etc...).
        <p>Il est formellement interdit de déplacer, récupérer, ou modifier tout élément de la chasse au trésor positionné dans l'IUT. Si vous trouvez quelque chose, laissez-le à sa place une fois que vous avez terminé, sous peine d'élimination.
        <p>Il est fortement conseillé de jouer sur <strong>PC</strong> pour une meilleure expérience.</p>
    </div>
</section>
<section class='contact'>
    <h3>Pour tous les problèmes techniques, ou avis sur MMISTERIES, vous pouvez contacter :</h3>
    <p><strong>thibautdebroucke@gmail.com</strong> <br /> OU <br /> <strong>En message privé instagram : mmisteriesss</strong></p>
    <p>Demander des indices supplémentaires via ces contacts n'est pas permis.</p>
</section>

@endsection