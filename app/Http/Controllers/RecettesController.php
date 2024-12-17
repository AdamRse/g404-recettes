<?php

namespace App\Http\Controllers;

use App\Models\Notation;
use App\Models\Recette;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class RecettesController extends Controller
{
    //page d'accueil : affiche une recette aléatoire avec ses ingrédients et commentaires
    public function index(){
        $data = [];
        $recette = Recette::with(['ingredients', 'notations'])
            ->inRandomOrder()
            ->first();

        if(!$recette)
            $data['error'] = 'Aucune recette trouvée';
        else{
            $data = [
                'id' => $recette->id,
                'name' => $recette->name,
                'preparationTime' => $recette->preparationTime,
                'cookingTime' => $recette->cookingTime,
                'serves' => $recette->serves,
                'ingredients' => $recette->ingredients->pluck('name')->toArray(),
                'notations' => $recette->notations->map(function($notation) {
                    return [
                        'note' => $notation->note,
                        'comment' => $notation->comment
                    ];
                })->toArray()
            ];
            $data['title']="Recette aléatoire";
        }

        return view('receipe', $data);
    }

    //Ajoute une notation, accompagnée d'un commentaire optionnel
    public function register(Request $request){
        try{
            $validated = $request->validate([
                'recette_id' => 'integer|exists:recettes,id',
                'comment' => 'nullable|string',
                'note' => 'integer|min:0|max:10'
            ]);
            Notation::create($validated);
            return redirect('/')->with('RegisterSuccess', 'Appréciation ajoutée avec succès');
        }
        catch (ValidationException $e) {
            return redirect('/')->withErrors($e->errors());
        }
    }

    //Donne la liste de toutes les recettes avec leurs ingrédients et commentaires
    public function list(){
        $data=["recettes" => null];
        $recettes = Recette::with(['ingredients', 'notations'])->get();
        foreach ($recettes as $recette) {
            $data["recettes"][] = [
                'id' => $recette->id,
                'name' => $recette->name,
                'preparationTime' => $recette->preparationTime,
                'cookingTime' => $recette->cookingTime,
                'serves' => $recette->serves,
                'ingredients' => $recette->ingredients->pluck('name')->toArray(),
                'notations' => $recette->notations->map(function($notation) {
                    return [
                        'note' => $notation->note,
                        'comment' => $notation->comment
                    ];
                })->toArray()
            ];
        }
        return view('receipes', $data);
    }

    //Affiche unerecette choisie avec ses ingrédients et commentaires glaçants
    public function show($id){
        $data=["recette" => null];
        $recette = Recette::with(['ingredients', 'notations'])->find($id);
        if($recette){
            $data = [
                'id' => $recette->id,
                'name' => $recette->name,
                'preparationTime' => $recette->preparationTime,
                'cookingTime' => $recette->cookingTime,
                'serves' => $recette->serves,
                'ingredients' => $recette->ingredients->pluck('name')->toArray(),
                'notations' => $recette->notations->map(function($notation) {
                    return [
                        'note' => $notation->note,
                        'comment' => $notation->comment
                    ];
                })->toArray()
            ];
            $data['title']="Recette ".$recette->name;
            return view('receipe', $data);
        }
        else
            return view('error404', ["title" => "Recette introuvable", "message" => "Impossible de trouver la recette"]);
    }
}
