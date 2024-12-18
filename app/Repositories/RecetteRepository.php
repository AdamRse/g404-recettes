<?php

namespace App\Repositories;

use App\Models\Recette;
use App\Repositories\Interfaces\RecetteRepositoryInterface;

class RecetteRepository implements RecetteRepositoryInterface
{
    public function getRandomRecette()
    {
        $recette = Recette::with(['ingredients', 'notations'])
            ->inRandomOrder()
            ->first();

        return $recette ? $this->formatRecetteData($recette) : ['error' => 'Aucune recette trouvée'];
    }

    public function getAllRecettes()
    {
        $recettes = Recette::with(['ingredients', 'notations'])->get();
        return $recettes->map(function($recette) {
            return $this->formatRecetteData($recette);
        })->toArray();
    }

    public function getRecetteById($id)
    {
        $recette = Recette::with(['ingredients', 'notations'])->find($id);
        return $recette ? $this->formatRecetteData($recette) : null;
    }

    public function formatRecetteData($recette)
    {
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
