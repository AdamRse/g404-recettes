<?php

namespace App\Repositories\Interfaces;

interface RecetteRepositoryInterface
{
    public function getRandomRecette();
    public function getAllRecettes();
    public function getRecetteById($id);
    public function formatRecetteData($recette);
}
