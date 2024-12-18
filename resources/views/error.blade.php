@extends('layout')
@section('title', 'Recette 404 aléatoire')
@section('content')
<article class="recipe-card">
    <header class="recipe-header">
        <h1>Erreur</h1>
        <h2>{{ $title ? $title : 'Unne erreur s\'est produite' }}</h2>
    </header>
    <div class="recipe-content">
        {{ $message }}
    </div>
</article>
@endsection
