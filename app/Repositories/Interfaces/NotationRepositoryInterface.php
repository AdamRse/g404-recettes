<?php

namespace App\Repositories\Interfaces;

interface NotationRepositoryInterface
{
    public function create(array $data);
    public function hasUserAlreadyRated($recetteId);
    public function updateAverageRating($recetteId);
}
