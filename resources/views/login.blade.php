@extends('layouts.app-before')
@section('css')
<link href='/css/login.css' rel='stylesheet'>
@endsection
@section('content')
<section class='login'>
    <div class='titre'><h2>Connexion</h2></div>
    <img src='/uploads/Tim_line.png'>
        <form >
        <label for="username">Nom de l'équipe :</label>
        <input type="text" id="login" name="login" placeholder="Nom de l'équipe">
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="pass" placeholder="Mot de passe">
        <input type="submit" class="bouton" value="Valider">
        </form>
        <p>Vous n'avez pas encore d'équipe ? <a href='/register'>Créez-en une ici</a> !</p>
</section>

@endsection('content')