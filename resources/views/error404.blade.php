@extends('layout')
@section('title', 'Recette 404 aléatoire')
@section('content')
<article class="recipe-card">
    <header class="recipe-header">
        <h1>Erreur 404 :</h1>
        <h2>{{ $title ? $title : 'Page introuvable' }}</h2>
    </header>
    <div class="recipe-content">
        {{ $message ? $message : 'La page n\'existe pas' }}
    </div>
</article>
@endsection
