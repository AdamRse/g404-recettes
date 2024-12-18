<?php

namespace App\Repositories;

use App\Models\Notation;

class NotationRepository implements NotationRepositoryInterface
{
    public function create(array $data)
    {
        return Notation::create($data);
    }

    public function hasUserAlreadyRated($recetteId)
    {
        // Dans un vrai cas, vous vérifieriez avec l'ID de l'utilisateur
        // Ici c'est simplifié car anonyme
        return false;
    }

    public function updateAverageRating($recetteId)
    {
        // Calculer et mettre à jour la note moyenne
        $average = Notation::where('recette_id', $recetteId)
            ->avg('note');

        return $average;
    }
}
