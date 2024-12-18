<?php

namespace App\Repositories\Interfaces;

use App\Models\Recette;

interface RecetteRepositoryInterface
{
    public function getRandomRecette():array|false;
    public function getAllRecettes():array|false;
    public function getRecetteById(int $id):array|false;
    public function formatRecetteData(Recette $recette):array;
}
