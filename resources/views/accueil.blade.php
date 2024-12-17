@extends('layout')
@section('title', 'Recette 404 aléatoire')

@section('content')
<h1>Recette aléatoire</h1>
<h2>
    {{ $name }} pour {{ $serves }} personne{{ $serves > 1 ? 's' : '' }}
</h2>
<p>Temps de préparation : {{ $preparationTime }}</p>
<h2>Liste des ingrédients</h2>
<ul>
@foreach($ingredients as $ingredient)
    <li>{{ $ingredient }}</li>
@endforeach
</ul>
<form method="post" action="/registerComment">
    @csrf
    <input type="hidden" name="recette_id" value="{{ $id }}" />
    <div>
        <label for="comment">Commentaire :</label>
        <textarea id="comment" name="comment"></textarea>
        <label for="note">Note : <span id="noteValue">6</span>/10</label>
        <input type="range"
            min="0"
            max="10"
            value="10"
            name="note"
            id="note">
    </div>
    <input type="submit" value="envoyer" />
    @if($errors->any())
        <div>
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    @if(session('RegisterSuccess'))
        <div>
            {{ session('RegisterSuccess') }}
        </div>
    @endif
</form>
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
@if(!empty($notations))
    <div>
        @foreach($notations as $notation)
            @if(!empty($notation['comment']))
                {{ $notation['comment'] }}
            @endif
            <p>{{ $notation['note'] }}/10</p>
        @endforeach
    </div>
@endif
@endsection
