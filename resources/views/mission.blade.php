@extends('layouts.app')

@section('css')
<link href='/css/mission.css' rel='stylesheet'>
@endsection


@section('content')
<section class='mission'>
    <h2>Mission {{$mission[0]->id - 1}} ~ {{$mission[0]->nom}}</h2>
    
    <div>
        <div class='infos'>
            <h3>Informations</h3>
        </div>
        <div class='enigmes'>
            <h3>Objectif : {{$mission[0]->objectif}}</h3>
            <div></div>
        </div>
    </div>
    <a href='#'>Valider</a>
</section>


@endsection