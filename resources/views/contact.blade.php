@extends('layouts.app')
@section('css')
<link href='/css/login.css' rel='stylesheet'>
@endsection
@section('content')
<section class='register'>
    <h2>Une question ?</h2>
    <form>
        @csrf
        <label for="username">Nom de l'équipe</label>
        <input type="text" id="login" name="login" placeholder="Nom de l'équipe" required='required'>
        <label for="objet">Objet (problèmes techniques, ...)</label>
        <input type="text" id="objet" name="objet" placeholder="Objet" required="required">
        <textarea id="message" name="message" placeholder="Votre message..." wrap="hard" required="required"></textarea>
        <input type="submit" class="bouton" value="Envoyer">
    </form>

</section>

@endsection