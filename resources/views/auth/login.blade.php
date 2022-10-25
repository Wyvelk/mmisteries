@extends('layouts.app-before')
@section('css')
<link href='/css/login.css' rel='stylesheet'>
@endsection
@section('content')
<section class='login'>
    <h2>Connexion</h2>
        <form method="POST" action="{{ route('login.custom') }}">
        @csrf
            <label for="username">Nom de l'équipe</label>
            <input type="text" placeholder="Nom de l'équipe" id="email" class="form-control" name="name" required autofocus>
                @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            <label for="password">Mot de passe</label>
            <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
                 @endif
                 <input type="submit" class="bouton" value="Valider">
        </form>
        @if(session('success'))
    <p>{{session('success')}}</p>
@endif
        <p>Vous n'avez pas encore d'équipe ? <a href='/registration'>Créez-en une ici</a> !</p>
</section>
@endsection