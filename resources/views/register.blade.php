@extends('layouts.app-before')
@section('css')
<link href='/css/login.css' rel='stylesheet'>
@endsection
@section('content')
<section class='register'>
    <h2>Créez votre équipe</h2>
    <form action='registerT' method='post'>
        @csrf
        <label for="username">Nom de l'équipe</label>
        <input type="text" id="login" name="login" placeholder="Nom de l'équipe" required='required'>
        <label for="slogan">Votre slogan</label>
        <input type="text" id="slogan" name="slogan" placeholder="Slogan">
        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="pass" placeholder="Mot de passe" required='required'>
        <label for="password">Instagram du chef d'équipe</label>
        <input type="text" id="instagram-chef" name="insta" placeholder="Instagram" required='required'>
        <input type="submit" class="bouton" value="Valider">
    </form>
    <p>Si vous avez déjà une équipe, <a href='/login'>connectez-vous</a> !</p>
    </section>

@endsection