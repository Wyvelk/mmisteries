@extends('layouts.app')

@section('css')
<link href='/css/mission.css' rel='stylesheet'>
@endsection


@section('content')
<section class='mission'>
    <h2>{{$mission[0]->nom}}</h2>
    
    <div>
        <div class='infos'>
            <h3>Informations</h3>
        </div>
        <div>
            <h3>Objectif : {{$mission[0]->objectif}}</h3>
        </div>
    </div>
</section>


@endsection