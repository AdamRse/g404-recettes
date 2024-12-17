<!DOCTYPE html>
<html>
<head>
    <title>Recette aléatoire</title>
</head>
<body>
    <h1>Recette aléatoire</h1>
    <h2>
        {{ $name }}
    </h2>
    <p>Temps de préparation : {{ $preparationTime }}</p>
    <h2>Liste des ingrédients</h2>
    <ul>
    @foreach($ingredients as $ingredient)
        <li>{{ $ingredient }}</li>
    @endforeach
    </ul>
    <div>
        @foreach($notations as $notation)
            <p>{{ $notation['note'] }}/10</p>
        @endforeach
    </div>
</body>
</html>
