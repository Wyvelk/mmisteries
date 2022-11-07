@extends('layouts.app')

@section('css')
<link href='/css/start.css' rel='stylesheet'>
@endsection
@section('content')
<section class = 'start'>
    <div class='profil'>
        <img>
        <div>
            <h2>{{Auth::user()->name}}</h2>
            <h3>{{Auth::user()->slogan}}</h3>
        </div>
    </div>

</section>
@endsection