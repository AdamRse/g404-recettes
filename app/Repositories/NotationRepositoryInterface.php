<?php

namespace App\Repositories;

interface NotationRepositoryInterface
{
    public function create(array $data);
    public function hasUserAlreadyRated($recetteId);
    public function updateAverageRating($recetteId);
}
