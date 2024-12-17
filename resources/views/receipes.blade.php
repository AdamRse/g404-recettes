@extends('layout')
@section('title', 'Liste des recettes')
@section('content')
<h1 class="page-title">Liste des recettes</h1>
<div class="recipes-grid">
    @foreach($recettes as $recette)
    <article class="recipe-card">
        <header class="recipe-header">
            <h2>{{ $recette['name'] }}</h2>
        </header>
        <div class="recipe-content">
            <div class="recipe-info">
                <p><span class="info-label">Temps de préparation :</span> {{ $recette['preparationTime'] }}</p>
                <p><span class="info-label">Temps de cuisson :</span> {{ $recette['cookingTime'] }}</p>
                <p><span class="info-label">Pour</span> {{ $recette['serves'] }} personnes</p>
            </div>
            <div class="recipe-ingredients">
                <h3>Ingrédients :</h3>
                <ul>
                    @foreach($recette['ingredients'] as $ingredient)
                    <li>{{ $ingredient }}</li>
                    @endforeach
                </ul>
            </div>
            @if(!empty($recette['notations']))
            <div class="recipe-ratings">
                @foreach($recette['notations'] as $notation)
                <div class="rating">
                    @if(!empty($notation['comment']))
                    <p class="rating-comment">{{ $notation['comment'] }}</p>
                    @endif
                    <p class="rating-score">{{ $notation['note'] }}/10</p>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </article>
    @endforeach
</div>
@endsection
