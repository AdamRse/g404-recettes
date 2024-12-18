<?php

namespace App\Repositories;

use App\Models\Notation;
use App\Repositories\Interfaces\NotationRepositoryInterface;

class NotationRepository implements NotationRepositoryInterface
{
    //Ajouter une notation dans la BDD
    public function create(array $data):bool{
        return Notation::create($data);
    }

    //A venir : Vérifier si l'utilisateur a déjà noté
    public function hasUserAlreadyRated(int $recetteId):bool{
        return false;//Pas encore implémenté, pas de user en bdd
    }
}
