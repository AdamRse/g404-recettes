@extends('layout')
@section('title', 'Recette 404 aléatoire')
@section('content')
<div class="random-recipe">
    <h1 class="page-title">Recette aléatoire</h1>

    <div class="recipe-header">
        <h2>{{ $name }} pour {{ $serves }} personne{{ $serves > 1 ? 's' : '' }}</h2>
        <p class="prep-time">Temps de préparation : {{ $preparationTime }}</p>
    </div>

    <div class="ingredients-section">
        <h2>Liste des ingrédients</h2>
        <ul>
            @foreach($ingredients as $ingredient)
            <li>{{ $ingredient }}</li>
            @endforeach
        </ul>
    </div>

    <form class="rating-form" method="post" action="/registerComment">
        @csrf
        <input type="hidden" name="recette_id" value="{{ $id }}" />
        <div class="form-group">
            <label for="comment">Commentaire :</label>
            <textarea id="comment" name="comment" rows="4"></textarea>
        </div>

        <div class="form-group range-group">
            <label for="note">Note : <span id="noteValue">6</span>/10</label>
            <input type="range" min="0" max="10" value="10" name="note" id="note">
        </div>

        <button type="submit" class="submit-btn">Envoyer</button>

        @if($errors->any())
        <div class="error-messages">
            @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
            @endforeach
        </div>
        @endif

        @if(session('RegisterSuccess'))
        <div class="success-message">
            {{ session('RegisterSuccess') }}
        </div>
        @endif
    </form>

    @if(!empty($notations))
    <div class="ratings-section">
        <h2>Avis</h2>
        @foreach($notations as $notation)
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

@push('scripts')
<script>
const slider = document.getElementById('note');
const output = document.getElementById('noteValue');
output.innerHTML = slider.value;
slider.oninput = function(){
    output.innerHTML = this.value;
}
</script>
@endpush
@endsection
