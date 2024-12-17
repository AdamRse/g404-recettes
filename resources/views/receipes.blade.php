@extends('layout')
@section('title', 'Liste des recettes')
@section('content')
<h1>Liste des recettes</h1>
<div>
    @foreach($recettes as $recette)
    <article>
        <header>
            <h2>{{ $recette['name'] }}</h2>
        </header>
        <div>
            <p>Temps de préparation : {{ $recette['preparationTime'] }}</p>
            <p>Temps de cuisson : {{ $recette['cookingTime'] }}</p>
            <p>Pour {{ $recette['serves'] }} personnes</p>
            <h3>Ingrédients :</h3>
            <ul>
                @foreach($recette['ingredients'] as $ingredient)
                <li>{{ $ingredient }}</li>
                @endforeach
            </ul>
            @if(!empty($recette['notations']))
            <div>
                @foreach($recette['notations'] as $notation)
                <div>
                    @if(!empty($notation['comment']))
                    <p>{{ $notation['comment'] }}</p>
                    @endif
                    <p>{{ $notation['note'] }}/10</p>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </article>
    @endforeach
</div>
@endsection
