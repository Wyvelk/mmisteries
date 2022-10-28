@extends('layouts.app-before')
@section('css')
<link href='/css/login.css' rel='stylesheet'>
@endsection
@section('content')
<section class='register'>
    <h2>Créez votre équipe</h2>
    @if(session('success'))
    <h3>{{session('success')}}</h3>
@endif
    <form action="{{ route('register.custom') }}" method="POST">
        @csrf
        <label for="username">Nom de l'équipe</label>
        <input type="text" placeholder="Nom de l'équipe" id="name" class="form-control" name="name" required autofocus>
        @if ($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
        <label for="slogan">Votre slogan</label>
        <input type='text' placeholder='Slogan' name='slogan'>
        <label for="password">Mot de passe</label>
        <input type="password" placeholder="Mot de passe" id="password" class="form-control" name="password" required>
        @if ($errors->has('password'))
        <span class="text-danger">{{ $errors->first('password') }}</span>
        @endif
        <label for="instagram">Instagram du chef d'équipe</label>
        <input type="text" placeholder="Instagram" id="email_address" class="form-control" name="email" required autofocus>
        @if ($errors->has('email'))
        <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif
        <input type="submit" class="bouton" value="Créer">
    </form>

    <p>Si vous avez déjà une équipe, <a href='/login'>connectez-vous</a> !</p>

</section>
@endsection