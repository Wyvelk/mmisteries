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
            <input type="text" placeholder="Email" id="email" class="form-control" name="email" required autofocus>
                @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            <label for="password">Mot de passe</label>
            <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
                 @endif
                 <input type="submit" class="bouton" value="Valider">
        </form>
        <p>Vous n'avez pas encore d'équipe ? <a href='/registration'>Créez-en une ici</a> !</p>
</section>
@endsection