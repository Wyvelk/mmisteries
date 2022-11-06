@extends('layouts.app')

@section('content')
<section class = 'equipe'>
    <div class='profil'>
        <img>
        <div>
            <h2>{{Auth::user()->name}}</h2>
            <h3>{{Auth::user()->slogan}}</h3>
        </div>
    </div>

</section>
@endsection