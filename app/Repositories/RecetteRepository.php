<?php

namespace App\Repositories;

use App\Models\Recette;
use App\Repositories\Interfaces\RecetteRepositoryInterface;

class RecetteRepository implements RecetteRepositoryInterface
{
    //Retourne une recette aléatoire
    public function getRandomRecette():array|false{
        $recette = Recette::with(['ingredients', 'notations'])
            ->inRandomOrder()
            ->first();//A cause de first() $recette sera false si non trouvé, sinon il faudtait utiliser $recette->isEmpty() comme dans getAllRecettes()
        return $recette ? $this->formatRecetteData($recette) : false;
    }

    //Retourne toutes les recettes
    public function getAllRecettes():array|false{
        $recettes = Recette::with(['ingredients', 'notations'])->get();

        return $recettes->isEmpty() ? false : $recettes->map(function($recette) {
            return $this->formatRecetteData($recette);
        })->toArray();
    }

    //Retourne une recette correspondant à l'ID donné
    public function getRecetteById(int $id):array|false {
        $recette = Recette::with(['ingredients', 'notations'])->find($id);
        return $recette ? $this->formatRecetteData($recette) : false;
    }

    //Retourne la collection Recette sous forme de tableau
    public function formatRecetteData(Recette $recette):array{
        return [
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
}
